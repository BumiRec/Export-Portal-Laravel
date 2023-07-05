<?php

use App\Http\Controllers\AddProduct;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\BuyerListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryStatusController;
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
use App\Http\Controllers\ListNotificationsController;
use App\Http\Controllers\MailFormController;
use App\Http\Controllers\ManageCompaniesController;
use App\Http\Controllers\ModifyItem;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NotificationsByAdminController;
use App\Http\Controllers\NotificationSystemController;
use App\Http\Controllers\NotifyBuyerInterested;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerListController;
use App\Http\Controllers\SuccessStoriesController;
use App\Http\Controllers\SummaryInformationController;
use App\Http\Controllers\test;
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
Route::get('/filterCompany/{id}', [CompanyFilterController::class, 'filterCompany']);

Route::get('/filterProduct/{id}', [FilterProductController::class, 'filterProductCategory']);

//Products people are interested at for user
Route::get('/buyerList/{id}', [BuyerListController::class, 'interestedProduct']);

//Notification for the buyer that is interested in a product
Route::get('/addNotify/{Oid}/{Uid}/{Pid}/{lang}', [NotifyBuyerInterested::class, 'notify']);

//Products people are interested in for company
Route::get('/sellerList/{userId}', [SellerListController::class, 'interestedIn']);

//Getting data for the "Form" communication
Route::get('/form/{id}', [MailFormController::class, 'mailForm']);

//Get the the Notifications for the Owner
Route::get('/showAllNotify/{id}/{lang}', [ListNotificationsController::class, 'showAllNotifications']);

Route::get('/showUnReadNotify/{id}/{lang}', [ListNotificationsController::class, 'showUnReadNotifications']);

Route::get('/MarkAsReadNotify/{id}/{lang}', [ListNotificationsController::class, 'markAsReadNotify']);

Route::get('/showAllNotifyByAdmin/{id}/{lang}', [NotificationsByAdminController::class, 'showAllNotifyByAdmin']);

Route::get('/showUnReadNotificationsByAdmin/{id}/{lang}', [NotificationsByAdminController::class, 'showUnReadNotificationsByAdmin']);

Route::get('/markAsReadNotifyByAdmin/{id}/{lang}', [NotificationsByAdminController::class, 'markAsReadNotifyByAdmin']);

//
Route::get('/corporate/{id}', [CorporateController::class, 'showCorporate']);

//Show the success stories
Route::get('/successStory', [SuccessStoriesController::class, 'successStories']);

Route::get('/allFiles', [FileGetDataController::class, 'showAllFiles']);

Route::get('/showFiles/{productId}/{fileType}', [FileGetDataController::class, 'showIndexFile']);

Route::get('/notificatiOnOff/{userId}', [NotificationSystemController::class, 'NotificatiOnOff']);

//Update Language
Route::get('/updateLanguage/{userId}/{languageId}', [UpdateLanguageController::class, 'updateLanguage']);

//show user data in summary information section
Route::get('/userData/{company_id}', [SummaryInformationController::class, 'userData']);

//show company data in summary information section
Route::get('/companyData/{userId}', [SummaryInformationController::class, 'companyData']);

Route::get('/userCompany/{userId}', [SummaryInformationController::class, 'userCompany']);

Route::get('/userInfo/{userId}', [SummaryInformationController::class, 'user']);
//view Announcements
Route::get('/viewAnnouncements', [AnnouncementsController::class, 'viewAnnouncements']);
//Update product
Route::put('/product/{id}', [ModifyItem::class, 'update']);

//Updating Token
Route::put('/updateToken/{id}/{lang}', [TokenController::class, 'updateToken']);

//Updating User Profile Data
Route::put('/updateUser/{id}/{lang}', [UpdateProfileUserController::class, 'update']);

//Updating User Profile Data from Admin
Route::put('/updateUserByAdmin/{id}/{lang}', [UpdateProfileUserController::class, 'updateUserByAdmin']);

//Forgot password
Route::put('/password/{lang}', [PasswordController::class, 'password']);

Route::put('/updateCompany/{id}', [ManageCompaniesController::class, 'manageCompanyData']);

//Update announcements status
Route::put('/announcementsUpdate/{id}', [AnnouncementsController::class, 'announcementsUpdate']);

//Owner can update the categories
Route::put('/updateCategory/{companyId}', [CategoryStatusController::class, 'categoryUpdated']);

//Admin update the status of a company
Route::put('updateStatus/{companyId}', [CategoryStatusController::class, 'statusUpdated']);

Route::post('/updateFile/{Fid}/{Lid}', [FileUpdateDeleteController::class, 'updateFile']);

//Register a new user
Route::post('/register', [RegisterController::class, 'register']);

//Login
Route::post('/login', [AuthController::class, 'login']);

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Create a new company
Route::post('/company/{userId}', [CompanyController::class, 'company']);

//Activity area for comapany
Route::post('/activity/{lang}', [ActivityController::class, 'activitycontroller']);

//Add a new product
Route::post('/add', [AddProduct::class, 'AddProduct']);

//Confiramtion from an user for buying a product
Route::post('/buyConfirmed', [BuyerController::class, 'buyerConfirmation']);

//Confiramtion from an owner for selling a product
Route::post('/sellConfirm', [SellerController::class, 'sellConfirmation']);

//Add a product at interested list
Route::post('/buyerList', [BuyerListController::class, 'interestedAt']);

Route::post('/sellerList', [SellerListController::class, 'interestedInProduct']);

//Newsletter
Route::post('/newsletter/{lang}', [NewsletterController::class, 'addNewsletter']);

//Admin can send newsletter
Route::post('/sendnewsletter/{lang}', [NewsletterController::class, 'sendNewsletter']);

Route::post('/addFile', [FileController::class, 'addFile']);

//Search for company
Route::post('/searchCompany', [SearchController::class, 'companySearch']);

//Search for product
Route::post('/searchProduct', [SearchController::class, 'productSearch']);

//Search for users
Route::post('/searchUsers', [SearchController::class, 'userSearch']);

//Send support email
Route::post('/email/{lang}', [EmailController::class, 'email']);

//Add a success sotory
Route::post('/successStory', [SuccessStoriesController::class, 'addSucessStories']);

//Add announcements
Route::post('/announcements', [AnnouncementsController::class, 'announcements']);

//Detele a product
Route::delete('/product/{id}/{lang}', [ModifyItem::class, 'destroy']);

//Delete a product from InterestedAt
Route::delete('/deleteProduct/{id}/{lang}', [BuyerListController::class, 'deleteInterestedAT']);

//Delete a product from InterestedInList
Route::delete('/delete/{id}/{langId}', [SellerListController::class, 'destroy']);

Route::delete('/deleteFile/{id}/{lang}', [FileUpdateDeleteController::class, 'deleteFile']);

Route::delete('/deleteCompany/{companyId}', [ManageCompaniesController::class, 'companyDeleted']);

Route::delete('/deleteProduct/{productId}', [ManageCompaniesController::class, 'productDeleted']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [test::class, 'test']);
