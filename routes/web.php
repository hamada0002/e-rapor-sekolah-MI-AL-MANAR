<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
Route::get('/dashboard', [AnnouncementController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/input-nilai', [StudentController::class, 'inputNilai'])->name('students.input-nilai');
    Route::post('/students/{student}/store-nilai', [StudentController::class, 'storeNilai'])->name('students.store-nilai');
    Route::get('/kelas/{class}', [StudentController::class, 'showClass'])->name('students.class');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::resource('teachers', TeacherController::class);
    Route::get('students/{student}/download-pdf', [StudentController::class, 'downloadPdf'])->name('students.download-pdf');
});


require __DIR__.'/auth.php';
