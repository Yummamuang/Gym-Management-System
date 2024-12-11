<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TrainersController;
use App\Http\Controllers\MembercardController;
use App\Http\Controllers\TrainercardController;
use App\Http\Controllers\TrainerscardController;

/* Home Route */
Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('get.home');

Route::controller(MembersController::class)->group(function () {
    /* Forgot password Members Route */
    Route::get('members/forgot-password', 'forgot_password')-> name('forgot.Members');
    Route::post('members/forgot-password', 'forgot_passwordPost')-> name('forgotPost.Members');
    /* Reset password Members Route */
    Route::get('members/reset-password/{token}', 'reset_password')-> name('resetPassword.Members');
    Route::post('members/reset-password', 'reset_passwordPost')-> name('resetPasswordPost.Members');

    Route::get('members/register-success', 'success')-> name('registerSuccess.Members');
});

Route::group(['middleware' => 'auth.members'], function () {
    /* Dashboard Members Route */
    Route::get('members/dashboard', [MembersController::class,'index'])-> name('dashboard.Members');
    /* Profile Members Route */
    Route::get('members/dashboard/profile', [MembersController::class,'profile'])-> name('profile.Members');
    Route::post('members/dashboard/profile', [MembersController::class,'profileUpdate'])-> name('profileUpdate.Members');
    Route::post('members/dashboard/profile-picture', [MembersController::class,'profilePicture'])-> name('profileUpdatePicture.Members');
    /* Logout Members Route */
    Route::get('members/dashboard/logout', [MembersController::class,'logout'])-> name('logout.Members');
    /* Course Members Route */
    Route::get('members/dashboard/course', [MembersController::class,'course'])-> name('course.Members');
    /* Add Course Members Route */
    Route::get('members/dashboard/course/add/{memberid}-{courseid}-{day}-{price}', [MembersController::class,'addcourse'])-> name('addcourse.Members');
    /* CheckIn Members Route */
    Route::get('members/dashboard/checkin-history', [MembersController::class,'checkin'])-> name('checkin.Members');
    /* CheckIn Members Route */
    Route::get('members/dashboard/member-card', [MembersController::class,'memberCard'])-> name('card.Members');

    Route::get('members/dashboard/checkin-history/test-checkin/{memberid}-{fullname}', [MembercardController::class,'checkin'])-> name('testCheckin.Members');
    Route::get('members/dashboard/checkin-history/test-checkout/{memberid}', [MembercardController::class,'checkout'])-> name('testCheckout.Members');

});

/* Members Controller */
Route::group(['middleware' => 'auth.members.logged'], function () {
    /* Login Members Route */
    Route::get('members/login', [MembersController::class,'login'])-> name('login.Members');
    Route::post('members/login', [MembersController::class,'loginPost'])-> name('loginPost.Members');
    /* Register Members Route */
    Route::get('members/register', [MembersController::class,'register'])-> name('register.Members');
    Route::post('members/register', [MembersController::class,'registerPost'])-> name('registerPost.Members');

});


/* Trainers Controller */
Route::controller(TrainersController::class)->group(function () {
    /* Forgot password Trainers Route */
    Route::get('trainers/forgot-password', 'forgot_password')-> name('forgot.Trainers');
    Route::post('trainers/forgot-password', 'forgot_passwordPost')-> name('forgotPost.Trainers');
    /* Reset password Trainers Route */
    Route::get('trainers/reset-password/{token}', 'reset_password')-> name('resetPassword.Trainers');
    Route::post('trainers/reset-password', 'reset_passwordPost')-> name('resetPasswordPost.Trainers');

    Route::get('trainers/register-success', 'success')-> name('registerSuccess.Trainers');
});

Route::group(['middleware' => 'auth.trainers'], function () {
    /* Dashboard Trainers Route */
    Route::get('trainers/dashboard', [TrainersController::class, 'index'])->name('dashboard.Trainers');
    /* Profile Trainers Route */
    Route::get('trainers/dashboard/profile', [TrainersController::class, 'profile'])->name('profile.Trainers');
    Route::post('trainers/dashboard/profile', [TrainersController::class,'profileUpdate'])-> name('profileUpdate.Trainers');
    Route::post('trainers/dashboard/profile-picture', [TrainersController::class,'profilePicture'])-> name('profileUpdatePicture.Trainers');
    /* Logout Trainers Route */
    Route::get('trainers/dashboard/logout', [TrainersController::class, 'logout'])->name('logout.Trainers');
    /* Course Trainers Route */
    Route::get('trainers/dashboard/course', [TrainersController::class,'course'])-> name('course.Trainers');
    Route::get('trainers/dashboard/course/add/{trainerid}-{courseid}', [TrainersController::class,'addcourse'])-> name('addcourse.Trainers');
    /* CheckIn Trainers Route */
    Route::get('trainers/dashboard/checkin-history', [TrainersController::class,'checkin'])-> name('checkin.Trainers');

    Route::get('trainers/dashboard/trainer-card', [TrainersController::class,'trainerCard'])-> name('card.Trainers');

    Route::get('trainers/dashboard/checkin-history/test-checkin/{trainerid}-{fullname}', [TrainercardController::class,'checkin'])-> name('testCheckin.Trainers');
    Route::get('trainers/dashboard/checkin-history/test-checkout/{trainerid}', [TrainercardController::class,'checkout'])-> name('testCheckout.Trainers');
});

