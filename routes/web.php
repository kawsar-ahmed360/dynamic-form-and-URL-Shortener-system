<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Server\EventManageController;
use App\Http\Controllers\Server\AllEventWiseRegisterUserListController;
use App\Http\Controllers\Server\SubEventManageController;
use App\Http\Controllers\Client\FrontendController;
use App\Http\Controllers\User\URLShortenerController;
use App\Http\Controllers\User\UserEventRegistrationController;

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



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'MainIndex'])->name('MainIndex');
Route::get('/shortened-url', [FrontendController::class, 'ShortenedUrl'])->name('ShortenedUrl');
Route::get('https/{short}', [FrontendController::class, 'UrlSh'])->name('UrlSh');

Route::get('/view_pdf', [FrontendController::class, 'ViewPdf'])->name('ViewPdf');




Auth::routes();





Route::get('/login/super-admin', [App\Http\Controllers\Auth\LoginController::class, 'showSuperAdminLoginForm'])->name('showSuperAdminLoginForm');

Route::post('/login/user-login', [App\Http\Controllers\Auth\LoginController::class, 'UserLoginPost'])->name('UserLoginPost');
Route::post('/login/user-registration-post', [App\Http\Controllers\Auth\LoginController::class, 'UserRegistrationPost'])->name('UserRegistrationPost');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::prefix('User')->middleware(['auth'])->group(function () {

    Route::get('/event-resgitration/{id}', [UserEventRegistrationController::class, 'EventRegistration'])->name('EventRegistration');
    Route::post('/event-resgitration-submit', [UserEventRegistrationController::class, 'EventRegistrationSubmit'])->name('EventRegistrationSubmit');
    
    Route::get('/radio_group_with_amount_ajax', [UserEventRegistrationController::class, 'RadioGroupWithAmountAjax'])->name('RadioGroupWithAmountAjax');
    Route::get('/radio_group_yes_no_with_amount_ajax', [UserEventRegistrationController::class, 'RadioGroupYesNoWithAmountAjax'])->name('RadioGroupYesNoWithAmountAjax');
    Route::get('/radio_group_yes_no_value_with_amount_ajax', [UserEventRegistrationController::class, 'RadioGroupYesNoValueWithAmountAjax'])->name('RadioGroupYesNoValueWithAmountAjax');
    Route::get('/radio_group_yes_no_person_value_with_amount_ajax', [UserEventRegistrationController::class, 'RadioGroupYesNoPersonValueWithAmountAjax'])->name('RadioGroupYesNoPersonValueWithAmountAjax');
    Route::get('/radio_group_yes_no_value_with_amount_minus_ajax', [UserEventRegistrationController::class, 'RadioGroupYesNoValueWithAmountMinusAjax'])->name('RadioGroupYesNoValueWithAmountMinusAjax');

    Route::get('/my-event-category-list', [UserEventRegistrationController::class, 'MyEventList'])->name('MyEventList');
    Route::get('/my-event-category-list-view/{event_id}', [UserEventRegistrationController::class, 'MyEventListView'])->name('MyEventListView');
    Route::get('/my-event-category-single-list-item-view/{event_id}/{value_id}', [UserEventRegistrationController::class, 'MyEventSingleListItemView'])->name('MyEventSingleListItemView');



    //------------------------------ShortenedUrl ------------------
    Route::get('/url-delete/{id}', [URLShortenerController::class, 'UrlDelete'])->name('UrlDelete');
    Route::get('/url-list', [URLShortenerController::class, 'UrlList'])->name('UrlList');
    Route::get('https/uSER/{code}', [URLShortenerController::class, 'uRLr'])->name('uRLr');
    Route::post('/url-list-post', [URLShortenerController::class, 'UrlListPost'])->name('UrlListPost');


});

