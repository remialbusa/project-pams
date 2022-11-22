<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\AdmissionOfficerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ThesisManagementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', [MainController::class, 'test']);
Route::get('/test/edit/{id}', [MainController::class, 'testEdit'])->name('test-edit');

Route::post('/welcome', [MainController::class, 'saveForm'])->name('submit-form');

//students routes
Route::get('/student/auth/login', [MainController::class, 'login'])->name('student.login');
Route::get('/student/auth/register-student', [MainController::class, 'register'])->name('auth.save-continue');
Route::post('/student/auth/register-student/save', [MainController::class, 'saveStudent'])->name('auth.save');
Route::post('/student/auth/verify', [MainController::class, 'verify'])->name('auth.verify-student');
Route::get('/student/auth/register-new-student', [MainController::class, 'registerNewStudent']);
Route::get('/student/auth/register-new-student/{id}', [MainController::class, 'getSubjects'])->name('auth.getSubjects');

//student profile routes
Route::get('/student/auth/student-profile', [MainController::class, 'profileView'])->middleware('isLoggedStudent');
Route::get('/student/auth/logout', [MainController::class, 'logout'])->name('auth.logout-student');
Route::get('/student/auth/dashboard', [MainController::class, 'dashboard'])->name('student.dashboard')->middleware('isLoggedStudent');
Route::get('/student/auth/pre-enroll', [MainController::class, 'preEnroll'])->name('student.pre-enroll')->middleware('isLoggedStudent');
Route::get('/student/auth/comprehensive-exam', [MainController::class, 'comprehensiveExam'])->name('student.comprehensive-exam')->middleware('isLoggedStudent');

//student profile update
Route::post('/student/auth/student-profile/update', [MainController::class, 'updateStudentProfile'])->name('update-student')->middleware('isLoggedStudent');

//student monitor routes
Route::get('/student/auth/monitor-enrollment', [MainController::class, 'enrollmentStatus'])->middleware('isLoggedStudent');

//student thesis routes
Route::get('/student/auth/student-thesis/directory', [ThesisManagementController::class, 'studentThesisDirectory'])->middleware('isLoggedStudent');
Route::get('/student/auth/student-thesis/schedule', [ThesisManagementController::class, 'studentThesisSchedule'])->middleware('isLoggedStudent');

//faqs routes
Route::get('/faqs',[FaqsController::class, 'faqsStudent']);
Route::post('/staff/admin/system-configuration/faqs', [FaqsController::class, 'saveFaqs'])->name('save-faqs');
Route::get('/staff/admin/system-configuration/faqs/delete/{id}', [FaqsController::class, 'deleteFaqs'])->name('delete-faqs')->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/faqs/edit/{id}', [FaqsController::class, 'editFaqs'])->name('edit-faqs')->middleware('isLoggedAdmin');;
Route::post('/staff/admin/system-configuration/faqs/edit', [FaqsController::class, 'faqsUpdate'])->name('update-faqs')->middleware('isLoggedAdmin');

//announcements routes
Route::get('/staff/admin/system-configuration/announcements', [AdminController::class, 'systemAnnouncements'])->middleware('isLoggedAdmin');
Route::post('/staff/admin/system-configuration/announcement/insert', [AdminController::class, 'insertAnnouncements'])->name('admin.insert-announcements')->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/announcements/view-image/{id}', [AdminController::class, 'viewImage'])->name('admin.view-image')->middleware('isLoggedAdmin');

//comprehensive routes
Route::get('/staff/admin/comprehensive-exam', [AdmissionOfficerController::class, 'comprehensiveExam'])->name('admin.comprehensive-exam')->middleware('isLoggedAdmin');
Route::post('/staff/admin/comprehensive-exam', [MainController::class, 'insertComprehensiveExam'])->name('insert-comprehensive-exam')->middleware('isLoggedAdmin');
Route::get('/staff/admin/comprehensive-exam/delete/{id}', [AdmissionOfficerController::class, 'comprehensiveExamDelete'])->name('exam-delete')->middleware('isLoggedAdmin');
Route::get('/staff/admin/comprehensive-exam/{id}', [AdmissionOfficerController::class, 'comprehensiveExamView'])->name('admin.exam-view')->middleware('isLoggedAdmin');

