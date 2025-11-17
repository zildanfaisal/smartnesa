<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/live-course', [FrontendController::class, 'livecourse'])->name('live-course');
Route::get('/e-learning', [FrontendController::class, 'elearning'])->name('e-learning');
Route::get('/event-smartnesa', [FrontendController::class, 'eventSmartnesa'])->name('event-smartnesa');
Route::get('/event-national', [FrontendController::class, 'eventNational'])->name('event-national');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/simpelmawa', [FrontendController::class, 'simpelmawa'])->name('simpelmawa');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Admin Dashboard
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        // User management (admin only)
        Route::get('/users/index', [AdminController::class, 'createIndex'])->name('users.index');
        Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminController::class, 'store'])->name('users.store');
        // Route to edit a user
        Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
        // Route to update a user
        Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

        // Quiz Attempts (admin)
        Route::prefix('quiz')->name('quiz.')->group(function () {
            Route::get('/attempts', [QuizController::class, 'adminIndex'])->name('attempt.index');
        });
    });

    // Mentor Dashboard
    Route::middleware(['role:mentor'])->prefix('mentor')->name('mentor.')->group(function () {
        Route::get('/', [MentorController::class, 'index'])->name('index');
        Route::get('/project', [MentorController::class, 'projectIndex'])->name('project.index');
        Route::get('/project/{id}', [MentorController::class, 'projectShow'])->name('project.show');
        Route::post('/project/{id}/comment', [MentorController::class, 'updateComment'])->name('project.comment');
        Route::delete('/project/{id}/comment', [MentorController::class, 'deleteComment'])->name('project.comment.delete');
    });

    // User Dashboard
    Route::middleware(['role:user'])->prefix('dashboard')->name('user.')->group(function () {


        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::get('/project', [DashboardController::class, 'projectIndex'])->name('project.index');
        Route::get('/project/create', [DashboardController::class, 'projectCreate'])->name('project.create');
        Route::post('/project', [DashboardController::class, 'projectStore'])->name('project.store');
        Route::get('/project/{id}', [DashboardController::class, 'projectShow'])->name('project.show');
        Route::get('/project/{id}/edit', [DashboardController::class, 'projectEdit'])->name('project.edit');
        Route::put('/project/{id}', [DashboardController::class, 'projectUpdate'])->name('project.update');
        Route::delete('/project/{id}', [DashboardController::class, 'projectDestroy'])->name('project.destroy');

        Route::prefix('courses')->name('courses.')->group(function () {

            // Materi pages
            Route::view('/materi/1', 'user.courses.materi.materi1')->name('materi.1');
            Route::view('/materi/2', 'user.courses.materi.materi2')->name('materi.2');

            // Quiz submit
            Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
        });

        // Enrolled Courses (punya temanmu)
        Route::get('/courses/enrolled', [DashboardController::class, 'enrolledCourses'])->name('courses.enrolled');

        /** ---------------------------------------------------------
         * QUIZ ATTEMPTS (punya temanmu)
         * --------------------------------------------------------*/
        Route::prefix('quiz')->name('quiz.')->group(function () {
            Route::get('/attempts', [QuizController::class, 'index'])->name('attempt.index');
        });

    });


    // Profile Routes (accessible by all roles)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