Route::group(['middleware' => 'auth.trainers.logged'], function () {
    /* Login Trainers Route */
    Route::get('trainers/login', [TrainersController::class, 'login'])->name('login.Trainers');
    Route::post('trainers/login', [TrainersController::class, 'loginPost'])->name('loginPost.Trainers');
    /* Register Trainers Route */
    Route::get('trainers/register', [TrainersController::class, 'register'])->name('register.Trainers');
    Route::post('trainers/register', [TrainersController::class, 'registerPost'])->name('registerPost.Trainers');
});

//Route Admin
Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('admin/dashboard', [AdminController::class,'index'])-> name('dashboard.Admin');
    Route::get('admin/dashboard/logout', [AdminController::class,'logout'])-> name('logout.Admin');
    Route::get('admin/dashboard/course', [AdminController::class,'course'])-> name('course.Admin');
    Route::get('admin/dashboard/course/add', [AdminController::class,'addCourse'])-> name('addCourse.Admin');
    Route::post('admin/dashboard/course/add', [AdminController::class,'addCoursePost'])-> name('addCoursePost.Admin');
    Route::get('admin/dashboard/course/delete/{id}', [AdminController::class,'deleteCourses'])-> name('deleteCourses.Admin');

    Route::get('admin/dashboard/exercise', [AdminController::class,'exercise'])-> name('exercise.Admin');
    Route::get('admin/dashboard/exercise/add', [AdminController::class,'addExercise'])-> name('addExercise.Admin');
    Route::post('admin/dashboard/exercise/add', [AdminController::class,'addExercisePost'])-> name('addExercisePost.Admin');
    Route::get('admin/dashboard/exercise/edit/{id}', [AdminController::class,'editExercise'])-> name('editExercise.Admin');
    Route::post('admin/dashboard/exercise/edit/{id}', [AdminController::class,'editExercisePost'])-> name('editExercisePost.Admin');
    Route::get('admin/dashboard/exercise/delete/{id}', [AdminController::class,'deleteExercise'])-> name('deleteExercise.Admin');

    Route::get('admin/dashboard/diet-plan', [AdminController::class,'diet_plan'])-> name('dietPlan.Admin');
    Route::get('admin/dashboard/diet-plan/add', [AdminController::class,'addDiet_plan'])-> name('addDietPlan.Admin');
    Route::post('admin/dashboard/diet-plan/add', [AdminController::class,'addDiet_planPost'])-> name('addDietPlanPost.Admin');
    Route::get('admin/dashboard/diet-plan/edit/{id}', [AdminController::class,'editDiet_plan'])-> name('editDietPlan.Admin');
    Route::post('admin/dashboard/diet-plan/edit/{id}', [AdminController::class,'editDiet_planPost'])-> name('editDietPlanPost.Admin');
    Route::get('admin/dashboard/diet-plan/delete/{id}', [AdminController::class,'deleteDiet_plan'])-> name('deleteDiet.Admin');

    Route::get('admin/dashboard/members', [AdminController::class,'members'])-> name('members.Admin');
    Route::get('admin/dashboard/members/delete/{id}', [AdminController::class,'deleteMembers'])-> name('deleteMembers.Admin');
    Route::get('admin/dashboard/trainers', [AdminController::class,'trainers'])-> name('trainers.Admin');
    Route::get('admin/dashboard/trainers/delete/{id}', [AdminController::class,'deleteTrainers'])-> name('deleteTrainers.Admin');
});

Route::group(['middleware' => 'auth.trainers.logged'], function () {
    Route::get('admin/login', [AdminController::class, 'login'])-> name('login.Admin');
    Route::post('admin/login', [AdminController::class, 'loginPost'])-> name('loginPost.Admin');
});
