<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminCourseController;
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

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/course-detail/{id}', [WebController::class, 'detail'])->name('course-detail');
Route::get('/enroll-now/{id}', [WebController::class, 'enroll'])->name('enroll-now');

Route::get('/user-login', [AuthController::class, 'login'])->name('user-login');
Route::post('/new-login', [AuthController::class, 'newLogin'])->name('new-login');
Route::post('/user-logout', [AuthController::class, 'logout'])->name('user-logout');
Route::get('/user-resister', [AuthController::class, 'register'])->name('user-resister');

Route::get('/teacher-dashboard', [TeacherDashboardController::class, 'index'])->name('teacher-dashboard');

Route::get('/add-subject', [SubjectController::class, 'index'])->name('add-subject');
Route::get('/manage-subject', [SubjectController::class, 'manage'])->name('manage-subject');
Route::post('/new-subject', [SubjectController::class, 'create'])->name('new-subject');
Route::get('/edit-subject/{id}', [SubjectController::class, 'edit'])->name('edit-subject');
Route::get('/delete-subject/{id}', [SubjectController::class, 'delete'])->name('delete-subject');
Route::post('/update-subject/{id}', [SubjectController::class, 'update'])->name('update-subject');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified', 'superAdmin'])->get('/add-user',[UserController::class, 'index'])->name('add-user');
Route::middleware(['auth:sanctum', 'verified', 'superAdmin'])->get('/manage-user',[UserController::class, 'manage'])->name('manage-user');
Route::middleware(['auth:sanctum', 'verified', 'superAdmin'])->get('/edit-user/{id}',[UserController::class, 'edit'])->name('edit-user');
Route::middleware(['auth:sanctum', 'verified', 'superAdmin'])->post('/update-user/{id}',[UserController::class, 'update'])->name('update-user');
Route::middleware(['auth:sanctum', 'verified', 'superAdmin'])->get('/delete-user/{id}',[UserController::class, 'delete'])->name('delete-user');
Route::middleware(['auth:sanctum', 'verified', 'superAdmin'])->post('/new-user',[UserController::class, 'create'])->name('new-user');

Route::middleware(['auth:sanctum', 'verified'])->get('/add-teacher',[TeacherController::class, 'index'])->name('add-teacher');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-teacher',[TeacherController::class, 'create'])->name('new-teacher');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-teacher',[TeacherController::class, 'manage'])->name('manage-teacher');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-teacher/{id}',[TeacherController::class, 'edit'])->name('edit-teacher');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete-teacher/{id}',[TeacherController::class, 'delete'])->name('delete-teacher');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-teacher/{id}',[TeacherController::class, 'update'])->name('update-teacher');

Route::middleware(['auth:sanctum', 'verified'])->get('/manage-course',[AdminCourseController::class, 'manage'])->name('manage-course');
Route::middleware(['auth:sanctum', 'verified'])->get('/view-detail/{id}',[AdminCourseController::class, 'detail'])->name('view-detail');
Route::middleware(['auth:sanctum', 'verified'])->get('/update-status/{id}',[AdminCourseController::class, 'updateStatus'])->name('update-status');
