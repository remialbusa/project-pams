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



//students routes
Route::get('/student/auth/login', [MainController::class, 'login'])->name('student.login');
Route::get('/student/auth/register-student', [MainController::class, 'register'])->middleware('studentAlreadyLoggedIn');
Route::post('/student/auth/register-student/save', [MainController::class, 'saveStudent'])->name('auth.save');
Route::post('/student/auth/verify', [MainController::class, 'verify'])->name('auth.verify-student');
Route::get('/student/auth/register-new-student', [MainController::class, 'registerNewStudent']);

//student profile routes
Route::get('/student/auth/student-profile', [MainController::class, 'profileView'])->middleware('isLoggedStudent');
Route::get('/student/auth/payment', [MainController::class, 'paymentView'])->middleware('isLoggedStudent');
Route::get('/student/auth/logout', [MainController::class, 'logout'])->name('auth.logout-student');
Route::get('/student/auth/dashboard', [MainController::class, 'dashboard'])->middleware('isLoggedStudent');

//student profile update
Route::post('/student/auth/student-profile/update', [MainController::class, 'updateStudentDetails'])->name('update-student');

//student monitor routes
Route::get('/student/auth/monitor-enrollment', [MainController::class, 'enrollmentStatus'])->middleware('isLoggedStudent');

//student thesis routes
Route::get('/student/auth/student-thesis/directory', [ThesisManagementController::class, 'studentThesisDirectory'])->middleware('isLoggedStudent');
Route::get('/student/auth/student-thesis/schedule', [ThesisManagementController::class, 'studentThesisSchedule'])->middleware('isLoggedStudent');

//faqs routes
Route::get('/faqs',[FaqsController::class, 'faqsStudent']);


//Admin routes
Route::get('/staff/auth/login', [AdminController::class, 'loginAdmin']);
Route::get('/staff/auth/register', [AdminController::class, 'register'])->middleware('adminAlreadyLoggedIn');
Route::post('/staff/auth/register-admin', [AdminController::class, 'saveAdmin'])->name('auth.save-admin');

//update admin user credentials
Route::get('/staff/admin/edit/{id}', [AdminController::class, 'editAdminDetails'])->name('edit-admin');
Route::post('/staff/admin/edit', [AdminController::class, 'updateAdminDetails'])->name('update-admin');

//delete admin user
Route::get('/staff/admin/delete/{id}', [AdminController::class, 'deleteAdminUser'])->name('delete-admin');

//Verify and login admin routes
Route::post('/staff/auth/verify', [AdminController::class, 'verify'])->name('auth.verify-admin');
Route::get('/staff/admin/manage-users', [AdminController::class, 'manageUsersView'])->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/announcements', [AdminController::class, 'systemAnnouncements'])->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/faqs', [AdminController::class, 'systemFaqs'])->middleware('isLoggedAdmin');
Route::get('/staff/admin/system-configuration/technicalsupport', [AdminController::class, 'systemTechnicalsupport'])->middleware('isLoggedAdmin');
Route::get('/staff/auth/logout', [AdminController::class, 'logoutAdmin'])->name('auth.logout-admin');

