<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CrisisController;
use App\Http\Controllers\Backend\CrisistypesController;
use App\Http\Controllers\Backend\DonationController;
use App\Http\Controllers\Backend\DonorController;
use App\Http\Controllers\Backend\ExpenseCategoryController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\VolunteerController;
use App\Http\Controllers\Backend\VolunteerTocrisisController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',[HomeController::class,'home']);
Route::get('/Dashboard',[DashboardController::class,'dashboard']);
Route::get('/Crisis',[CrisisController::class,'crisis']);
Route::get('/Crisistypes',[CrisistypesController::class,'crisistypes']);
Route::get('/Donation',[DonationController::class,'donation']);
Route::get('/Donor',[DonorController::class,'donor']);
Route::get('/Expense',[ExpenseController::class,'expense']);
Route::get('/Expense/Category',[ExpenseCategoryController::class,'expense_category']);
Route::get('/Location',[LocationController::class,'location']);
Route::get('/Volunteer',[VolunteerController::class,'volunteer']);
Route::get('/VolunteerToCrisis',[VolunteerTocrisisController::class,'volunteer_to_crisis']);

