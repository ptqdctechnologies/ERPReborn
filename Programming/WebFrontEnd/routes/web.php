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


Route::group(['middleware' => ['prevent-back-history', 'SessionLogin']], function () {


    Route::get('getProject', 'FunctionController@getProject')->name('getProject');
    Route::get('getSite', 'FunctionController@getSite')->name('getSite');

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
    //CountryAdministrativeAreaLevel1
    Route::resource('CountryAdministrativeAreaLevel1', 'masterDataCountryAdministrativeAreaLevel1');
    //CountryAdministrativeAreaLevel2
    Route::resource('CountryAdministrativeAreaLevel2', 'masterDataCountryAdministrativeAreaLevel2');
    //CountryAdministrativeAreaLevel3
    Route::resource('CountryAdministrativeAreaLevel3', 'masterDataCountryAdministrativeAreaLevel3');
    //CountryAdministrativeAreaLevel4
    Route::resource('CountryAdministrativeAreaLevel4', 'masterDataCountryAdministrativeAreaLevel4');
    //BloodAglutinogenType
    Route::resource('BloodAglutinogenType', 'masterDataBloodAglutinogenType');
    //BusinessDocument
    Route::resource('BusinessDocument', 'masterDataBusinessDocument');
    //BusinessDocumentType
    Route::resource('BusinessDocumentType', 'masterDataBusinessDocumentType');
    //BusinessDocumentVersion
    Route::resource('BusinessDocumentVersion', 'masterDataBusinessDocumentVersion');
    
    // ARF
    Route::post('store2', 'procurementTransactionArf@store2')->name('ARF.store2');
    Route::post('revisionArf', 'procurementTransactionArf@revisionArfIndex')->name('ARF.revisionArf');
    Route::resource('ARF', 'procurementTransactionArf');
    Route::get('ARF2', 'procurementTransactionArf@index2')->name('ARF.index2');
    Route::get('ARF3', 'procurementTransactionArf@index3')->name('ARF.index3');
    Route::get('ARF4', 'procurementTransactionArf@index4')->name('ARF.index4');
    Route::post('submitDataArf', 'procurementTransactionArf@submitData')->name('ARF.submitData');

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
    Route::get('PR','procurementTransactionPR@index')->name('PR.createPR');
    Route::post('editExistingPR','procurementTransactionPR@editExistingPR')->name('PR.editExistingPR');
    Route::post('editExistingOverheadPR','procurementTransactionPR@editExistingOverheadPR')->name('PR.editExistingOverheadPR');
    Route::post('editExistingSalesPR','procurementTransactionPR@editExistingSalesPR')->name('PR.editExistingSalesPR');
    Route::post('revisionPR','procurementTransactionPR@revisionPR')->name('PR.revisionPR');
    Route::post('revisionSalesPR','procurementTransactionPR@revisionSalesPR')->name('PR.revisionSalesPR');
    Route::post('revisionOverheadPR','procurementTransactionPR@revisionOverheadPR')->name('PR.revisionOverheadPR');
    Route::get('arflist/cancel/','procurementTransactionPR@prlistcancel');
    Route::post('tests1','procurementTransactionPR@tests1')->name('PR.tests1');
    Route::get('storePR','procurementTransactionArf@store')->name('PR.storePR');
    Route::resource('PR','procurementTransactionPR');

    // URP
    Route::get('createURP', 'procurementTransactionURP@createURP')->name('URP.createURP');

    // PPNRem
    Route::get('PPNRem', 'procurementTransactionPPNRem@createPPNRem')->name('PPNRem.createPPNRem');
    Route::get('PPNRemSet', 'procurementTransactionPPNRem@createPPNRemSet')->name('PPNRem.createPPNRemSet');

    // PO
    Route::get('PO','procurementTransactionPO@createPO')->name('PO.createPO');
    Route::post('revisionPO','procurementTransactionPO@revisionPO')->name('PO.revisionPO');
    Route::get('createPOverhead','procurementTransactionPO@createPOverhead')->name('PO.createPOverhead');
    Route::get('createPOSales','procurementTransactionPO@createPOSales')->name('PO.createPOSales');
    Route::get('requestCancelPO','procurementTransactionPO@requestCancelPO')->name('PO.requestCancelPO');
    Route::get('fileUploadPO','procurementTransactionPO@fileUploadPO')->name('PO.fileUploadPO');

    // BSF
    Route::post('revisionBsf', 'procurementTransactionBsf@revisionBsfIndex')->name('BSF.revisionBsf');
    Route::post('BSF/store', 'procurementTransactionBsf@store')->name('BSF.store');
    Route::get('BSF', 'procurementTransactionBsf@createBSF')->name('BSF.createBSF');
    Route::post('submitDataBSF', 'procurementTransactionBsf@submitData')->name('BSF.submitData');


    // BRF
    Route::post('revisionBrf', 'procurementTransactionBrf@revisionBrfIndex')->name('BRF.revisionBrf');
    Route::get('BRF', 'procurementTransactionBrf@createBRF')->name('BRF.createBRF');
    Route::post('BRF/store', 'procurementTransactionBrf@store')->name('BRF.store');
    Route::post('BRF/storePaymentSequence', 'procurementTransactionBrf@storePaymentSequenceBrf')->name('BRF.storePaymentSequenceBrf');
    Route::post('submitDataBRF', 'procurementTransactionBrf@submitData')->name('BRF.submitData');

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

    Route::post('addListCartAsf', 'procurementTransactionAsf@addListCartAsf')->name('ASF.addListCartAsf');
    Route::resource('ASF', 'procurementTransactionAsf');
    Route::post('submitDataAsf', 'procurementTransactionAsf@submitData')->name('ASF.submitData');

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

    // Budget
    Route::resource('Budget','BudgetController');
    // Budget Expense
    Route::get('BudgetExpense/GetBudget','BudgetExpenseController@GetBudget')->name('BudgetExpense.GetBudget');
    Route::resource('BudgetExpense','BudgetExpenseController');
    // Budget ExpenseGroup
    Route::resource('BudgetExpenseGroup','BudgetExpenseGroupController');
    // Budget ExpenseLine
    Route::get('BudgetExpenseLine/GetBudgetExpense','BudgetExpenseLineController@GetBudgetExpense')->name('BudgetExpenseLine.GetBudgetExpense');
    Route::resource('BudgetExpenseLine','BudgetExpenseLineController');
    // Budget ExpenseLineCeiling
    Route::get('BudgetExpenseLineCeiling/GetBudgetExpenseLine','BudgetExpenseLineCeilingController@GetBudgetExpenseLine')->name('BudgetExpenseLineCeiling.GetBudgetExpenseLine');
    Route::resource('BudgetExpenseLineCeiling','BudgetExpenseLineCeilingController');
    // Budget ExpenseLineCeilingObjects
    Route::resource('BudgetExpenseLineCeilingObjects','BudgetExpenseLineCeilingObjectsController');
    // Budget Type
    Route::resource('BudgetType','BudgetTypeController');
    // CodeOfBudgeting
    Route::resource('CodeOfBudgeting','CodeOfBudgetingController');

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
| Route for API : dataPickList.budgeting....                                                                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListCombinedBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListCombinedBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListCombinedBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListCombinedBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListCombinedBudgetSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListCombinedBudgetSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListCombinedBudgetSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListCombinedBudgetSection', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : dataPickList.master....                                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListBankAccount', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListBudgetOrigin', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : dataPickList.production....                                                                                      |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListBillOfMaterial', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : dataPickList.project....                                                                                         |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListProjectSectionItemWork', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListProjectSectionItemWork', 'webWithoutCSRF');


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
| Route for API : fileHandling.upload.archive....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setUploadArchiveFilesListFilesFromStagingArea', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setUploadArchiveFilesListFilesFromStagingArea', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setUploadArchiveFilesListFilesFromStagingArea', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setUploadArchiveFilesListFilesFromStagingArea', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : fileHandling.upload.stagingArea....                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getUploadStagingAreaFilesList', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getUploadStagingAreaFilesList', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getUploadStagingAreaFilesList', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getUploadStagingAreaFilesList', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getUploadStagingAreaNewID', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getUploadStagingAreaNewID', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getUploadStagingAreaNewID', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getUploadStagingAreaNewID', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setUploadStagingAreaFilesToCloudStorage', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setUploadStagingAreaFilesToCloudStorage', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setUploadStagingAreaFilesToCloudStorage', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setUploadStagingAreaFilesToCloudStorage', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setUploadStagingAreaFilesToLocalStorage', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setUploadStagingAreaFilesToLocalStorage', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setUploadStagingAreaFilesToLocalStorage', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setUploadStagingAreaFilesToLocalStorage', 'webWithoutCSRF');


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
| Route for API : report.PDF.dataForm.supplyChain....                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataFormPurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataFormPurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataFormPurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataFormPurchaseOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : report.PDF.dataList.budgeting....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListBudget', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : report.PDF.dataList.master...                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListPeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListPeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListPerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListPerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListPersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListPersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListPersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListPersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : report.PDF.dataList.supplyChain....                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListPurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListPurchaseOrder', 'webWithoutCSRF');


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
| Route for API : transaction.create.customerRelation....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.dataAcquisition....                                                                           |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setLog_FileUpload_Object', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setLog_FileUpload_Object', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setLog_FileUpload_Object', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setLog_FileUpload_Object', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setLog_FileUpload_ObjectDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setLog_FileUpload_ObjectDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setLog_FileUpload_ObjectDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setLog_FileUpload_ObjectDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setLog_FileUpload_Pointer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setLog_FileUpload_Pointer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setLog_FileUpload_Pointer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setLog_FileUpload_Pointer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setLog_FileUpload_PointerHistory', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setLog_FileUpload_PointerHistory', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setLog_FileUpload_PointerHistory', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setLog_FileUpload_PointerHistory', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateCitizenProfession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateCitizenProfession', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateDataCompression', 'webWithoutCSRF');
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
| Route for API : transaction.create.production....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateMaterialProductComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateMaterialProductComponent', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.project....                                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateProjectSectionItem', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.supplyChain....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateSupplier', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.customerRelation....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.dataAcquisition....                                                                           |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLog_Device_PersonAccess', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLog_Device_PersonAccess', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteLog_Device_PersonAccessFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteLog_Device_PersonAccessFetch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteLog_Device_PersonAccessFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteLog_Device_PersonAccessFetch', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetOrigin', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteCitizenProfession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteCitizenProfession', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDataCompression', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteProjectSectionItem', 'webWithoutCSRF');


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
| Route for API : transaction.initialize.dataAcquisition....                                                                       |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeLog_FileUpload_Object', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeLog_FileUpload_Object', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeLog_FileUpload_Object', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeLog_FileUpload_Object', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeLog_FileUpload_ObjectDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeLog_FileUpload_ObjectDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeLog_FileUpload_ObjectDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeLog_FileUpload_ObjectDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeLog_FileUpload_Pointer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeLog_FileUpload_Pointer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeLog_FileUpload_Pointer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeLog_FileUpload_Pointer', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.initialize.master....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBudgetOrigin', 'webWithoutCSRF');
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
| Route for API : transaction.initialize.sysConfig....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeRotateLog_FileUploadStagingArea', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeRotateLog_FileUploadStagingArea', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingArea', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingArea', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.budgeting....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetExpenseOwner', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetExpenseOwner', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetExpenseOwner', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetExpenseOwner', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCombinedBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCombinedBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCombinedBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCombinedBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCombinedBudgetSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCombinedBudgetSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCombinedBudgetSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCombinedBudgetSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCombinedBudgetSectionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCombinedBudgetSectionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCombinedBudgetSectionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCombinedBudgetSectionDetail', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListCitizenGender', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBillOfMaterial', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListProjectSectionItemWork', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListProjectSectionItemWork', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.sysConfig....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListRotateLog_FileUploadStagingAreaDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListRotateLog_FileUploadStagingAreaDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListRotateLog_FileUploadStagingAreaDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListRotateLog_FileUploadStagingAreaDetail', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCitizenProfession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCitizenProfession', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordInstitutionType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordInstitutionType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordInstitutionType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordInstitutionType', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBillOfMaterialDetail', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.project....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordProjectSectionItemWork', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordProjectSectionItemWork', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.supplyChain....                                                                      |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordSupplier', 'webWithoutCSRF');


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
| Route for API : transaction.undelete.budgeting....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.customerRelation....                                                                        |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.dataAcquisition....                                                                         |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteLog_Device_PersonAccess', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteLog_Device_PersonAccess', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteLog_Device_PersonAccess', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteLog_Device_PersonAccessFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteLog_Device_PersonAccessFetch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteLog_Device_PersonAccessFetch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteLog_Device_PersonAccessFetch', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.finance....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteAdvance', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteAdvance', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteAdvance', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteAdvance', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteAdvanceDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteAdvanceDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteAdvanceDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteAdvanceDetail', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.fixedAsset....                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteGoodsIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteGoodsIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteGoodsIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteGoodsIdentity', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.humanResource....                                                                           |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessTripCostComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessTripCostComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessTripCostComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessTripCostComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteEmployee', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteEmployee', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteEmployee', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteEmployee', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.master....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenFamilyCardMember', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenFamilyCardMember', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenFamilyCardMember', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenFamilyCardMember', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCitizenProfession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCitizenProfession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCountry', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCountry', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel1', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel1', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel2', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel2', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel3', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel3', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel4', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCountryAdministrativeAreaLevel4', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCurrency', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCurrency', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCurrencyExchangeRateCentralBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCurrencyExchangeRateCentralBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteCurrencyExchangeRateTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteCurrencyExchangeRateTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDayOffGovernmentPolicy', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDayOffGovernmentPolicy', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDayOffNational', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDayOffNational', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDayOffRegional', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDayOffRegional', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteGoodsModel', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteGoodsModel', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteGoodsType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteGoodsType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePeriod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePeriod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePerson', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePerson', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePersonAccountEMail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePersonAccountEMail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePersonAccountSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePersonAccountSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePersonAccountSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePersonAccountSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePersonGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePersonGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteProduct', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteProduct', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteProductType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteProductType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteQuantityUnit', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteQuantityUnit', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteReligion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteReligion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteSocialMedia', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteSocialMedia', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.project....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteProjectSectionItem', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.supplyChain....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteSupplier', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.sysConfig....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDBObject_User', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDBObject_User', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDBObject_User', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDBObject_User', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteLog_UserLoginSession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteLog_UserLoginSession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteLog_UserLoginSession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteLog_UserLoginSession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteRotateLog_API', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteRotateLog_API', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteRotateLog_API', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteRotateLog_API', 'webWithoutCSRF');


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
| Route for API : transaction.update.customerRelation....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCustomer', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCustomer', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBloodAglutinogenType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBloodAglutinogenType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocument', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocument', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBusinessDocumentVersion', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBusinessDocumentVersion', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenFamilyCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenFamilyCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenFamilyRelationship', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenFamilyRelationship', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenGender', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenGender', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenIdentity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenIdentity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenIdentityCard', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenIdentityCard', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenMaritalStatus', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenMaritalStatus', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateCitizenProfession', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateCitizenProfession', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateCitizenProfession', 'webWithoutCSRF');

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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateDataCompression', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateDataCompression', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateDataCompression', 'webWithoutCSRF');
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


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.production....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBillOfMaterial', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBillOfMaterial', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateMaterialProductComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateMaterialProductComponent', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.project....                                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateProject', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateProject', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateProjectSection', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateProjectSection', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateProjectSectionItem', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateProjectSectionItem', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateProjectSectionItem', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.supplyChain....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateSupplier', 'webWithoutCSRF');







\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('sendRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@SendRequest', 'webWithoutCSRF');

//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----