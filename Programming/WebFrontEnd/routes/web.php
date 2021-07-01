<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register wyeb routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// LOGIN

Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('loginStore', 'Auth\LoginController@loginStore')->name('loginStore');
Route::get('loginStorex', 'Auth\LoginController@loginStorex')->name('loginStorex');
Route::get('loginStores', 'Auth\LoginController@loginStores')->name('loginStores');


Route::group(['middleware' => 'SessionLogin'], function () {

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    
    
    //Periode
    Route::resource('Periode', 'masterDataPeriode');
    //ProductType
    Route::resource('ProductType', 'masterDataProductType');
    //Religion
    Route::resource('Religion', 'masterDataReligion');
    //Currency
    Route::resource('Currency', 'masterDataCurrency');
    //Country
    Route::resource('Country', 'masterDataCountry');

    // ARF
    Route::post('revisionArf', 'procurementTransactionArf@revisionArfIndex')->name('ARF.revisionArf');
    Route::resource('ARF', 'procurementTransactionArf');

    // PP
    Route::get('createPP', 'projectManagementPP@createPP')->name('PP.createPP');

    // MEW
    Route::get('addMEW', 'projectManagementMEW@addMEW')->name('MEW.addMEW');
    Route::get('editMEW', 'projectManagementMEW@editMEW')->name('MEW.editMEW');

    // MCFS
    Route::get('createCFSCode', 'projectManagementMCFS@createCFSCode')->name('MCFS.createCFSCode');
    Route::get('editCFSCode', 'projectManagementMCFS@editCFSCode')->name('MCFS.editCFSCode');
    Route::get('viewCFSList', 'projectManagementMCFS@viewCFSList')->name('MCFS.viewCFSList');

    // RCPO
    Route::get('createRegisterCustomerOrder', 'projectManagementRCPO@createRegisterCustomerOrder')->name('RCPO.createRegisterCustomerOrder');
    Route::get('editExistingCustomerOrder', 'projectManagementRCPO@editExistingCustomerOrder')->name('RCPO.editExistingCustomerOrder');

    // PB
    Route::get('createProject', 'projectManagementPB@createProject')->name('PB.createProject');
    Route::get('createSiteProject', 'projectManagementPB@createSiteProject')->name('PB.createSiteProject');
    Route::get('createProjectBudget', 'projectManagementPB@createProjectBudget')->name('PB.createProjectBudget');
    Route::get('createNonProjectOverheadBudget', 'projectManagementPB@createNonProjectOverheadBudget')->name('PB.createNonProjectOverheadBudget');
    Route::get('createBudgetPeriodeNonProject', 'projectManagementPB@createBudgetPeriodeNonProject')->name('PB.createBudgetPeriodeNonProject');

    // AFE
    Route::get('createAFE', 'projectManagementAFE@createAFE')->name('AFE.createAFE');
    Route::get('createAFESwitching', 'projectManagementAFE@createAFESwitching')->name('AFE.createAFESwitching');


    // CEPS
    Route::get('openProject', 'projectManagementCEPS@openProject')->name('CEPS.openProject');
    Route::get('closeProject', 'projectManagementCEPS@closeProject')->name('CEPS.closeProject');

    // MAterial Receive
    Route::post('revisionMaterialReceive', 'logisticMaterialReceive@revisionMaterialReceive')->name('MR.revisionMaterialReceive');
    Route::get('createMaterialReceive', 'logisticMaterialReceive@index')->name('MR.createMaterialReceive');

    // PPM
    Route::post('revisionPPMIndex', 'procurementTransactionPPM@revisionPPMIndex')->name('PPM.revisionPPM');
    Route::get('addPPM', 'procurementTransactionPPM@addPPM')->name('PPM.addPPM');


    // RPI
    Route::get('createRPI', 'procurementTransactionRPI@createRPI')->name('RPI.createRPI');
    Route::get('createRPIOverhead', 'procurementTransactionRPI@createRPIOverhead')->name('RPI.createRPIOverhead');
    Route::get('createRPISales', 'procurementTransactionRPI@createRPISales')->name('RPI.createRPISales');
    Route::get('fileUpload', 'procurementTransactionRPI@fileUpload')->name('RPI.fileUpload');

    // RE
    Route::get('createREtoCustomer', 'procurementTransactionRE@createREtoCustomer')->name('RE.createREtoCustomer');
    Route::get('createPaymentRE', 'procurementTransactionRE@createPaymentRE')->name('RE.createPaymentRE');
    Route::get('createDebitNote', 'procurementTransactionRE@createDebitNote')->name('RE.createDebitNote');
    Route::get('createPaidDebitNote', 'procurementTransactionRE@createPaidDebitNote')->name('RE.createPaidDebitNote');


    // PR
    Route::get('createPR', 'procurementTransactionPR@createPR')->name('PR.createPR');

    // URP
    Route::get('createURP', 'procurementTransactionURP@createURP')->name('URP.createURP');

    // PPNRem
    Route::get('PPNRem', 'procurementTransactionPPNRem@createPPNRem')->name('PPNRem.createPPNRem');
    Route::get('PPNRemSet', 'procurementTransactionPPNRem@createPPNRemSet')->name('PPNRem.createPPNRemSet');

    // PO
    Route::get('PO', 'procurementTransactionPO@createPO')->name('PO.createPO');
    Route::get('createPOverhead', 'procurementTransactionPO@createPOverhead')->name('PO.createPOverhead');
    Route::get('createPOSales', 'procurementTransactionPO@createPOSales')->name('PO.createPOSales');
    Route::get('requestCancelPO', 'procurementTransactionPO@requestCancelPO')->name('PO.requestCancelPO');
    Route::get('fileUploadPO', 'procurementTransactionPO@fileUploadPO')->name('PO.fileUploadPO');

    // BSF
    Route::post('revisionBsf', 'procurementTransactionBsf@revisionBsfIndex')->name('BSF.revisionBsf');
    Route::post('BSF/store', 'procurementTransactionBsf@store')->name('BSF.store');
    Route::get('BSF', 'procurementTransactionBsf@createBSF')->name('BSF.createBSF');


    // BRF
    Route::post('revisionBrf', 'procurementTransactionBrf@revisionBrfIndex')->name('BRF.revisionBrf');
    Route::get('BRF', 'procurementTransactionBrf@createBRF')->name('BRF.createBRF');
    Route::post('BRF/store', 'procurementTransactionBrf@store')->name('BRF.store');
    Route::post('BRF/storePaymentSequence', 'procurementTransactionBrf@storePaymentSequenceBrf')->name('BRF.storePaymentSequenceBrf');

    // DOR
    Route::get('DOR', 'procurementTransactionDor@index')->name('DOR.index');
    Route::post('DOR/store', 'procurementTransactionDor@store')->name('DOR.store');
    Route::post('revisionDorIndex', 'procurementTransactionDor@revisionDorIndex')->name('DOR.revisionDor');

    // MRET
    Route::get('createMret', 'procurementTransactionMret@index')->name('MRET.index');
    Route::post('MRET/store', 'procurementTransactionMret@store')->name('MRET.store');
    Route::post('revisionMRETIndex', 'procurementTransactionMret@revisionMret')->name('MRET.revisionMRET');

    //CO

    Route::get('CO', 'controllerSalesCo@index')->name('CO.index');
    Route::get('revisionCo', 'controllerSalesCo@revisionCo')->name('CO.revisionCo');


    Route::get('/test/store/', 'procurementTransactionArf@teststore')->name('test.store');

    Route::get('/test/storeLogin/', 'procurementTransactionArf@teststoreLogin')->name('test.storeLogin');


    Route::get('/test/stores/', 'procurementTransactionArf@teststores')->name('test.stores');

    Route::get('/test/store2', 'procurementTransactionArf@teststore2');

    Route::get('arflist/cancel/', 'procurementTransactionArf@arflistcancel');
    Route::post('tests', 'procurementTransactionArf@tests')->name('ARF.tests');

    // ASF
    Route::get('store', 'procurementTransactionAsf@indexOverhead')->name('ASF.indexOverhead');
    Route::get('createASFSales', 'procurementTransactionAsf@indexSales')->name('ASF.indexSales');
    Route::get('createASFPulsaVoucher', 'procurementTransactionAsf@indexPulsaVoucher')->name('ASF.indexPulsaVoucher');

    Route::post('revisionAsf', 'procurementTransactionAsf@revisionAsfIndex')->name('ASF.revisionAsf');

    Route::resource('ASF', 'procurementTransactionAsf');

    //MASTER DATA
    Route::get('tranoType', 'masterDataTransactionNumber@indexTranoType')->name('tranoType.index');
    Route::post('tranoTypeStore', 'masterDataTransactionNumber@storeTranoType')->name('tranoType.store');
    Route::get('tranoNumber', 'masterDataTransactionNumber@indexTranoNumber')->name('tranoNumber.index');
    Route::get('exchangeRate', 'masterDataExchangeRate@exchangeRate')->name('exchangeRate.index');
    Route::get('COA', 'masterDataCoa@Coa')->name('COA.index');

    //Supplier
    Route::get('Supplier', 'masterDataSupplier@supplier')->name('supplier.index');
    Route::get('addSupplier', 'masterDataSupplier@addSupplier')->name('supplier.addSupplier');
    Route::post('revisionSupplier', 'masterDataSupplier@revisionSupplier')->name('supplier.revisionSupplier');

    // UOM

    Route::get('UOM', 'masterDataUom@Uom')->name('Uom.index');
    Route::get('addUom', 'masterDataUom@addUom')->name('addUom.index');
    Route::get('editUom', 'masterDataUom@editUom')->name('editUom.index');
    Route::post('revisionUom', 'masterDataUom@revisionUomIndex')->name('Uom.revisionUom');

    //Finance

    Route::get('editApNumber', 'finance@editApNumber')->name('editApNumber.index');
    Route::get('editApJournal', 'finance@editApJournal')->name('editApJournal.index');
    Route::get('editApBankJournal', 'finance@editApBankJournal')->name('editApBankJournal.index');
    Route::get('bankReceiveMoney', 'finance@bankReceiveMoney')->name('bankReceiveMoney.index');
    Route::get('editBankReceiveMoney', 'finance@editBankReceiveMoney')->name('editBankReceiveMoney.index');
    Route::get('bankSpendMoney', 'finance@bankSpendMoney')->name('bankSpendMoney.index');
    Route::get('editBankSpendMoney', 'finance@editBankSpendMoney')->name('editBankSpendMoney.index');
    Route::get('bankChargers', 'finance@bankChargers')->name('bankChargers.index');
    Route::get('editBankChargers', 'finance@editBankChargers')->name('editBankChargers.index');


    // Dashboard
    Route::get('projectDashboard', 'homeController@projectDashboard')->name('home.projectDashboard');
    Route::get('checkDocument', 'homeController@checkDocument')->name('home.checkDocument');
    Route::get('myDocument', 'homeController@myDocument')->name('home.myDocument');
    Route::get('submittedDocument', 'homeController@submittedDocument')->name('home.submittedDocument');
    Route::get('approvedDocument', 'homeController@approvedDocument')->name('home.approvedDocument');
    Route::get('documentWorkflow', 'homeController@documentWorkflow')->name('home.documentWorkflow');
});


