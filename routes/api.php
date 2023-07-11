<?php

use App\Http\Controllers\AddProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyFilterController;
use App\Http\Controllers\CompanyListController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExportProduct;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileGetDataController;
use App\Http\Controllers\FileUpdateDeleteController;
use App\Http\Controllers\FilterProductController;
use App\Http\Controllers\ImportProduct;
use App\Http\Controllers\InterestedInListController;
use App\Http\Controllers\InterestedProductController;
use App\Http\Controllers\ListNotificationsController;
use App\Http\Controllers\MailFormController;
use App\Http\Controllers\ModifyItem;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NotifyBuyerInterested;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SuccessStoriesController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UpdateLanguageController;
use App\Http\Controllers\UpdateProfileUserController;
use App\Http\Controllers\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

//Country list
Route::get('/country', [RegisterController::class, 'index']);

//Route for import list
Route::get('/ilist', [ImportProduct::class, 'import']);

//All product list
Route::get('/ProductAllList', [ProductController::class, 'products']);

//Route for export list
Route::get('/elist', [ExportProduct::class, 'showList']);

//View more for export product
Route::get('/elist/{id}', [ExportProduct::class, 'show']);

//View more for import product
Route::get('/ilist/{id}', [ImportProduct::class, 'show']);

//View more for company
Route::get('/company_details/{id}', [CompanyListController::class, 'companyDetails']);

//Show user token
Route::get('/token/{id}', [TokenController::class, 'token']);

//Number of views for product
Route::get('/view/{id}', [ViewController::class, 'view']);

//Created date for product
Route::get('/date/{id}', [ViewController::class, 'date']);

//Category of company
Route::get('/category', [CategoryController::class, 'category']);

//Subcategory of company
Route::get('/subcategory', [CategoryController::class, 'subcategory']);

//Category of product
Route::get('/productcategory', [CategoryController::class, 'productcategory']);

//List of all comapmanies
Route::get('/CompanyList', [CompanyListController::class, 'companyList']);

//Filter product base on subcategory
Route::get('/subcategory/{c_id}/{s_id}', [FilterProductController::class, 'filterProductSubCategory']);

//Filter company base on category
Route::get('/filterCompany/{id}/{lang}', [CompanyFilterController::class, 'filterCompany']);

Route::get('/filterProduct/{id}', [FilterProductController::class, 'filterProductCategory']);

//Products people are interested at for user
Route::get('/interstedProduct/{id}', [InterestedProductController::class, 'interestedProduct']);

//Notification for the buyer that is interested in a product
Route::get('/Notify/{Oid}/{Pid}/{Uid}/{lang}', [NotifyBuyerInterested::class, 'notify']);

//Products people are interested in for company
Route::get('/interstedIn/{id}', [InterestedInListController::class, 'interestedIn']);

//Getting data for the "Form" communication
Route::get('/form/{id}', [MailFormController::class, 'mailForm']);

//Get the the Notifications for the Owner
Route::get('/Notify/{id}/{lang}', [ListNotificationsController::class, 'findNotifications']);

//
Route::get('/corporate/{id}', [CorporateController::class, 'showCorporate']);

//Show the success stories
Route::get('/successStory', [SuccessStoriesController::class, 'successStories']);

Route::get('/allFiles', [FileGetDataController::class, 'showAllFiles']);

Route::get('/showFiles/{productId}/{fileType}', [FileGetDataController::class, 'showIndexFile']);

//Forgot password
Route::put('/password/{lang}', [PasswordController::class, 'password']);

//Update Language
Route::get('/updateLanguage/{userId}/{languageId}', [UpdateLanguageController::class, 'updateLanguage']);

//Register a new user
Route::post('/register', [RegisterController::class, 'register']);
//Search for company
Route::post('/searchCompany', [SearchController::class, 'companySearch']);

//Search for product
Route::post('/searchProduct', [SearchController::class, 'productSearch']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/CompanyList', [CompanyListController::class, 'companyList']);
//Update product
    Route::put('/product/{id}', [ModifyItem::class, 'update']);

//Updating Token
    Route::put('/updateToken/{id}/{lang}', [TokenController::class, 'updateToken']);

//Updating User Profile Data
    Route::put('/updateUser/{id}/{lang}', [UpdateProfileUserController::class, 'update']);

    Route::post('/updateFile/{id}', [FileUpdateDeleteController::class, 'updateFile']);

//Logout
    Route::post('/logout/{languageId}', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Create a new company

//Activity area for comapany
    Route::post('/activity/{lang}', [ActivityController::class, 'activitycontroller']);

//Add a new product
    Route::post('/add', [AddProduct::class, 'AddProduct']);

//Confiramtion from an user for buying a product
    Route::post('/buyConfirmed', [BuyerController::class, 'buyerConfirmation']);

//Confiramtion from an owner for selling a product
    Route::post('/sellConfirm', [SellerController::class, 'sellConfirmation']);

//Add a product at interested list
    Route::post('/interestedAt', [InterestedProductController::class, 'interestedAt']);

    Route::post('/interestedIn', [InterestedInListController::class, 'interestedInProduct']);

//Newsletter
    Route::post('/newsletter/{lang}', [NewsletterController::class, 'addNewsletter']);

//Admin can send newsletter
    Route::post('/sendnewsletter/{lang}', [NewsletterController::class, 'sendNewsletter']);

    Route::post('/addFile', [FileController::class, 'addFile']);

//Send support email
    Route::post('/email/{lang}', [EmailController::class, 'email']);

//Add a success sotory
    Route::post('/successStory', [SuccessStoriesController::class, 'addSucessStories']);

//Detele a product
    Route::delete('/product/{id}/{lang}', [ModifyItem::class, 'destroy']);

//Delete a product from InterestedAt
    Route::delete('/deleteProduct/{id}/{lang}', [InterestedProductController::class, 'deleteInterestedAT']);

//Delete a product from InterestedInList
    Route::delete('/delete/{id}/{lang}', [InterestedInListController::class, 'destroy']);

    Route::delete('/deleteFile/{id}/{lang}', [FileUpdateDeleteController::class, 'deleteFile']);

});
Route::middleware('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    // Other routes...
});
Route::post('/company/{userId}', [CompanyController::class, 'company'])
    ->name('company')
    ->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->name('user');

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('web')->get('/sanctum/csrf-cookie', function (Request $request) {
    return response()->json(['message' => 'CSRF cookie set']);
});