//Admin routes
Route::get('/staff/auth/login', [AdminController::class, 'loginAdmin']);
Route::get('/staff/auth/register', [AdminController::class, 'register'])->middleware('adminAlreadyLoggedIn');
Route::post('/staff/auth/register-admin', [AdminController::class, 'saveAdmin'])->name('auth.save-admin');

//update admin user credentials
Route::get('/staff/admin/edit/{id}', [AdminController::class, 'editAdminDetails'])->name('edit-admin')->middleware('isLoggedAdmin');
Route::post('/staff/admin/edit', [AdminController::class, 'updateAdminDetails'])->name('update-admin')->middleware('isLoggedAdmin');

//delete admin user
Route::get('/staff/admin/delete/{id}', [AdminController::class, 'deleteAdminUser'])->name('delete-admin')->middleware('isLoggedAdmin');

//Verify and login admin routes
Route::post('/staff/auth/verify', [AdminController::class, 'verify'])->name('auth.verify-admin');
Route::get('/staff/admin/manage-users', [AdminController::class, 'manageUsersView'])->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/faqs', [AdminController::class, 'systemFaqs'])->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/technicalsupport', [AdminController::class, 'systemTechnicalsupport'])->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/technicalsupport/delete/{id}', [AdminController::class, 'deleteTechnicalForm'])->name('technicalform-delete')->middleware('isLoggedAdmin');
Route::get('/staff/auth/logout', [AdminController::class, 'logoutAdmin'])->name('auth.logout-admin');
Route::get('/staff/auth/system-configuration/active-semester', [AdminController::class, 'activeSemester'])->name('auth.active-semester')->middleware('isLoggedAdmin');

//Admission Officer Course routes
Route::get('/staff/admin/dashboard', [AdmissionOfficerController::class, 'dashboard'])->name('admin.dashboard')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pre-enrollment/new', [AdmissionOfficerController::class, 'preEnrollmentNew'])->name('admin.pre-enrollment-new')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pre-enrollment/continuing', [AdmissionOfficerController::class, 'preEnrollmentContinuing'])->name('admin.pre-enrollment-continuing')->middleware('isLoggedAdmin');
Route::get('/staff/admin/enrolled', [AdmissionOfficerController::class, 'enrolledStudents'])->name('admin.enrolled')->middleware('isLoggedAdmin');
Route::get('/staff/admin/enrolled/view/{id}', [AdmissionOfficerController::class, 'viewEnrolledStudent'])->name('admin.view-enrolled-students')->middleware('isLoggedAdmin');
Route::get('/staff/admin/enrolled/edit/{id}', [AdmissionOfficerController::class, 'editEnrolledStudent'])->name('admin.edit-enrolled-students')->middleware('isLoggedAdmin');
Route::post('/staff/admin/enrolled/edit', [AdmissionOfficerController::class, 'updateEnrolledStudent'])->name('update-enrolled-students')->middleware('isLoggedAdmin');
Route::get('/staff/admin/enrolled/delete/{id}', [AdmissionOfficerController::class, 'deleteEnrolledStudent'])->name('delete-enrolled-students')->middleware('isLoggedAdmin');
Route::get('/staff/admin/student-users', [AdmissionOfficerController::class, 'studentUsers'])->name('admin.student-users')->middleware('isLoggedAdmin');
Route::get('/staff/admin/student-users/create/{id}', [AdmissionOfficerController::class, 'creatingStudentUser'])->name('admin.create-student-users')->middleware('isLoggedAdmin');
Route::post('/staff/admin/student-users/create', [AdmissionOfficerController::class, 'createStudentUser'])->name('create-student-users')->middleware('isLoggedAdmin');
Route::get('/staff/admin/student-users/edit/{id}', [AdmissionOfficerController::class, 'editStudentUser'])->name('admin.edit-student-users')->middleware('isLoggedAdmin');
Route::get('/staff/admin/student-users/edit', [AdmissionOfficerController::class, 'updateStudentUser'])->name('admin.update-student-users')->middleware('isLoggedAdmin');
Route::get('/staff/admin/student-users/delete/{id}', [AdmissionOfficerController::class, 'deleteStudentUser'])->name('delete-student-users')->middleware('isLoggedAdmin');
//Route Advising and Assigning Subjects