//Admission Officer Course routes
Route::get('/staff/admin/dashboard', [AdmissionOfficerController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/staff/admin/pre-enrollment/new', [AdmissionOfficerController::class, 'preEnrollmentNew'])->name('admin.pre-enrollment-new');
Route::get('/staff/admin/pre-enrollment/continuing', [AdmissionOfficerController::class, 'preEnrollmentContinuing'])->name('admin.pre-enrollment-continuing');
Route::get('/staff/admin/enrolled', [AdmissionOfficerController::class, 'enrolledStudents'])->name('admin.enrolled');
Route::get('/staff/admin/assign-subjects', [AdmissionOfficerController::class, 'assignSubjects'])->name('admin.assign-subjects');
Route::get('/staff/admin/subjects', [AdmissionOfficerController::class, 'subjectList'])->name('admin.subjects');
Route::post('/staff/admin/subjects', [AdmissionOfficerController::class, 'saveSubject'])->name('auth.save-subject');
Route::get('/staff/admin/advising', [AdmissionOfficerController::class, 'advisingStudent'])->name('admin.advising');
Route::get('/staff/admin/advising/edit/{id}', [AdmissionOfficerController::class, 'editAdvising'])->name('edit-advising');
Route::post('/staff/admin/advising/edit', [AdmissionOfficerController::class, 'approveAdvising'])->name('approve-advising');
Route::get('/staff/admin/list-of-instructor', [AdmissionOfficerController::class, 'instructorList'])->name('admin.instructor');
Route::get('/staff/admin/subjects/delete/{id}', [AdmissionOfficerController::class, 'deleteSubjects'])->name('delete-subject');
Route::get('/staff/admin/subjects/schedule/{id}', [AdmissionOfficerController::class, 'scheduleSubject'])->name('schedule-subject');
Route::post('/staff/admin/subjects/schedule/', [AdmissionOfficerController::class, 'assignScheduleSubject'])->name('assign-subject');
Route::get('/staff/admin/assign-subjects/delete/{id}', [AdmissionOfficerController::class, 'deletePreviousAssignSubject'])->name('delete-assign');


//Admission Officer ThesisManagement routes
Route::get('/staff/admin/thesis-directory', [ThesisManagementController::class, 'thesisDirectory'])->name('admin.thesis-directory');
Route::get('/staff/admin/thesis-scheduling', [ThesisManagementController::class, 'thesisScheduling'])->name('admin.thesis-scheduling');
Route::get('/staff/admin/thesis-directory/delete/{id}', [ThesisManagementController::class, 'thesisDelete'])->name('thesis-delete');
Route::get('/staff/admin/thesis-directory/edit/{id}', [ThesisManagementController::class, 'thesisEdit'])->name('thesis-edit');
Route::post('/staff/admin/thesis-directory/edit', [ThesisManagementController::class, 'thesisUpdate'])->name('thesis-update');
Route::post('/staff/admin/thesis-directory/save', [ThesisManagementController::class, 'thesisSave'])->name('thesis-save');


//Students
//delete pending students
Route::get('/staff/admin/pre-enrollment/delete/{id}', [AdmissionOfficerController::class, 'deletePreEnrollee'])->name('student-delete');
//approve students
Route::get('/staff/admin/pre-enrollment/approve/{id}', [AdmissionOfficerController::class, 'editPreEnrollees'])->name('student-edit');
Route::post('/staff/admin/pre-enrollment/approve', [AdmissionOfficerController::class, 'approvePreEnrollees'])->name('approve-student');
Route::get('/staff/admin/pre-enrollment/approve/view-pdf/{id}', [AdmissionOfficerController::class, 'viewPDF'])->name('admin.view-pdf');
Route::get('/staff/admin/pre-enrollment/{file_name}', [AdmissionOfficerController::class, 'downloadPDF'])->name('admin.download-pdf');

//Pending Students routes
Route::get('/staff/admin/pending', [AdmissionOfficerController::class, 'pendingStudents'])->name('admin.pending');
Route::get('/staff/admin/pending/edit/{id}', [AdmissionOfficerController::class, 'editStatusPendingStudents'])->name('edit-pending');
Route::post('/staff/admin/pending/edit', [AdmissionOfficerController::class, 'updatePending'])->name('admin.edit-pending');
Route::get('/staff/admin/pending/delete/{id}', [AdmissionOfficerController::class, 'deletePending'])->name('delete-pending');
Route::post('/staff/admin/pending/approve', [AdmissionOfficerController::class, 'approvePending'])->name('approve-pending');
Route::get('/staff/admin/pending/approve/{id}', [AdmissionOfficerController::class, 'approveView'])->name('view-pending');
//Admission routes
Route::get('/enrollment', [EnrollmentController::class, 'admission'])->name('enrollment');

//Process route
Route::get('/process', [ProcessController::class, 'process'])->name('process');