//---[ Default ERP Reborn (Front End & Back End) ]---(START)------

Route::get('showLogOutput', function () {
    return view('zhtHelperLogOutputShow');
})->middleware('web');

Route::get('showLogError', function () {
    return view('zhtHelperLogErrorShow');
})->middleware('web');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthentication_sendAuthRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIAuthentication_SendAuthRequest', 'webWithoutCSRF');

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : authentication.general....                                                                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthentication_setLogin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIAuthentication_setLogin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthenticationJQuery_setLogin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIAuthenticationJQuery_setLogin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthentication_setLoginBranchAndUserRole', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setLoginBranchAndUserRole', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIAuthenticationJQuery_setLoginBranchAndUserRole', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setLoginBranchAndUserRole', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setLogout', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setLogout', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setLogout', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setLogout', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : environment.general.session....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getSessionData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getSessionData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getSessionData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getSessionData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getSessionUserPrivilegesMenu', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getSessionUserPrivilegesMenu', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getSessionUserPrivilegesMenu', ['get', 'post'], '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getSessionUserPrivilegesMenu', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setUserSessionSysEngine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setUserSessionSysEngine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setUserSessionSysEngine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setUserSessionSysEngine', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : instruction.device.fingerprintAttendance.ALBox.FP800....                                                         |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDeviceALBoxFP800_AttendanceData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDeviceALBoxFP800_AttendanceData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDeviceALBoxFP800_AttendanceData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDeviceALBoxFP800_AttendanceData', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : instruction.device.fingerprintAttendance.Solution.x601....                                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDeviceSolutionX601_AttendanceData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDeviceSolutionX601_AttendanceData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDeviceSolutionX601_AttendanceData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDeviceSolutionX601_AttendanceData', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : instruction.device.swingBarrierGate.Goodwin.ServoSW01....                                                        |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDeviceGoodwinServoSW01_AttendanceData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDeviceGoodwinServoSW01_AttendanceData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDeviceGoodwinServoSW01_AttendanceData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDeviceGoodwinServoSW01_AttendanceData', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : instruction.server.externalServer.webSiteScraper.fiskal_kemenkeu_go_id....                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getWebSiteScraper_TaxExchangeRateData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getWebSiteScraper_TaxExchangeRateData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getWebSiteScraper_TaxExchangeRateData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getWebSiteScraper_TaxExchangeRateData', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : instruction.server.externalServer.webSiteScraper.www_bi_go_id....                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getWebSiteScraper_CentralBankExchangeRateData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getWebSiteScraper_CentralBankExchangeRateData', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getWebSiteScraper_CentralBankExchangeRateData', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getWebSiteScraper_CentralBankExchangeRateData', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getWebSiteScraper_CentralBankExchangeRateTimeSeriesDataFromOfflineFile', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getWebSiteScraper_CentralBankExchangeRateTimeSeriesDataFromOfflineFile', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getWebSiteScraper_CentralBankExchangeRateTimeSeriesDataFromOfflineFile', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getWebSiteScraper_CentralBankExchangeRateTimeSeriesDataFromOfflineFile', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : scheduler....                                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryDay', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryDay', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryDay', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryDay', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryHour', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryHour', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryHour', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryHour', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryMinute', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryMinute', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryMinute', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryMinute', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryMonth', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryMonth', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryMonth', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryMonth', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryTwoHours', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryTwoHours', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryTwoHours', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryTwoHours', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryWeek', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryWeek', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryWeek', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryWeek', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_callSchedulerEveryYear', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_callSchedulerEveryYear', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_callSchedulerEveryYear', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_callSchedulerEveryYear', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.budgeting....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseLine', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.accounting....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCodeOfAccounting', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCodeOfAccounting', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCodeOfAccounting', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCodeOfAccounting', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteJournal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteJournal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteJournal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteJournal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteJournalDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteJournalDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteJournalDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteJournalDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLayoutStructure', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLayoutStructure', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLayoutStructure', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLayoutStructure', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLayoutStructureCodeOfAccounting', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLayoutStructureCodeOfAccounting', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLayoutStructureCodeOfAccounting', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLayoutStructureCodeOfAccounting', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.budgeting....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.customerRelation....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCustomer', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.finance....                                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteAdvance', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteAdvance', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteAdvance', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteAdvance', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteAdvanceDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteAdvanceDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteAdvanceDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteAdvanceDetail', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.fixedAsset....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteGoodsIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteGoodsIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteGoodsIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteGoodsIdentity', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.humanResource....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessTripCostComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessTripCostComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessTripCostComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessTripCostComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteEmployee', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteEmployee', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteEmployee', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteEmployee', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLog_FingerPrintMachine_Attendance', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLog_FingerPrintMachine_Attendance', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLog_FingerPrintMachine_Attendance', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLog_FingerPrintMachine_Attendance', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLog_FingerPrintMachine_AttendanceFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLog_FingerPrintMachine_AttendanceFetch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLog_FingerPrintMachine_AttendanceFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLog_FingerPrintMachine_AttendanceFetch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteMapper_FingerPrintUserToPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteMapper_FingerPrintUserToPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteMapper_FingerPrintUserToPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteMapper_FingerPrintUserToPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteOrganizationalDepartment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteOrganizationalDepartment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteOrganizationalDepartment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteOrganizationalDepartment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonBusinessTrip', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonBusinessTrip', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonBusinessTrip', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonBusinessTrip', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonBusinessTripSequence', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonBusinessTripSequence', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonBusinessTripSequence', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonBusinessTripSequence', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonBusinessTripSequenceDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonBusinessTripSequenceDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonBusinessTripSequenceDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonBusinessTripSequenceDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonWorkAbsencePermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonWorkAbsencePermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonWorkAbsencePermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonWorkAbsencePermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonWorkAbsenceReplacement', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonWorkAbsenceReplacement', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonWorkAbsenceReplacement', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonWorkAbsenceReplacement', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonWorkArriveDepartPermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonWorkArriveDepartPermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonWorkArriveDepartPermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonWorkArriveDepartPermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkAbsencePermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkAbsencePermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkAbsencePermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkAbsencePermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkAbsencePermitType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkAbsencePermitType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkAbsencePermitType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkAbsencePermitType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkArriveDepartPermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkArriveDepartPermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkArriveDepartPermit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkArriveDepartPermit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkDay', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkDay', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkDay', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkDay', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkTimeAssignation', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkTimeAssignation', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkTimeAssignation', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkTimeAssignation', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkTimeEpoch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkTimeEpoch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkTimeEpoch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkTimeEpoch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkTimeSchedule', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkTimeSchedule', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkTimeSchedule', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkTimeSchedule', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenFamilyCardMember', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenFamilyCardMember', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenFamilyCardMember', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenFamilyCardMember', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonAccountSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonAccountSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonAccountSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonAccountSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.project....                                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteProjectSection', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.supplyChain....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteSupplier', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.sysConfig....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDBObject_User', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDBObject_User', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDBObject_User', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDBObject_User', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLog_UserLoginSession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLog_UserLoginSession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLog_UserLoginSession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLog_UserLoginSession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteRotateLog_API', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteRotateLog_API', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteRotateLog_API', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteRotateLog_API', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.initialize.master....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.budgeting....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseLine', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.customerRelation....                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.master....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListPeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListPeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListPersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListPersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListPersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListPersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.production....                                                                         |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListMaterialProductComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListMaterialProductComponent', 'webWithoutCSRF');

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.project....                                                                            |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListProjectSectionItem', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.budgeting....                                                                        |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudgetExpenseLine', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.customerRelation....                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.dataAcquisition....                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordLog_Device_PersonAccess', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordLog_Device_PersonAccess', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordLog_Device_PersonAccessFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordLog_Device_PersonAccessFetch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordLog_Device_PersonAccessFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordLog_Device_PersonAccessFetch', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.master....                                                                           |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.production....                                                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordMaterialProductComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordMaterialProductComponent', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.project....                                                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProjectSectionItem', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.sysConfig....                                                                        |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDBObject_User', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDBObject_User', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDBObject_User', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDBObject_User', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.synchronize.master....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataSynchronizeBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataSynchronizeBusinessDocument', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataSynchronizeCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataSynchronizeCurrencyExchangeRateTax', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataSynchronizeCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataSynchronizeCurrencyExchangeRateCentralBank', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.synchronize.project....                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataSynchronizeProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataSynchronizeProject', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.synchronize.sysConfig....                                                                            |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeLog_Device_PersonAccess', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.master....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocumentVersion', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.budgeting....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudgetExpenseCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudgetExpenseCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudgetExpenseCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudgetExpenseCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudgetExpenseLine', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCurrency', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateTradeMark', 'webWithoutCSRF');


/*-------OTHERS----------*/

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('sendRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@SendRequest', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'webWithoutCSRF');




//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----