//Adviser
Route::get('/staff/admin/list-of-adviser', [AdmissionOfficerController::class, 'adviserList'])->name('admin.instructor')->middleware('isLoggedAdmin');
Route::get('/staff/admin/list-of-adviser/delete/{id}', [AdmissionOfficerController::class, 'adviserDelete'])->name('delete-adviser')->middleware('isLoggedAdmin');
Route::get('/staff/admin/list-of-adviser/edit/{id}', [AdmissionOfficerController::class, 'adviserEdit'])->name('edit-adviser')->middleware('isLoggedAdmin');
Route::post('/staff/admin/list-of-adviser/edit', [AdmissionOfficerController::class, 'adviserUpdate'])->name('update-adviser')->middleware('isLoggedAdmin');
Route::post('/staff/admin/list-of-adviser', [AdmissionOfficerController::class, 'adviserInsert'])->name('insert-adviser')->middleware('isLoggedAdmin');
//Subjects
Route::get('/staff/admin/subjects/delete/{id}', [AdmissionOfficerController::class, 'deleteSubjects'])->name('delete-subject')->middleware('isLoggedAdmin');
Route::get('/staff/admin/subjects/edit/{id}', [AdmissionOfficerController::class, 'editSubjects'])->name('edit-subject')->middleware('isLoggedAdmin');
Route::post('/staff/admin/subjects/edit/', [AdmissionOfficerController::class, 'updateSubject'])->name('update-subject')->middleware('isLoggedAdmin');
Route::get('/staff/admin/subjects', [AdmissionOfficerController::class, 'subjectList'])->name('admin.subjects')->middleware('isLoggedAdmin');
Route::post('/staff/admin/subjects', [AdmissionOfficerController::class, 'saveSubject'])->name('auth.save-subject')->middleware('isLoggedAdmin');
//Advising and Assigning subjects
Route::get('/staff/admin/advising-assigning', [AdmissionOfficerController::class, 'advisingAndAssigning'])->name('admin.advise-assign-subjects')->middleware('isLoggedAdmin');
Route::get('/staff/admin/advising-assigning/delete/{id}', [AdmissionOfficerController::class, 'deletePreviousAssignSubject'])->name('delete-advising-assigning-subject')->middleware('isLoggedAdmin');
Route::get('/staff/admin/advising-assigning/approve/{id}', [AdmissionOfficerController::class, 'editAdvisingAndAssignSubject'])->name('edit-advising-assigning-subject')->middleware('isLoggedAdmin');
Route::post('/staff/admin/advising-assigning/approve/', [AdmissionOfficerController::class, 'approveAdvisingAndAssigningSubject'])->name('advising-and-assign-subject')->middleware('isLoggedAdmin');
//Programs
Route::get('/staff/admin/programs', [AdmissionOfficerController::class, 'programList'])->name('admin.programs')->middleware('isLoggedAdmin');
Route::get('/staff/admin/programs/edit/{id}', [AdmissionOfficerController::class, 'programEdit'])->name('edit-program')->middleware('isLoggedAdmin');
Route::post('/staff/admin/programs/edit', [AdmissionOfficerController::class, 'programUpdate'])->name('update-program')->middleware('isLoggedAdmin');
Route::post('/staff/admin/programs', [AdmissionOfficerController::class, 'programInsert'])->name('insert-program')->middleware('isLoggedAdmin');
Route::get('/staff/admin/programs/delete/{id}', [AdmissionOfficerController::class, 'programDelete'])->name('delete-program')->middleware('isLoggedAdmin');


