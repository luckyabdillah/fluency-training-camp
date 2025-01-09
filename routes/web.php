<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CoursePaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController as StudentDashboardController;
use App\Http\Controllers\Dashboard\ProfileController as StudentProfileController;
use App\Http\Controllers\Dashboard\CourseController as DashboardCourseController;
use App\Http\Controllers\Dashboard\QuizController as DashboardQuizController;
use App\Http\Controllers\Dashboard\CertificateController as DashboardCertificateController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\CourseDetailController as AdminCourseDetailController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\VerficationController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [SinglePageController::class, 'index']);
Route::get('/about', [SinglePageController::class, 'about']);
Route::get('/contact', [SinglePageController::class, 'contact']);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{course}', [CourseController::class, 'show']);

Route::middleware(['auth', 'role:admin|staff'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index']);
        
        Route::get('/profile', [AdminProfileController::class, 'edit']);
        Route::put('/profile', [AdminProfileController::class, 'update']);

        Route::resource('/courses', AdminCourseController::class)->except(['show']);
        Route::resource('/courses/{course}/details', AdminCourseDetailController::class);
        Route::resource('/quizzes', AdminQuizController::class)->only(['index', 'show', 'update']);
        Route::resource('/quizzes/{quiz}/questions', AdminQuestionController::class)->only(['store', 'update', 'destroy']);
        Route::get('/quizzes/{quiz}/results', [AdminQuizController::class, 'results']);
        Route::get('/courses/{course}/participants', [ParticipantController::class, 'index']);
    
        Route::get('/questions/{question}/get-options', [AdminQuestionController::class, 'getOptions']);
        
        Route::get('/verifications', [VerficationController::class, 'index']);
        Route::put('/verifications/{verification}', [VerficationController::class, 'update']);
        Route::delete('/verifications/{verification}', [VerficationController::class, 'destroy']);

        Route::resource('students', StudentController::class)->only(['index']);

        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::resource('users', UserController::class);
            Route::put('users/{user}/reset-password', [UserController::class, 'resetPassword']);
        });
    });
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::post('/courses/{course}', [EnrollmentController::class, 'store']);
    Route::get('/courses/{course}/payment', [CoursePaymentController::class, 'create']);
    Route::post('/courses/{course}/payment', [CoursePaymentController::class, 'store']);
    
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [StudentDashboardController::class, 'index']);

        Route::get('/profile', [StudentProfileController::class, 'edit']);
        Route::put('/profile', [StudentProfileController::class, 'update']);

        Route::delete('/courses/{course}/unenroll', [EnrollmentController::class, 'destroy']);

        Route::get('/courses', [DashboardCourseController::class, 'index']);
        Route::get('/courses/{course}', [DashboardCourseController::class, 'show']);
        Route::get('/courses/{course}/quiz', [DashboardQuizController::class, 'index']);
        Route::post('/courses/{course}/quiz', [DashboardQuizController::class, 'store']);

        Route::get('/certificates', [DashboardCertificateController::class, 'index']);
        Route::get('/certificates/{certificate}', [DashboardCertificateController::class, 'exportPDF']);
    });
});

require __DIR__.'/auth.php';
