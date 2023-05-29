<table class="text-align:center">
    <thead>
    <tr>
        <th style="width:100px; font-weight:bold;text-align:center">School Year</th>
        <th style="width:100px; font-weight:bold;text-align:center">Semester</th>
        <th style="width:100px; font-weight:bold;text-align:center">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($school_years as $school_year)
        <tr>
            <td style="text-align:center">{{$school_year->school_year}}</td>
            <td style="text-align:center">{{$school_year->semester}}</td>
            <td style="text-align:center">{{$school_year->status}}</td>
        </tr>
        <tr></tr>
        <tr>
            @if(count($school_years) > 1)
                <td></td>
            @endif
            <td style="width:100px; font-weight:bold;text-align:center">Student Type</td>
            <td style="width:100px; font-weight:bold;text-align:center">Student ID</td>
            <td style="width:100px; font-weight:bold;text-align:center">Last Name</td>
            <td style="width:100px; font-weight:bold;text-align:center">First Name</td>
            <td style="width:100px; font-weight:bold;text-align:center">Middle Name</td>
            <td style="width:100px; font-weight:bold;text-align:center">Vaccination Status</td>
            <td style="width:100px; font-weight:bold;text-align:center">Email</td>
            <td style="width:100px; font-weight:bold;text-align:center">Gender</td>
            <td style="width:100px; font-weight:bold;text-align:center">Birth Date</td>
            <td style="width:100px; font-weight:bold;text-align:center">Mobile No.</td>
            <td style="width:100px; font-weight:bold;text-align:center">Facebook Account</td>
            <td style="width:100px; font-weight:bold;text-align:center">Region</td>
            <td style="width:100px; font-weight:bold;text-align:center">Province</td>
            <td style="width:100px; font-weight:bold;text-align:center">City</td>
            <td style="width:100px; font-weight:bold;text-align:center">Barangay</td>
            <td style="width:100px; font-weight:bold;text-align:center">Program</td>
            <td style="width:100px; font-weight:bold;text-align:center">First Period Subject</td>
            <td style="width:100px; font-weight:bold;text-align:center">First Period Schedule</td>
            <td style="width:100px; font-weight:bold;text-align:center">First Period Adviser</td>
            <td style="width:100px; font-weight:bold;text-align:center">Second Period Subject</td>
            <td style="width:100px; font-weight:bold;text-align:center">Second Period Schedule</td>
            <td style="width:100px; font-weight:bold;text-align:center">Second Period Adviser</td>
            <td style="width:100px; font-weight:bold;text-align:center">Third Period Subject</td>
            <td style="width:100px; font-weight:bold;text-align:center">Third Period Schedule</td>
            <td style="width:100px; font-weight:bold;text-align:center">Third Period Adviser</td>
        </tr>
        <tr></tr>
        @foreach($school_year->schoolEnrollees as $school_enrollee)
            @php
                $student = $school_enrollee->student;
            @endphp
            @if($student)
                <tr>
                    @if(count($school_years) > 1)
                        <td></td>
                    @endif
                    <td style="text-align:center">{{$student->student_type}}</td>
                    <td style="text-align:center">{{$student->student_id}}</td>
                    <td style="text-align:center">{{$student->last_name}}</td>
                    <td style="text-align:center">{{$student->first_name}}</td>
                    <td style="text-align:center">{{$student->middle_name}}</td>
                    <td style="text-align:center">{{$student->vaccination_status}}</td>
                    <td style="text-align:center">{{$student->email}}</td>
                    <td style="text-align:center">{{$student->gender}}</td>
                    <td style="text-align:center">{{$student->birth_date}}</td>
                    <td style="text-align:center">{{$student->mobile_no}}</td>
                    <td style="text-align:center">{{$student->fb_acc_name}}</td>
                    <td style="text-align:center">{{$student->region}}</td>
                    <td style="text-align:center">{{$student->province}}</td>
                    <td style="text-align:center">{{$student->city}}</td>
                    <td style="text-align:center">{{$student->baranggay}}</td>
                @php
                    $student_loads = App\Models\StudentLoad::where('school_year_id', $school_year->id)->where('student_id', $student->id)->get();
                    $program = App\Models\Program::where('id', $student_loads->first() ? $student_loads->first()->program : -1)->first();
                @endphp

                @if($program)
                    <td style="text-align:center">{{$program->program}}</td>
                @else
                    <td style="text-align:center"></td>
                @endif
                @foreach($student_loads as $student_load)
                    @php
                        $subject =  App\Models\Subject::find($student_load->subject_id);
                    @endphp
                        <td style="text-align:center; width:200px">{{$subject->subject}}</td>
                        <td style="text-align:center; width:200px">{{$student_load->sub_sched}}</td>
                        <td style="text-align:center; width:200px">{{$student_load->adviser}}</td>
                @endforeach
            @endif
        @endforeach
        <tr></tr>
    @endforeach
    </tbody>
</table>