<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\Program;
use App\Models\StudentStatus;
use App\Models\Subject;
use App\Models\PendingStudent;
use App\Models\AssignStudent;
use App\Models\AdvisingStudent;
use App\Models\StudentUser;
use App\Models\ApprovedStudent;
use App\Models\Adviser;
use App\Models\Scheduling;
use App\Exports\EnrolledStudentExport;
use App\Exports\SubjectExport;
use App\Exports\ProgramExport;
use App\Exports\InstructorExport;
use App\Models\SchoolYear;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdmissionOfficerController extends Controller
{

    #OGS Admin Dashboard
    function dashboard()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $pendingStudents = DB::table('pending_students')->count();
        $approvedStudents = DB::table('approved_students')->count();
        $enrolledStudents = DB::table('enrolled_students')->count();
        $subjects = DB::table('subjects')->count();
        $programs = DB::table('programs')->count();
        return view('ogs.dashboard.dashboard', $data, compact('approvedStudents', 'programs', 'subjects', 'pendingStudents', 'enrolledStudents'));
    }

    #Manage Enrollees
    function manageEnrollees()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $pendingStudents = PendingStudent::all();
        $approvedStudents = ApprovedStudent::all();
        return view('ogs.manage-enrollees.manage-enrollees', $data, ['approvedStudents' => $approvedStudents, 'pendingStudents' => $pendingStudents]);
    }

    #Approving Pending Students
    function approvingPendingStudents($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $student = PendingStudent::find($id);
        return view('ogs.approve-pendings', $data, ['student' => $student]);
    }

    #Approve Students Function / Insert in different table
    function approvePreEnrollees(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'program' => 'required',
            'first_period' => 'required',
            'second_period' => 'required',
            'third_period' => 'required',
        ]);

        // Insert data
        $student = new ApprovedStudent();
        $student->id = $request->id;
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->vaccination_status = $request->vaccination_status;
        $student->vaccination_file = $request->vaccination_file;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birth_date = $request->birth_date;
        $student->mobile_no = $request->mobile_no;
        $student->fb_acc_name = $request->fb_acc_name;
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->file = $request->file;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period;
        $student->second_period_sub = $request->second_period;
        $student->third_period_sub = $request->third_period;
        $student->first_period_sched = "";
        $student->second_period_sched = "";
        $student->third_period_sched = "";
        $student->first_period_adviser = "";
        $student->second_period_adviser = "";
        $student->third_period_adviser = "";
        $student->first_procedure = "Pending";
        $student->second_procedure = "Pending";
        $student->third_procedure = "Pending";

        // Decrement available_slots in the programs table
        $program = Program::find($request->program);
        $program->decrement('available_slots');

        // Decrement available_slots in the subjects table
        $subjects = [$request->first_period, $request->second_period, $request->third_period];
        Subject::whereIn('id', $subjects)->decrement('available_slots');

        $save = $student->save();

        if ($save) {
            $this->deletePendingStudent($request->id);
            return redirect('/staff/admin/manage-enrollees');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }


    #Delete Pending Students
    public function deletePendingStudent($id)
    {
        $student = PendingStudent::find($id);
        if (!$student) {
            return redirect('/staff/admin/manage-enrollees');
        }

        $subjectIds = [$student->first_period_sub, $student->second_period_sub, $student->third_period_sub];
        $subjects = Subject::whereIn('id', $subjectIds)->get();
        foreach ($subjects as $subject) {
            $subject->increment('available_slots');
        }

        $programIds = [$student->program];
        $programs = Program::whereIn('id', $programIds)->get();
        foreach ($programs as $program) {
            $program->increment('available_slots');
        }

        $student->delete();
        return redirect('/staff/admin/manage-enrollees');
    }



    function incrementAvailableSlots($subjects)
    {
        foreach ($subjects as $subject) {
            $subject->available_slots += 1;
            $subject->save();
        }
    }

    #Approved Student Table
    function approvedStudentsList()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $approvedStudents = ApprovedStudent::all();
        return view('ogs.pre-enrollment.approved-students', $data, ['approvedStudents' => $approvedStudents]);
    }

    #Enroll Approved Student
    function approveEnrollment(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'program' => 'required',
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required',
        ]);

        $student = new EnrolledStudent();
        $student->id = $request->id;
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->vaccination_status = $request->vaccination_status;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birth_date = $request->birth_date;
        $student->mobile_no = $request->mobile_no;
        $student->fb_acc_name = $request->fb_acc_name;
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $student->enrollment_id = $request->id;

        $save = $student->save();

        Mail::to($student->email)->send(new NotificationMail($student->email));
        if ($save) {
            return back()->with('success', 'Successfully inserted student data');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    #Edit Approved Student
    function editApprovedStudents($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $approvedStudents = ApprovedStudent::find($id);
        return view('ogs.edit-approved-students', $data, ['students' => $approvedStudents]);
    }

    #Delete Approved Students
    public function deleteApprovedStudents($id)
    {
        $student = ApprovedStudent::find($id);
        $student->delete();
        return back();
    }

    #Update Approved Student
    function updateApprovedStudents(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'vaccination_file' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'program' => 'required',
        ]);

        $students = ApprovedStudent::find($request->id);
        $students->student_type = $request->student_type;
        $students->student_id = $request->student_id;
        $students->last_name = $request->last_name;
        $students->first_name = $request->first_name;
        $students->middle_name = $request->middle_name;
        $students->vaccination_status = $request->vaccination_status;
        $students->vaccination_file = $request->vaccination_file;
        $students->email = $request->email;
        $students->gender = $request->gender;
        $students->birth_date = $request->birth_date;
        $students->mobile_no = $request->mobile_no;
        $students->fb_acc_name = $request->fb_acc_name;
        $students->region = $request->region;
        $students->province = $request->province;
        $students->city = $request->city;
        $students->baranggay = $request->baranggay;
        $students->program = $request->program;

        $save = $students->save();

        if ($save) {
            return redirect('/staff/admin/manage-enrollees');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    #Encoded Students
    function encodedStudents()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $approvedStudents = ApprovedStudent::all();
        return view('ogs.pre-enrollment.encoded-students', $data, ['approvedStudents' => $approvedStudents]);
    }

    #Encoding Students
    function encodingStudents($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $approvedStudents = ApprovedStudent::find($id);
        $adviser = Adviser::all();
        return view('ogs.encoding-students', $data, ['adviser' => $adviser, 'students' => $approvedStudents]);
    }

    #Encode Student Data / Insert column datas
    function encodeStudentData(Request $request)
    {
        $request->validate([
            'enrollment_file' => 'mimes:pdf,xlx,csv|max:2048',
        ]);

        $student = ApprovedStudent::find($request->id);
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;
        $student->enrollment_status = $request->enrollment_status;
        $student->first_procedure = $request->first_procedure;
        $student->second_procedure = $request->second_procedure;
        $student->third_procedure = $request->third_procedure;
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;

        $file = $request->enrollment_file;

        if ($file !== null) {
            $filename = $file->getClientOriginalName();
            $request->enrollment_file->move('assets', $filename);

            $student->enrollment_file = $filename;
        } else {
        }

        $save = $student->save();
        if ($save) {
            return back()->with('success', 'Successfully inserted data');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    #Upload Enrollment Slip
    function uploadEnrollmentSlip(Request $request)
    {
        $request->validate([
            'enrollment_file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $student = ApprovedStudent::find($request->id);
        $file = $request->enrollment_file;

        $filename = $file->getClientOriginalName();
        $request->enrollment_file->move('assets', $filename);

        $student->enrollment_file = $filename;


        $save = $student->save();

        if ($save) {
            return redirect('/staff/admin/manage-enrollees');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    #Uploading Enrollment Slip
    function enrollmentSlip($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $students = ApprovedStudent::find($id);
        return view('ogs.upload-enrollment-slip', $data, ['students' => $students]);
    }



    #View Encoded Student Data
    function viewEncodedStudentData($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $students = ApprovedStudent::find($id);
        return view('ogs.view-encoded-student', $data, ['students' => $students]);
    }

    #Student Monitoring
    function studentMonitoring()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $enrolledStudents = EnrolledStudent::all();
        return view('ogs.student-monitoring.student-monitoring', $data, ['enrolledStudents' => $enrolledStudents]);
    }

    #Edit Enrolled Student
    function editEnrolledStudent($id)
    {

        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $enrolledStudents = EnrolledStudent::find($id);
        $programs = Program::all();
        $subjects = Subject::all();
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        return view('ogs.edit-enrolled-student', $data, ['enrolledStudents' => $enrolledStudents]);
    }

    #View Enrolled Student
    function viewEnrolledStudent($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $student = EnrolledStudent::find($id);
        return view('admin.view-enrolled-student', $data, ['student' => $student]);
    }



    #Delete EnrolledStudent
    function enrolledStudentDelete($id)
    {
        $enrolledStudent = EnrolledStudent::find($id);
        $enrolledStudent->delete();
        return redirect('/staff/admin/student-monitoring');
    }


    public function available_slots_program($program)
    {
        $no_of_students = $program->no_of_students;
        $available_slots = $program->max_students - $no_of_students;
        return $available_slots;
    }


    #Program Table
    function programList()
    {
        $data = [];

        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $programs = Program::all();
        $semester = SchoolYear::all();

        foreach ($programs as $program) {
            $pending_count = PendingStudent::where('program', $program->id)->count();
            $approved_count = ApprovedStudent::where('program', $program->id)->count();

            $program->no_of_students = $pending_count + $approved_count;
        }

        $data['semester'] = $semester;
        $data['programs'] = $programs;

        return view('ogs.classifications.programs', $data);
    }



    #Editing Program
    function programEdit($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $programs = Program::find($id);
        $programData = Program::all();
        $school_year = SchoolYear::all();
        $available_slots_program = $programs->available_slots ?? 0;
        if (request()->isMethod('post')) {
            $input_slots = request()->input('available_slots');
            $available_slots_program += $input_slots;
            $programs->available_slots = $available_slots_program;
            $programs->save();
        }
        return view('ogs.edit-program', $data, ['school_year' => $school_year, 'programData' => $programData, 'programs' => $programs]);
    }

    #Delete Program
    function programDelete($id)
    {
        $program = Program::find($id);

        // Check if there are any enrolled students associated with the program
        $no_of_students = PendingStudent::where('program', $id)->count();
        $no_of_students += ApprovedStudent::where('program', $id)->count();

        if ($no_of_students >= 1) {
            return redirect('/staff/admin/programs')->with('fail', 'Cannot delete program as it has enrolled students.');
        }

        $program->delete();
        return redirect('/staff/admin/programs')->with('success', 'Program has been deleted.');
    }
    #Insert Program
    function programInsert(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'available_slots' => 'required',
            'degree' => 'required',
            'program' => 'required',
            'description' => 'required',
        ]);

        //insert data
        $programs = new Program();
        $programs->code = $request->code;
        $programs->available_slots = $request->available_slots;
        $programs->degree = $request->degree;
        $programs->program = $request->program;
        $programs->description = $request->description;
        $save = $programs->save();

        if ($save) {
            return redirect('staff/admin/programs');
        } else {
            return back()->with('fail', 'Failed inserting data');
        }
    }

    #Program Update
    function programUpdate(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'available_slots' => 'required',
            'degree' => 'required',
            'program' => 'required',
            'description' => 'required',
        ]);

        //insert data
        $programs = Program::find($request->id);
        $programs->code = $request->code;
        $programs->available_slots = $request->available_slots;
        $programs->degree = $request->degree;
        $programs->program = $request->program;
        $programs->description = $request->description;
        $save = $programs->save();

        if ($save) {
            return redirect('staff/admin/programs');
        } else {
            return back()->with('fail', 'Failed inserting data');
        }
    }

    #Subject Table
    function subjectList()
    {
        $data = [];

        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $programs = Program::all();
        $subjects = Subject::all();
        $semester = SchoolYear::all();

        foreach ($subjects as $subject) {
            $pending_count = PendingStudent::where(function ($query) use ($subject) {
                $query->where('first_period_sub', $subject->id)
                    ->orWhere('second_period_sub', $subject->id)
                    ->orWhere('third_period_sub', $subject->id);
            })->count();

            $approved_count = ApprovedStudent::where(function ($query) use ($subject) {
                $query->where('first_period_sub', $subject->id)
                    ->orWhere('second_period_sub', $subject->id)
                    ->orWhere('third_period_sub', $subject->id);
            })->count();


            $subject->no_of_students = $pending_count + $approved_count;
        }

        $data['semesters'] = $semester;
        $data['programs'] = $programs;
        $data['subjects'] = $subjects;

        return view('ogs.classifications.subjects', $data);
    }


    public function available_slots($subject, $students)
    {
        $numStudents = $students ? $students->count() : 0;
        $availableSlots = $subject->no_of_students - $numStudents;
        return $availableSlots;
    }


    #Edit Subjects
    function editSubjects($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $programs = Program::all();
        $subject = Subject::find($id);
        $school_year = SchoolYear::all();
        $availableSlots = $subject->available_slots ?? 0;
        if (request()->isMethod('post')) {
            $input_slots = request()->input('available_slots');
            $availableSlots += $input_slots;
            $subject->available_slots = $availableSlots;
            $subject->save();
        }

        return view('ogs.edit-subject', $data, ['school_year' => $school_year, 'programs' => $programs, 'subject' => $subject, 'availableSlots' => $availableSlots]);
    }
    public function getStudentSubjectsAndPrograms($id)
    {
        $student = PendingStudent::find($id);

        if (!$student) {
            return redirect('/students')->with('error', 'Student not found');
        }

        // Retrieve the subjects for the student (both pending and enrolled)
        $subjectIds = [$student->first_period_sub, $student->second_period_sub, $student->third_period_sub];
        $subjects = Subject::whereIn('id', $subjectIds)->get();

        // Retrieve the program for the student
        $program = Program::find($student->program);

        return view('student', compact('student', 'subjects', 'program'));
    }

    public function getSubjectsAndProgramsForEnrolledStudents($id)
    {
        $student = EnrolledStudent::find($id);

        if (!$student) {
            return redirect('/students')->with('error', 'Student not found');
        }

        // Retrieve the subjects for the student (both pending and enrolled)
        $subjectIds = [$student->first_period_sub, $student->second_period_sub, $student->third_period_sub];
        $subjects = Subject::whereIn('id', $subjectIds)->get();

        // Retrieve the program for the student
        $program = Program::find($student->program);

        return view('student', compact('student', 'subjects', 'program'));
    }


    function deleteSubjects($id)
    {
        $subject = Subject::find($id);

        // Check if there are any pending students associated with the subject
        $pending_count = PendingStudent::where(function ($query) use ($subject) {
            $query->where('first_period_sub', $subject->id)
                ->orWhere('second_period_sub', $subject->id)
                ->orWhere('third_period_sub', $subject->id);
        })->count();

        // Check if there are any approved students associated with the subject
        $approved_count = ApprovedStudent::where(function ($query) use ($subject) {
            $query->where('first_period_sub', $subject->id)
                ->orWhere('second_period_sub', $subject->id)
                ->orWhere('third_period_sub', $subject->id);
        })->count();

        $subject->no_of_students = $pending_count + $approved_count;

        if ($subject->no_of_students >= 1) {
            return redirect('/staff/admin/subjects')->with('fail', 'Cannot delete subject as it has enrolled students.');
        }

        $subject->delete();
        return redirect('/staff/admin/subjects')->with('success', 'Subject has been deleted.');
    }



    #Update Subject
    function updateSubject(Request $request)
    {
        //validate info
        $request->validate([
            'code' => 'required',
            'program' => 'required',
            'available_slots' => 'required',
            'subject' => 'required',
            'units' => 'required',
            'period' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ]);

        //update subject
        $subject = Subject::find($request->id);
        $subject->code = $request->code;
        $subject->program = $request->program;
        $subject->available_slots = $request->available_slots;
        $subject->subject = $request->subject;
        $subject->unit = $request->units;
        $subject->period = $request->period;
        $subject->semester = $request->semester;
        $subject->status = $request->status;
        $save = $subject->update();

        if ($save) {
            return redirect('staff/admin/subjects');
        } else {
            return back()->with('fail', 'failed adding subject');
        }
    }

    #Insert Subject
    function saveSubject(Request $request)
    {
        //validate info
        $request->validate([
            'code' => 'required',
            'program' => 'required',
            'available_slots' => 'required',
            'subject' => 'required',
            'units' => 'required',
            'period' => 'required',
        ]);

        //insert subject
        $subject = new Subject();
        $subject->code = $request->code;
        $subject->program = $request->program;
        $subject->available_slots = $request->available_slots;
        $subject->subject = $request->subject;
        $subject->unit = $request->units;
        $subject->period = $request->period;
        $save = $subject->save();

        if ($save) {
            return back()->with('success', 'Subject added successfuly');
        } else {
            return back()->with('fail', 'failed adding subject');
        }
    }

    #Adviser Table
    function adviserList()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $programs = Program::all();
        $adviser = Adviser::all();
        return view('ogs.classifications.instructors', $data, ['programs' => $programs, 'adviser' => $adviser]);
    }

    #Adviser Insert
    function adviserInsert(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        //insert adviser
        $adviser = new Adviser();
        $adviser->program = $request->program;
        $adviser->title = $request->title;
        $adviser->first_name = $request->first_name;
        $adviser->middle_name = $request->middle_name;
        $adviser->last_name = $request->last_name;
        $save = $adviser->save();

        if ($save) {
            return back()->with('success', 'successfuly added adviser!');
        } else {
            return back()->with('fail', 'failed adding subject');
        }
    }

    #Adviser Update
    function adviserUpdate(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        //update subject
        $adviser = Adviser::find($request->id);
        $adviser->program = $request->program;
        $adviser->title = $request->title;
        $adviser->first_name = $request->first_name;
        $adviser->middle_name = $request->middle_name;
        $adviser->last_name = $request->last_name;
        $save = $adviser->update();

        if ($save) {
            return redirect('/staff/admin/list-of-adviser');
        } else {
            return back()->with('fail', 'failed updating subject');
        }
    }

    #Adviser Edit
    function adviserEdit($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $programs = Program::all();
        $advisers = Adviser::find($id);
        return view('ogs.edit-instructor', $data, ['programs' => $programs, 'adviser' => $advisers]);
    }

    #Adviser Delete
    function adviserDelete($id)
    {
        $adviser = Adviser::find($id);
        $adviser->delete();
        return redirect('/staff/admin/list-of-adviser');
    }

    function viewEntranceSlipPDF($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $student = ApprovedStudent::find($id);
        return view('student.monitor-enrollment.view-enrollment-slip', $data, compact('student'));
    }

    function viewPDF($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }

        $student = ApprovedStudent::find($id);
        return view('ogs.view-pdf', $data, compact('student'));
    }

    function viewPending($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $student = PendingStudent::find($id);
        return view('ogs.view-pending-pdf', $data, compact('student'));
    }

    function downloadPDF(Request $request, $file_name)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return response()->download(public_path('assets/' . $file_name));
    }

    function creatingStudentUser($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        $programs = Program::all();
        $student = EnrolledStudent::find($id);
        return view('admin.create-student-users', $data, ['firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod, 'programs' => $programs, 'student' => $student]);
    }

    function createStudentUser(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'program' => 'required',
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required',
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
            'first_procedure' => 'required',
            'second_procedure' => 'required',
            'third_procedure' => 'required',
        ]);

        $student = new StudentUser();
        $student->id = $request->id;
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;
        $student->password = Hash::make($request->last_name);
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->vaccination_status = $request->vaccination_status;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birth_date = $request->birth_date;
        $student->mobile_no = $request->mobile_no;
        $student->fb_acc_name = $request->fb_acc_name;
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $student->title = "";
        $student->member_1 = "";
        $student->member_2 = "";
        $student->member_3 = "";
        $student->panelist_1 = "";
        $student->panelist_2 = "";
        $student->panelist_3 = "";
        $student->adviser = "";
        $student->date = "";
        $student->time = "";
        $student->venue = "";
        $student->link = "";
        $student->image = "";
        $student->first_procedure = $request->first_procedure;
        $student->second_procedure = $request->second_procedure;
        $student->third_procedure = $request->third_procedure;
        $save = $student->save();


        if ($save) {
            return redirect('/staff/admin/enrolled');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }













    function editPreEnrollees($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        $programs = Program::all();
        $subjects = Subject::all();
        $student = Student::find($id);
        return view('admin.edit-student', $data, ['firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod, 'subjects' => $subjects, 'programs' => $programs, 'student' => $student]);
    }

    function approveView($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        $programs = Program::all();
        $status = PendingStudent::find($id);
        $student = Student::find($id);
        return view('admin.approve-pending', $data, ['student' => $student, 'programs' => $programs, 'firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod, 'status' => $status]);
    }




    function approvePending(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'vaccination_file' => 'required|mimes:pdf,xlx,csv,jpg,jpeg,png|max:2048',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'baranggay' => 'required',
            'file.*' => 'required|mimes:pdf,xlx,csv|max:2048',
            'program' => 'required',
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required',
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
            'first_procedure' => 'required',
            'second_procedure' => 'required',
            'third_procedure' => 'required',
        ]);

        //insert data
        $student = new EnrolledStudent();
        $student->id = $request->id;
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->vaccination_status = $request->vaccination_status;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birth_date = $request->birth_date;
        $student->mobile_no = $request->mobile_no;
        $student->fb_acc_name = $request->fb_acc_name;
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $student->first_procedure = $request->first_procedure;
        $student->second_procedure = $request->second_procedure;
        $student->third_procedure = $request->third_procedure;
        $save = $student->save();

        $this->deletePending($request->id);
        $this->deletePreEnrollee($request->id);

        if ($save) {
            return redirect('staff/admin/enrolled');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }



    public function deletePending($id)
    {
        $student = PendingStudent::find($id);
        $student->delete();
        return redirect('/staff/admin/pending');
    }

    function updatePending(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'submitted_form' => 'required',
            'payment' => 'required',
            'status' => 'required',
            'first_procedure' => 'required',
            'second_procedure' => 'required',
            'third_procedure' => 'required',
        ]);

        //update data
        $pendingStudent = PendingStudent::find($request->id);
        $pendingStudent->student_id = $request->student_id;
        $pendingStudent->submitted_form = $request->submitted_form;
        $pendingStudent->payment = $request->payment;
        $pendingStudent->status = $request->status;
        $pendingStudent->first_procedure = $request->first_procedure;
        $pendingStudent->second_procedure = $request->second_procedure;
        $pendingStudent->third_procedure = $request->third_procedure;
        $save = $pendingStudent->save();

        if ($save) {
            return redirect('staff/admin/pending');
        } else {
            return back()->with('fail', 'Failed inserting student data');
        }
    }









    function updateEnrolledStudent(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'baranggay' => 'required',
            'program' => 'required',
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required',
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
        ]);

        $student = EnrolledStudent::find($request->id);
        $student->id = $request->id;
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->vaccination_status = $request->vaccination_status;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birth_date = $request->birth_date;
        $student->mobile_no = $request->mobile_no;
        $student->fb_acc_name = $request->fb_acc_name;
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $save = $student->save();

        if ($save) {
            return redirect('/staff/admin/enrolled');
        } else {
            return back()->with('fail', 'failed updating');
        }
    }

    function deleteEnrolledStudent($id)
    {
        $student = EnrolledStudent::find($id);
        $student->delete();
        return redirect('/staff/admin/enrolled');
    }


    function updateStudentUser(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'password' => 'required',
        ]);

        $student = StudentUser::find($request->id);
        $student->id = $request->id;
        $student->student_id = $request->student_id;
        $student->password = Hash::make($request->password);
        $save = $student->save();

        if ($save) {
            return back()->with('success', 'Successfully Changed Password!');
        } else {
            return back()->with('fail', 'failed updating');
        }
    }

    function deleteStudentUser($id)
    {
        $student = StudentUser::find($id);
        $student->delete();
        return redirect('/staff/admin/student-users');
    }

    function editStudentUser($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        $student = StudentUser::find($id);
        return view('admin.edit-student-users', $data, ['student' => $student]);
    }

    #Exporting Data Tables
    function exportEnrolledStudents()
    {
        return Excel::download(new EnrolledStudentExport, 'enrolled-students.xlsx');
    }

    function exportSubjects()
    {
        return Excel::download(new SubjectExport, 'subjects.xlsx');
    }

    function exportPrograms()
    {
        return Excel::download(new ProgramExport, 'programs.xlsx');
    }

    function exportInstructors()
    {
        return Excel::download(new InstructorExport, 'instructors.xlsx');
    }
}
