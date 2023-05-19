<?php

use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\Backend\PaymentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//Frontend 
use App\Http\Controllers\Frontend\FronthomeController;
use App\Http\Controllers\Frontend\WebcrisisController;
use App\Http\Controllers\Frontend\WebvolunteerController;
use App\Models\Crisistypes;
use App\Models\ExpenseCategory;
use App\Models\Volunteer;

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
//Frontend Routes
Route::group(["middleware" => "localization"], function () {
    Route::get('/', [FronthomeController::class, 'fhome'])->name('f.home');
    Route::post('/signup', [FronthomeController::class, 'signup'])->name('user.signup');
    Route::post('/user/login', [FronthomeController::class, 'login'])->name('user.login');

    Route::post('/volunteer/signup', [WebvolunteerController::class, 'volunteersignup'])->name('volunteer.signup');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/user/logout', [FronthomeController::class, 'logout'])->name('user.logout');
        Route::get('/profile', [FronthomeController::class, 'profile'])->name('user.profile');
        Route::put('/profile/update', [FronthomeController::class, 'updateProfile'])->name('profile.update');
        Route::get('/crisistypes/website/{id}', [FronthomeController::class, 'crisistypesview'])->name('user.crisistypes');
        Route::get('/donatenow/website/{id}', [FronthomeController::class, 'donatenowform'])->name('user.donatenowform');
        Route::post('/donatenow/submit/website/{id}', [FronthomeController::class, 'donatenowsubmit'])->name('user.donatenowsubmit');
        Route::get('/volunteer/website/{id}', [WebvolunteerController::class, 'volunteerview'])->name('user.volunteer');
        Route::get('/volunteertocrisis/website', [WebvolunteerController::class, 'volunteertocrisis'])->name('volunteer.volunteertocrisis');
        Route::get('/expense/website', [WebvolunteerController::class, 'expenseform'])->name('volunteer.expense');
        Route::post('/expense/submit/website', [WebvolunteerController::class, 'expenseformsubmit'])->name('volunteer.expenseformsubmit');
    });
    Route::get('/switch-lang/{lang}', [FronthomeController::class, 'changelanguage'])->name('switch.language');
});


//Backend & Frontend Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

