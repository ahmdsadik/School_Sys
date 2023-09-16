<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\studentParentsController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::view('/', 'dashboard')->middleware('auth')->name('/');
        Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');

        // // Ajax Routes for All Grades
        // Route::get('/getGrades', [GradeController::class, 'getGrades'])->name('all-grades');
        // Grades Controller
        Route::resource('grades', GradeController::class);

        // Classrooms Controller
        Route::get('/allClassrooms/{grade_id}', [ClassroomController::class, 'allClasses'])->name('all-classrooms');
        Route::resource('classrooms', ClassroomController::class);

        // Sections Controller
        Route::resource('sections', SectionController::class);


        // Profile Management
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        // Parents Controller
        Route::resource('parents', studentParentsController::class);

        // Teachers Controller
        Route::resource('teachers', TeacherController::class);

        // Students Controller
        Route::get('show-attachment/{path}/{filename}', [StudentController::class, 'showAttachment'])->name('students.show-attachment');
        Route::get('download-attachment/{path}/{filename}', [StudentController::class, 'downloadAttachment'])->name('students.download-attachment');
        Route::get('delete-attachment/{image}', [StudentController::class, 'deleteAttachment'])->name('students.delete-attachment');
        Route::resource('students', StudentController::class);

        // Promotions Controller
        Route::resource('promotions', PromotionController::class);

        // Fees Controller
        Route::resource('fees', FeeController::class);

        // Attendance Controller
        Route::resource('attendances', AttendanceController::class);

        // Test Route
        Route::get('/test', function () {
            return view('test');
        });
    });


    require __DIR__ . '/auth.php';
});


Route::get('uploads/{filename}', function ($file_path) {
    $path = public_path('uploads/' . $file_path);
    return response()->file($path);
})->name('attachments.show');
