<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RoleController;


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

Route::get('/', function () {
    return view('testing');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

    Route::get('/about-company', function () {
    return view('about-company');
})->name('about-company');

//Registeration Page
// Route::get('register',[RoleController::class,'retriveRoles']); 

//To add an Employee
Route::get('addemp',[EmployeeController::class,'addEmployee']); 
Route::post('storeemp',[EmployeeController::class,'storeEmployee']);

//To display Employees
Route::get('fetchemp',[EmployeeController::class,'retriveEmployee'])->middleware('admins');

//To delete and update Employee
Route::get('delete-emp/{id}',[EmployeeController::class,'deleteEmployee']);
Route::get('show-emp-to-update/{id}',[EmployeeController::class,'showEmployeeToUpdate']);
Route::post('update-emp',[EmployeeController::class,'updateEmployee']);
Route::get('pdf-emp/{id}',[PDFController::class,'createPDF']);

//Admin view Qualification, Experience, Family
Route::get('display-qualifications_to_admin',[QualificationController::class,'displayQualificationsToAdmin'])->middleware('admins');;
Route::get('display-experiences_to_admin',[ExperienceController::class,'displayExperiencesToAdmin'])->middleware('admins');;
Route::get('display-family_to_admin',[FamilyController::class,'displayFamiliesToAdmin'])->middleware('admins');;


//Employee can view his Profile
Route::get('profile',[UserController::class,'fetch_display_EmployeeProfile']);


//Employee can Add and view Qualification view
Route::get('emp-qualification',[QualificationController::class,'displayQualificaitonPage']);
Route::post('add-qualify',[QualificationController::class,'addQualification']);
Route::get('display-qualification-info',[QualificationController::class,'displayQualificationInfo']);
Route::get("delete-qualification/{id}",[QualificationController::class,'deleteOptionforEmployee']);
Route::get("show-qualification-to-edit/{id}",[QualificationController::class,'show_qualificaiton_info_to_edit']);
Route::post("edit-qualification",[QualificationController::class,'editQualification']);


//Employee can Add and view Experience view
Route::get('emp-experience',[ExperienceController::class,'displayExperience']);
Route::post('add-experience',[ExperienceController::class,'addExperience']);
Route::get("delete-experience/{id}",[ExperienceController::class,'deleteOptionforEmployee']);
Route::get('show-experience-to-edit/{id}',[ExperienceController::class,'show_experience_info_to_edit']);
Route::post("edit-experience",[ExperienceController::class,'editExperience']);

//Employee Family view
Route::get('emp-fam',[FamilyController::class,'displayFamily']);
Route::post('add-family',[FamilyController::class,'addFamily']);
Route::get("delete-relation/{id}",[FamilyController::class,'deleteOptionforEmployee']);
Route::get('show-relation-to-edit/{id}',[FamilyController::class,'show_relation_info_to_edit']);
Route::post('edit-relation',[FamilyController::class,'editRelation']);


//Import Excel
Route::get('/import-form',[EmployeeController::class,'importForm']);
Route::post('import',[EmployeeController::class,'import'])->name('employee.import');

//Export Excel
Route::get('/export-excel',[EmployeeController::class,'exportIntoExcel']);

//Roles
Route::get('set-role',[RoleController::class,'showRoleSetPage']);
Route::post('add-role',[RoleController::class,'addrole']);
Route::get('get-roles',[RoleController::class,'retriveRoles']);
Route::get('show-role-to-edit/{id}',[RoleController::class,'showRoleToEdit']);
Route::post('edit-role',[RoleController::class,'editRole']);
Route::get('delete-role/{id}',[RoleController::class,'deleteRole']);

});

// Route::get('addemp',[EmployeeController::class,'addEmployee']); 
// Route::post('storeemp',[EmployeeController::class,'storeEmployee']);

// Route::get('fetchemp',[EmployeeController::class,'retriveEmployee']);

// Route::get('delete/{id}',[EmployeeController::class,'deleteEmployee']);

// //Just seeing views
// Route::view('emp-qualify','emp-qualification');

//Just wanna check if im able to fetch users table data
// Route::get('login-fetch',[UserController::class,'fetchLogindata']);
Route::view('test-page','test');
Route::get('get-admins',[UserController::class,'admins']);

