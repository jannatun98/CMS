<?php
use Illuminate\Support\Facades\Route;
//Backend
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

//Frontend 
use App\Http\Controllers\Frontend\HomeController as FrontendHome;

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
//Backend Routes
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/Dashboard',[DashboardController::class,'dashboard'])->name('dashbord');
Route::get('/Crisis',[CrisisController::class,'crisis'])->name('crisis');
Route::get('/Crisistypes',[CrisistypesController::class,'crisistypes'])->name('crisis.types');
Route::get('/Donation',[DonationController::class,'donation'])->name('donation');
Route::get('/Donor',[DonorController::class,'donor'])->name('donor');
Route::get('/Expense',[ExpenseController::class,'expense'])->name('expense');
Route::get('/Expense/Category',[ExpenseCategoryController::class,'expense_category'])->name('expense.category');
Route::get('/Location',[LocationController::class,'location'])->name('location');
Route::get('/Volunteer',[VolunteerController::class,'volunteer'])->name('volunteer');
Route::get('/VolunteerToCrisis',[VolunteerTocrisisController::class,'volunteer_to_crisis'])->name('volunteer.to.crisis');


//Frontend Routes
Route::get('/front-end',[FrontendHome::class,'fhome'])->name('f.home');
