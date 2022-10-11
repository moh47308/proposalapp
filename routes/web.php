<?php


// users controllers
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;


// admin controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerController;




                                /*Login, Logout and Register Routs*/

// index route
Route::get('/', [UserController::class, 'login'])->name('login');
// show register page
Route::get('/register', [UserController::class, 'index']);
// store user registration
Route::post('/register/user', [UserController::class, 'store']);
// show login page
Route::get('/login', [UserController::class, 'login'])->name('login');
// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// logout user
Route::get('/logout', [UserController::class, 'logout'])->middleware('user');





                                /*Forget Password Routs*/


// show forget password
Route::get('forget/password', [ForgotPasswordController::class, 'getEmail']);
// save forget password
Route::post('forget/password', [ForgotPasswordController::class, 'postEmail']);
// reset token
Route::get('reset/password/{token}', [ResetPasswordController::class, 'getPassword']);
// reset password
Route::post('reset/password', [ResetPasswordController::class, 'updatePassword']);






                                /*Admin Side Routs*/


// admin dashboard
Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware('admin');
// admin manager all
Route::get('admin/manager/all', [ManagerController::class, 'all'])->middleware('admin');
// admin package all
Route::get('admin/package/all', [AdminController::class, 'allPackage'])->middleware('admin');
// show package create page
Route::get('package/create', [AdminController::class, 'show'])->middleware('admin');
// store package data
Route::post('package/store', [AdminController::class, 'store'])->middleware('admin');
// admin package edit
Route::get('package/edit/{package}', [AdminController::class, 'editPackage'])->middleware('admin');
// admin package edit
Route::put('package/update/{package}', [AdminController::class, 'updateEditPackage'])->middleware('admin');
// admin package delete
Route::get('package/delete/{package}', [AdminController::class, 'deletePackage'])->middleware('admin');





                                /*User Side Routs*/

// show dashboard page
Route::get('/dashboard', [Dashboard::class, 'index'])->middleware('user');
// show profile page
Route::get('/user/show', [UserProfile::class, 'show'])->middleware('user');
// edit profile page
Route::put('/user/edit', [UserProfile::class, 'edit'])->middleware('user');







// show service list page
Route::get('/service/list', [ServiceController::class, 'index'])->middleware('user');
// create service
Route::get('/service/create', [ServiceController::class, 'create'])->middleware('user');
// store service info
Route::post('/services/store', [ServiceController::class, 'store'])->middleware('user');
// edit service
Route::get('service/edit/{service}', [ServiceController::class, 'edit'])->middleware('user');
// update service
Route::put('service/{service}', [ServiceController::class, 'update'])->middleware('user');
// delete service
Route::get('service/{service}', [ServiceController::class, 'delete'])->middleware('user');



// show proposal list page
Route::get('/proposal/list', [ProposalController::class, 'index'])->middleware('user');
// show company
Route::get('/proposal/showcompanys', [ProposalController::class, 'showCompanys'])->middleware('user');
// select company
Route::post('/proposal/selectcompany', [ProposalController::class, 'selectCompany'])->middleware('user');
//  create proposal
Route::get('/proposal/createp', [ProposalController::class, 'createProposal'])->middleware('user');
//  create proposal
Route::get('/proposal/create', [ProposalController::class, 'create'])->middleware('user');
// select service
Route::post('/proposal/selectservice', [ProposalController::class, 'selectService'])->middleware('user');
// add service to proposal
Route::post('/proposal/addservicetoproposal', [ProposalController::class, 'addServiceToProposal'])->middleware('user');
// add goals to proposal
Route::put('/proposal/goals', [ProposalController::class, 'goals'])->middleware('user');
//delete proposal
Route::get('proposal/{proposal}', [ProposalController::class, 'delete'])->middleware('user');
// show edit proposal
Route::get('proposal/show/edit/{proposal}', [ProposalController::class, 'showEdit'])->middleware('user');
// edit select service proposal
Route::put('proposal/edit-selected-service/{proposal}', [ProposalController::class, 'editSelectedService'])->middleware('user');
// edit select service proposal
Route::get('proposal/delete-selected-service/{proposal}', [ProposalController::class, 'deleteSelectedService'])->middleware('user');
// proposal preview
Route::get('proposal/preview/{proposal}', [ProposalController::class, 'proposalPreview'])->middleware('user');
// show proposal
Route::get('proposal', [ProposalController::class, 'showProposal'])->middleware('user');
// send proposal
Route::get('proposal/send/email/{proposal}', [ProposalController::class, 'sendProposal'])->middleware('user');
// proposal response save in db
Route::get('proposal/response/{proposal}/{action}', [ProposalController::class, 'proposalResponse'])->middleware('user');
// proposal response send
Route::get('proposal/response/send', [ProposalController::class, 'proposalResponseSend'])->middleware('user');
// proposal suggetions comment
Route::get('proposal/suggetions/{proposal_id}', [ProposalController::class, 'suggetions'])->middleware('user');
// show proposal contract
Route::get('proposal/contractshow/{proposal_id}', [ProposalController::class, 'showContract'])->middleware('user');
// send proposal contract
Route::get('proposal/contract/send', [ProposalController::class, 'sendContract'])->middleware('user');



// contract get response and save in DB
Route::get('contract/response/{proposal}/{action}', [ContractController::class, 'contractResponse'])->middleware('user');



// show client list page
Route::get('client/list', [ClientController::class, 'index'])->middleware('user');
// show create form
Route::get('client/create', [ClientController::class, 'create'])->middleware('user');
// sotre client info
Route::post('clients', [ClientController::class, 'store'])->middleware('user');
// show edit client
Route::get('client/edit/{client}', [ClientController::class, 'edit'])->middleware('user');
// update client
Route::put('client/{client}', [ClientController::class, 'update'])->middleware('user');
// delete client
Route::get('client/{client}', [ClientController::class, 'delete'])->middleware('user');




                                /*Subscription Routs*/

// stripe payment method
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe/{package}', 'stripe')->middleware('user');
    Route::post('stripe', 'stripePost')->name('stripe.post')->middleware('user');
    Route::get('show/bundel/{package}', 'bundels')->middleware('user');
    Route::post('buy/bundel', 'bundelPost')->name('buyBundel.post')->middleware('user');
});
// update subscription package
Route::get('update/subscription/{package}', [StripePaymentController::class, 'updateSubscription'])->middleware('user');
// buy proposal
Route::get('buy/bundels/{bundel}', [StripePaymentController::class, 'buyBundel'])->middleware('user');