//Admission Officer ThesisManagement routes
Route::get('/staff/admin/thesis-directory', [ThesisManagementController::class, 'thesisDirectory'])->name('admin.thesis-directory')->middleware('isLoggedAdmin');
Route::get('/staff/admin/thesis-scheduling', [ThesisManagementController::class, 'thesisScheduling'])->name('admin.thesis-scheduling')->middleware('isLoggedAdmin');
Route::get('/staff/admin/thesis-directory/delete/{id}', [ThesisManagementController::class, 'thesisDelete'])->name('thesis-delete')->middleware('isLoggedAdmin');
Route::get('/staff/admin/thesis-directory/edit/{id}', [ThesisManagementController::class, 'thesisEdit'])->name('thesis-edit')->middleware('isLoggedAdmin');
Route::post('/staff/admin/thesis-directory/edit', [ThesisManagementController::class, 'thesisUpdate'])->name('thesis-update')->middleware('isLoggedAdmin');
Route::post('/staff/admin/thesis-directory/save', [ThesisManagementController::class, 'thesisSave'])->name('thesis-save')->middleware('isLoggedAdmin');
Route::get('/staff/admin/thesis-scheduling/schedule/{id}', [ThesisManagementController::class, 'schedulingThesis'])->name('student-schedule')->middleware('isLoggedAdmin');
Route::post('/staff/admin/thesis-scheduling/schedule', [ThesisManagementController::class, 'setSchedule'])->name('set-schedule')->middleware('isLoggedAdmin');
Route::get('/student/auth/student-thesis/directory/view-pdf/{id}', [ThesisManagementController::class, 'viewStudentThesis'])->name('auth.view-thesis-pdf')->middleware('isLoggedStudent');
Route::get('/staff/admin/thesis-directory/view-pdf/{id}', [ThesisManagementController::class, 'viewAdminThesis'])->name('admin.view-thesis-pdf')->middleware('isLoggedAdmin');

//Students
//delete pending students
Route::get('/staff/admin/pre-enrollment/delete/{id}', [AdmissionOfficerController::class, 'deletePreEnrollee'])->name('student-delete')->middleware('isLoggedAdmin');
//approve students
Route::get('/staff/admin/pre-enrollment/approve/{id}', [AdmissionOfficerController::class, 'editPreEnrollees'])->name('student-edit')->middleware('isLoggedAdmin');
Route::post('/staff/admin/pre-enrollment/approve', [AdmissionOfficerController::class, 'approvePreEnrollees'])->name('approve-student')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pre-enrollment/approve/view-pdf/{id}', [AdmissionOfficerController::class, 'viewPDF'])->name('admin.view-pdf')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pre-enrollment/{file_name}', [AdmissionOfficerController::class, 'downloadPDF'])->name('admin.download-pdf')->middleware('isLoggedAdmin');

//Pending Students routes
Route::get('/staff/admin/pending', [AdmissionOfficerController::class, 'pendingStudents'])->name('admin.pending')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pending/edit/{id}', [AdmissionOfficerController::class, 'editStatusPendingStudents'])->name('edit-pending')->middleware('isLoggedAdmin');
Route::post('/staff/admin/pending/edit', [AdmissionOfficerController::class, 'updatePending'])->name('admin.edit-pending')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pending/delete/{id}', [AdmissionOfficerController::class, 'deletePending'])->name('delete-pending')->middleware('isLoggedAdmin');
Route::post('/staff/admin/pending/approve', [AdmissionOfficerController::class, 'approvePending'])->name('approve-pending')->middleware('isLoggedAdmin');
Route::get('/staff/admin/pending/approve/{id}', [AdmissionOfficerController::class, 'approveView'])->name('approving-pending')->middleware('isLoggedAdmin');



//Welcome Page
//Admission routes
Route::get('/enrollment', [EnrollmentController::class, 'admission'])->name('enrollment');
//Process route
Route::get('/process', [ProcessController::class, 'process'])->name('process');

