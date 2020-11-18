<?php

use Illuminate\Support\Facades\Route;

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

// PP
Route::get('createPP','projectManagementPP@createPP')->name('PP.createPP');

// MEW
Route::get('addMEW','projectManagementMEW@addMEW')->name('MEW.addMEW');
Route::get('editMEW','projectManagementMEW@editMEW')->name('MEW.editMEW');

// MCFS
Route::get('createCFSCode','projectManagementMCFS@createCFSCode')->name('MCFS.createCFSCode');
Route::get('editCFSCode','projectManagementMCFS@editCFSCode')->name('MCFS.editCFSCode');
Route::get('viewCFSList','projectManagementMCFS@viewCFSList')->name('MCFS.viewCFSList');

// RCPO
Route::get('createRegisterCustomerOrder','projectManagementRCPO@createRegisterCustomerOrder')->name('RCPO.createRegisterCustomerOrder');
Route::get('editExistingCustomerOrder','projectManagementRCPO@editExistingCustomerOrder')->name('RCPO.editExistingCustomerOrder');

// PB
Route::get('createProject','projectManagementPB@createProject')->name('PB.createProject');
Route::get('createSiteProject','projectManagementPB@createSiteProject')->name('PB.createSiteProject');
Route::get('createProjectBudget','projectManagementPB@createProjectBudget')->name('PB.createProjectBudget');
Route::get('createNonProjectOverheadBudget','projectManagementPB@createNonProjectOverheadBudget')->name('PB.createNonProjectOverheadBudget');
Route::get('createBudgetPeriodeNonProject','projectManagementPB@createBudgetPeriodeNonProject')->name('PB.createBudgetPeriodeNonProject');

// AFE
Route::get('createAFE','projectManagementAFE@createAFE')->name('AFE.createAFE');
Route::get('createAFESwitching','projectManagementAFE@createAFESwitching')->name('AFE.createAFESwitching');


// CEPS
Route::get('openProject','projectManagementCEPS@openProject')->name('CEPS.openProject');
Route::get('closeProject','projectManagementCEPS@closeProject')->name('CEPS.closeProject');


// PPM
Route::get('addPPM','procurementTransactionPPM@addPPM')->name('PPM.addPPM');


// RPI
Route::get('createRPI','procurementTransactionRPI@createRPI')->name('RPI.createRPI');
Route::get('createRPIOverhead','procurementTransactionRPI@createRPIOverhead')->name('RPI.createRPIOverhead');
Route::get('createRPISales','procurementTransactionRPI@createRPISales')->name('RPI.createRPISales');
Route::get('fileUpload','procurementTransactionRPI@fileUpload')->name('RPI.fileUpload');

// RE
Route::get('createREtoCustomer','procurementTransactionRE@createREtoCustomer')->name('RE.createREtoCustomer');
Route::get('createPaymentRE','procurementTransactionRE@createPaymentRE')->name('RE.createPaymentRE');
Route::get('createDebitNote','procurementTransactionRE@createDebitNote')->name('RE.createDebitNote');
Route::get('createPaidDebitNote','procurementTransactionRE@createPaidDebitNote')->name('RE.createPaidDebitNote');


// PR
Route::get('createPR','procurementTransactionPR@createPR')->name('PR.createPR');

// URP
Route::get('createURP','procurementTransactionURP@createURP')->name('URP.createURP');

// PPNRem
Route::get('createPPNRem','procurementTransactionPPNRem@createPPNRem')->name('PPNRem.createPPNRem');
Route::get('createPPNRemSet','procurementTransactionPPNRem@createPPNRemSet')->name('PPNRem.createPPNRemSet');

// PO
Route::get('createPO','procurementTransactionPO@createPO')->name('PO.createPO');
Route::get('createPOverhead','procurementTransactionPO@createPOverhead')->name('PO.createPOverhead');
Route::get('createPOSales','procurementTransactionPO@createPOSales')->name('PO.createPOSales');
Route::get('requestCancelPO','procurementTransactionPO@requestCancelPO')->name('PO.requestCancelPO');
Route::get('fileUploadPO','procurementTransactionPO@fileUploadPO')->name('PO.fileUploadPO');

// BSF
Route::get('createBSF','procurementTransactionBsf@createBSF')->name('BSF.createBSF');
Route::get('BSFtoBRF','procurementTransactionBsf@BSFtoBRF')->name('BSF.BSFtoBRF');


// BRF
Route::get('createBRF','procurementTransactionBrf@createBRF')->name('BRF.createBRF');
Route::get('fundBRF','procurementTransactionBrf@fundBRF')->name('BRF.fundBRF');
Route::get('BRFtoBRFP','procurementTransactionBrf@BRFtoBRFP')->name('BRF.BRFtoBRFP');

//ARF
Route::resource('ARF','procurementTransactionArf');

// ASF
Route::get('createASFOverhead','procurementTransactionAsf@indexOverhead')->name('ASF.indexOverhead');
Route::get('createASFSales','procurementTransactionAsf@indexSales')->name('ASF.indexSales');
Route::get('createASFPulsaVoucher','procurementTransactionAsf@indexPulsaVoucher')->name('ASF.indexPulsaVoucher');
Route::resource('ASF','procurementTransactionAsf');

// Dashboard
Route::get('projectDashboard','homeController@projectDashboard')->name('home.projectDashboard');
Route::get('checkDocument','homeController@checkDocument')->name('home.checkDocument');
Route::get('myDocument','homeController@myDocument')->name('home.myDocument');
Route::get('submittedDocument','homeController@submittedDocument')->name('home.submittedDocument');
Route::get('approvedDocument','homeController@approvedDocument')->name('home.approvedDocument');
Route::get('documentWorkflow','homeController@documentWorkflow')->name('home.documentWorkflow');

//---[ Default ERP Reborn (Front End & Back End) ]---(START)------

Route::get('showLogOutput', function () {
    return view('zhtHelperLogOutputShow');
    })->middleware('web');
    
Route::get('showLogError', function () {
    return view('zhtHelperLogErrorShow');
    })->middleware('web');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthentication_sendAuthRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIAuthentication_SendAuthRequest', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthentication_setLogin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIAuthentication_SetLogin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthentication_setLoginBranchAndUserRole', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_SetLoginBranchAndUserRole', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setLogout', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_SetLogout', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getSessionData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_GetSessionData', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBloodAglutinogenType', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenFamilyCardMember', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenFamilyCardMember', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonAccountSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonAccountSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteTradeMark', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeTradeMark', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListTradeMark', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeProject', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBloodAglutinogenType', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBloodAglutinogenType', 'webWithoutCSRF');









\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('sendRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@SendRequest', 'webWithoutCSRF');

//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----