//Closer function
//Backend Routes//
Route::group(['middleware' => 'auth'], function () {


    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/admin', [HomeController::class, 'home'])->name('home');
    Route::get('/Dashboard', [DashboardController::class, 'dashboard'])->name('dashbord');

    //Crisis
    Route::get('/Crisis', [CrisisController::class, 'crisis'])->name('crisis');
    Route::get('/Crisis/create', [CrisisController::class, 'crisis_create'])->name('crisis.create');
    Route::post('/Crisis/store', [CrisisController::class, 'crisis_store'])->name('crisis.store');
    Route::get('/Crisis/delete/{id}', [CrisisController::class, 'crisis_delete'])->name('crisis.delete');
    Route::get('/Crisis/edit/{id}', [CrisisController::class, 'crisis_edit'])->name('crisis.edit');
    Route::put('/Crisis/update/{id}', [CrisisController::class, 'crisis_update'])->name('crisis.update');
    Route::get('/Crisis/view/{id}', [CrisisController::class, 'crisis_view'])->name('crisis.view');
    Route::post('/Crisis/volunteer/view/{id}', [CrisisController::class, 'crisis_volunteer'])->name('crisis.volunteer');


    //Crisistypes
    Route::get('/Crisistypes', [CrisistypesController::class, 'crisistypes'])->name('crisis.types');
    Route::get('/Crisistypes/create', [CrisistypesController::class, 'crisistypes_create'])->name('crisistypes.create');
    Route::post('/Crisistypes/store', [CrisistypesController::class, 'crisistypes_store'])->name('crisistypes.store');
    Route::get('/Crisistypes/delete/{id}', [CrisistypesController::class, 'crisistypes_delete'])->name('crisistypes.delete');
    Route::get('/Crisistypes/edit/{id}', [CrisistypesController::class, 'crisistypes_edit'])->name('crisistypes.edit');
    Route::put('/Crisistypes/update/{id}', [CrisistypesController::class, 'crisistypes_update'])->name('crisistypes.update');
    Route::get('/Crisistypes/view/{id}', [CrisistypesController::class, 'crisistypes_view'])->name('crisistypes.view');


    //Donation
    Route::get('/Donation', [DonationController::class, 'donation'])->name('donation');
    Route::get('/Donation/create', [DonationController::class, 'donation_create'])->name('donation.create');
    Route::post('/Donation/store', [DonationController::class, 'donation_store'])->name('donation.store');
    Route::get('/Donation/delete/{id}', [DonationController::class, 'donation_delete'])->name('donation.delete');
    Route::get('/Donation/edit/{id}', [DonationController::class, 'donation_edit'])->name('donation.edit');
    Route::put('/Donation/update/{id}', [DonationController::class, 'donation_update'])->name('donation.update');
    Route::get('/Donation/view/{id}', [DonationController::class, 'donation_view'])->name('donation.view');

    //Report
    Route::get('/Report', [DonationController::class, 'report'])->name('donation.report');
    Route::get('/Report/search', [DonationController::class, 'report_search'])->name('donation.report.search');

    //Donor
    Route::get('/Donor', [DonorController::class, 'donor'])->name('donor');
    Route::get('/Donor/create', [DonorController::class, 'donor_create'])->name('donor.create');
    Route::post('/Donor/store', [DonorController::class, 'donor_store'])->name('donor.store');
    Route::get('/Donor/delete/{id}', [DonorController::class, 'donor_delete'])->name('donor.delete');
    Route::get('/Donor/edit/{id}', [DonorController::class, 'donor_edit'])->name('donor.edit');
    Route::put('/Donor/update/{id}', [DonorController::class, 'donor_update'])->name('donor.update');
    Route::get('/Donor/view/{id}', [DonorController::class, 'donor_view'])->name('donor.view');


    //Expense
    Route::get('/Expense', [ExpenseController::class, 'expense'])->name('expense');
    Route::get('/Expense/create', [ExpenseController::class, 'expense_create'])->name('expense.create');
    Route::post('/Expense/store', [ExpenseController::class, 'expense_store'])->name('expense.store');
    Route::get('/Expense/delete/{id}', [ExpenseController::class, 'expense_delete'])->name('expense.delete');
    Route::get('/Expense/edit/{id}', [ExpenseController::class, 'expense_edit'])->name('expense.edit');
    Route::put('/Expense/update/{id}', [ExpenseController::class, 'expense_update'])->name('expense.update');
    Route::get('/Expense/view/{id}', [ExpenseController::class, 'expense_view'])->name('expense.view');


    //Expense Category
    Route::get('/Expense/Category', [ExpenseCategoryController::class, 'expense_category'])->name('expense.category');
    Route::get('/Expense/Category/create', [ExpenseCategoryController::class, 'expensecategory_create'])->name('expensecategory.create');
    Route::post('/Expense/Category/store', [ExpenseCategoryController::class, 'expensecategory_store'])->name('expensecategory.store');
    Route::get('/Expense/Category/{id}', [ExpenseCategoryController::class, 'expensecategory_delete'])->name('expensecategory.delete');
    Route::get('/Expense/Category/edit/{id}', [ExpenseCategoryController::class, 'expensecategory_edit'])->name('expensecategory.edit');
    Route::put('/Expense/Category/update/{id}', [ExpenseCategoryController::class, 'expensecategory_update'])->name('expensecategory.update');
    Route::get('/Expense/Category/view/{id}', [ExpenseCategoryController::class, 'expensecategory_view'])->name('expensecategory.view');


    //Location
    Route::get('/Location', [LocationController::class, 'location'])->name('location');
    Route::get('/Location/create', [LocationController::class, 'location_create'])->name('location.create');
    Route::post('/Location/store', [LocationController::class, 'location_store'])->name('location.store');
    Route::get('/Location/delete/{id}', [LocationController::class, 'location_delete'])->name('location.delete');
    Route::get('/Location/edit/{id}', [LocationController::class, 'location_edit'])->name('location.edit');
    Route::put('/Location/update/{id}', [LocationController::class, 'location_update'])->name('location.update');
    Route::get('/Location/view/{id}', [LocationController::class, 'location_view'])->name('location.view');


    //Volunteer
    Route::get('/Volunteer', [VolunteerController::class, 'volunteer'])->name('volunteer');
    Route::get('/Volunteer/create', [VolunteerController::class, 'volunteer_create'])->name('volunteer.create');
    Route::post('/Volunteer/store', [VolunteerController::class, 'volunteer_store'])->name('volunteer.store');
    Route::get('/Volunteer/delete/{id}', [VolunteerController::class, 'volunteer_delete'])->name('volunteer.delete');
    Route::get('/Volunteer/edit/{id}', [VolunteerController::class, 'volunteer_edit'])->name('volunteer.edit');
    Route::put('/Volunteer/update/{id}', [VolunteerController::class, 'volunteer_update'])->name('volunteer.update');
    Route::get('/Volunteer/view/{id}', [VolunteerController::class, 'volunteer_view'])->name('volunteer.view');
    Route::get('Volunteer/accept/{id}', [VolunteerController::class, 'accept'])->name('volunteer.accept');
    Route::get('Volunteer/reject/{id}', [VolunteerController::class, 'reject'])->name('volunteer.reject');


    //Volunteer To Crisis
    Route::get('/VolunteerToCrisis', [VolunteerTocrisisController::class, 'volunteer_to_crisis'])->name('volunteertocrisis');
    Route::get('/VolunteerToCrisis/create', [VolunteerTocrisisController::class, 'volunteertocrisis_create'])->name('volunteertocrisis.create');
    Route::post('/VolunteerToCrisis/store', [VolunteerTocrisisController::class, 'volunteertocrisis_store'])->name('volunteertocrisis.store');
    Route::get('/VolunteerToCrisis/delete/{id}', [VolunteerTocrisisController::class, 'volunteertocrisis_delete'])->name('volunteertocrisis.delete');
    Route::get('/VolunteerToCrisis/edit/{id}', [VolunteerTocrisisController::class, 'volunteertocrisis_edit'])->name('volunteertocrisis.edit');
    Route::put('/VolunteerToCrisis/update/{id}', [VolunteerTocrisisController::class, 'volunteertocrisis_update'])->name('volunteertocrisis.update');
    Route::get('/VolunteerToCrisis/view/{id}', [VolunteerTocrisisController::class, 'volunteertocrisis_view'])->name('volunteertocrisis.view');
});