//-----------------Event Manage-------
Route::prefix('Server')->middleware(['auth'])->group(function () {
    

    Route::post('/dynamic-table-generate', [EventManageController::class, 'DynamicTableGenerate'])->name('DynamicTableGenerate');
    Route::post('/dynamic-mysqli-table-generate', [EventManageController::class, 'DynamicMysqliTableGenerate'])->name('DynamicMysqliTableGenerate');



    Route::get('/create-event', [EventManageController::class, 'CreateEvent'])->name('CreateEvent');
    Route::get('/all-event', [EventManageController::class, 'AllEvent'])->name('AllEvent');
    Route::post('/store-event', [EventManageController::class, 'StoreEvent'])->name('StoreEvent');
    Route::post('/update-event', [EventManageController::class, 'UpdateEvent'])->name('UpdateEvent');
    Route::get('/delete-event/{id}', [EventManageController::class, 'DeleteEvent'])->name('DeleteEvent');
    Route::get('/edit-event/{id}', [EventManageController::class, 'EditEvent'])->name('EditEvent');
    Route::get('/active-event/{id}', [EventManageController::class, 'ActiveEvent'])->name('ActiveEvent');
    Route::get('/deactive-event/{id}', [EventManageController::class, 'DeactiveEvent'])->name('DeactiveEvent');
    
    Route::get('/dynamic-form-event/{id}', [EventManageController::class, 'DynamicFormEvent'])->name('DynamicFormEvent');
    Route::post('/create-event-wise-field-store', [EventManageController::class, 'CreateEventWiseFieldStore'])->name('CreateEventWiseFieldStore');
    Route::post('/create-event-wise-field-update', [EventManageController::class, 'CreateEventWiseFieldUpdate'])->name('CreateEventWiseFieldUpdate');
    Route::get('/dynamic-event-wise-field-delete/{id}', [EventManageController::class, 'CreateEventWiseFieldDelete'])->name('CreateEventWiseFieldDelete');

    //----------------------Dynamic radio with amount value----------------

    Route::get('/dynamic-form-event-field-radio-group-amount/{id}/{event_id}', [EventManageController::class, 'DynamicFieldRadioGroupAmount'])->name('DynamicFieldRadioGroupAmount');
    Route::post('/dynamic-form-event-field-radio-group-amount-store', [EventManageController::class, 'DynamicFieldRadioGroupAmountStore'])->name('DynamicFieldRadioGroupAmountStore');
    Route::post('/dynamic-form-event-field-radio-group-amount-update', [EventManageController::class, 'DynamicFieldRadioGroupAmountUpdate'])->name('DynamicFieldRadioGroupAmountUpdate');
    Route::get('/dynamic-form-event-field-radio-group-amount-delete/{id}', [EventManageController::class, 'DynamicFieldRadioGroupAmountDelete'])->name('DynamicFieldRadioGroupAmountDelete');

    //----------------------Dynamic radio without amount value----------------

    Route::get('/dynamic-form-event-field-radio-group-only/{id}/{event_id}', [EventManageController::class, 'DynamicFieldRadioGroupOnly'])->name('DynamicFieldRadioGroupOnly');
    Route::post('/dynamic-form-event-field-radio-group-only-store', [EventManageController::class, 'DynamicFieldRadioGrouOnlytStore'])->name('DynamicFieldRadioGrouOnlytStore');
    Route::post('/dynamic-form-event-field-radio-group-only-update', [EventManageController::class, 'DynamicFieldRadioGroupOnlyUpdate'])->name('DynamicFieldRadioGroupOnlyUpdate');
    Route::get('/dynamic-form-event-field-radio-group-only-delete/{id}', [EventManageController::class, 'DynamicFieldRadioGroupOnlyDelete'])->name('DynamicFieldRadioGroupOnlyDelete');

    //----------------------Dynamic radio yes/no amount value----------------

    Route::get('/dynamic-form-event-field-radio-group-yes-no/{id}/{event_id}', [EventManageController::class, 'DynamicFieldRadioGroupYesNo'])->name('DynamicFieldRadioGroupYesNo');
    Route::post('/dynamic-form-event-field-radio-group-yes-no-store', [EventManageController::class, 'DynamicFieldRadioGrouYesNoStore'])->name('DynamicFieldRadioGrouYesNoStore');
    Route::post('/dynamic-form-event-field-radio-group-yes-no-update', [EventManageController::class, 'DynamicFieldRadioGroupYesNoUpdate'])->name('DynamicFieldRadioGroupYesNoUpdate');
    Route::get('/dynamic-form-event-field-radio-group-yes-no-delete/{id}', [EventManageController::class, 'DynamicFieldRadioGroupYesNoDelete'])->name('DynamicFieldRadioGroupYesNoDelete');

    //----------------------Dynamic Select Option DrowpDown value----------------

    Route::get('/dynamic-form-event-field-select-option-drowpdown/{id}/{event_id}', [EventManageController::class, 'DynamicFieldSelectOptionDrowpdown'])->name('DynamicFieldSelectOptionDrowpdown');
    Route::post('/dynamic-form-event-field-select-option-drowpdown-store', [EventManageController::class, 'DynamicFieldSelectOptionDrowpdownStore'])->name('DynamicFieldSelectOptionDrowpdownStore');
    Route::post('/dynamic-form-event-field-select-option-drowpdown-update', [EventManageController::class, 'DynamicFieldSelectOptionDrowpdownUpdate'])->name('DynamicFieldSelectOptionDrowpdownUpdate');
    Route::get('/dynamic-form-event-field-select-option-drowpdown-delete/{id}', [EventManageController::class, 'DynamicFieldSelectOptionDrowpdownDelete'])->name('DynamicFieldSelectOptionDrowpdownDelete');



});


Route::prefix('Server')->middleware(['auth'])->group(function () {

    //-----------------All Event Wise User List View ---------
    Route::get('/all-event-list-show/{event_id}', [AllEventWiseRegisterUserListController::class, 'AllEventListShow'])->name('AllEventListShow');
    Route::get('/single-event-member-view-info/{event_id}/{id}', [AllEventWiseRegisterUserListController::class, 'SingleEventMemberInfo'])->name('SingleEventMemberInfo');
    Route::get('/single_event_member_approved/{id}/{event_id}', [AllEventWiseRegisterUserListController::class, 'SingleEventApprovedMember'])->name('SingleEventApprovedMember');

});


