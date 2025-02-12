<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


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
//---[ Example Code - Dynamic Route ]----------------------------------------------------[START]---

$varUserSession = 
    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

$varAPIWebToken =
    'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoid2lzbnUudHJlbmdnb25vIiwiaWF0IjoxNzM5MzUwNDc3fQ.NjE1NDFjZTRmMTY4ODlhZGUwZDk5NTY3MGYyZjhiMDZiNzlhNDBhMjU5OTAzYjdkODdiNzlhOWY0MzQ0OTlmZQ';


\App\Helpers\ZhtHelper\System\FrontEnd\Helper_LaravelRoute::setDynamicRoute_Examples_APICall(
    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
    $varAPIWebToken
    );

//---[ Example Code - Dynamic Route ]----------------------------------------------------[ END ]---

//---[ Static Route ]--------------------------------------------------------------------[START]---


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute(
    'setAPIRedirect',
    'match[post, get]',
    '\App\Http\Controllers\Application\FrontEnd\System\API\setAPIRedirect@main',
    'webWithoutCSRF'
    );

//\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('getArchivedFileObjectDownload/{encodedData}', 'get', '\App\Http\Controllers\Application\FrontEnd\System\FileHandling\Controller@getArchivedFileObjectDownload', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('getFileObjectDownload', 'get', '\App\Http\Controllers\Application\FrontEnd\System\FileHandling\Controller@getFileObjectDownload', 'webWithoutCSRF');

//---[ Static Route ]--------------------------------------------------------------------[ END ]---



//Programming/WebBackEnd/app/Http/Controllers/Application/BackEnd/System/FileHandling/Engines/upload/combined/general/deleteFile/v1/



// LOGIN
Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('loginStore', 'Auth\LoginController@loginStore')->name('loginStore');
Route::get('getRoleLogin', 'Auth\LoginController@getRoleLogin')->name('getRoleLogin');
Route::get('FlushCache', 'Auth\LoginController@FlushCache')->name('FlushCache');

Route::get('SessionCheckingLogout', 'Auth\LoginController@SessionCheckingLogout')->name('SessionCheckingLogout');
Route::get('SessionCheckingRedis', 'Auth\LoginController@SessionCheckingRedis')->name('SessionCheckingRedis');

Route::group(['middleware' => ['prevent-back-history', 'SessionLogin']], function () {    
    //logout
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('SessionCheckingLogout', 'Auth\LoginController@SessionCheckingLogout')->name('SessionCheckingLogout');
    // Route::get('SessionCheckingEvent', 'Auth\LoginController@SessionCheckingEvent')->name('SessionCheckingEvent');

    // Workflow
    
    Route::get('CheckingWorkflow', 'Controller@CheckingWorkflow')->name('CheckingWorkflow');
    Route::post('SelectWorkFlow', 'Controller@SelectWorkFlow')->name('SelectWorkFlow');

    // Dashboard
    Route::resource('dashboard', 'Dashboard\DashboardController');

    // Warehouse
    Route::post('EditWarehouse', 'Register\Warehouse\WarehouseController@EditWarehouse')->name('Warehouse.EditWarehouse');
    Route::resource('Warehouse', 'Register\Warehouse\WarehouseController');

    // Product
    Route::resource('Product', 'Register\Product\ProductController');

    //Approval Document

    Route::get('ApprovalAccepted', 'Document\ApprovalDocumentController@ApprovalAccepted')->name('ApprovalDocument.ApprovalAccepted');
    Route::get('ApprovalRejected', 'Document\ApprovalDocumentController@ApprovalRejected')->name('ApprovalDocument.ApprovalRejected');

    //Document
    Route::post('ShowDocument', 'Document\CheckDocumentController@ShowDocument')->name('CheckDocument.ShowDocument');
    Route::get('ShowDocumentByID', 'Document\CheckDocumentController@ShowDocumentByID')->name('CheckDocument.ShowDocumentByID');
    Route::get('FileAttachmentCheckDocument', 'Document\CheckDocumentController@FileAttachmentCheckDocument')->name('CheckDocument.FileAttachmentCheckDocument');
    Route::get('LogTransaction', 'Document\CheckDocumentController@LogTransaction')->name('LogTransaction');
    Route::get('ShowDocumentListData', 'Document\CheckDocumentController@ShowDocumentListData')->name('CheckDocument.ShowDocumentListData');
    Route::resource('CheckDocument', 'Document\CheckDocumentController');

    Route::post('MyDocumentListDataFilter', 'Document\MyDocumentController@MyDocumentListDataFilter')->name('MyDocument.MyDocumentListDataFilter');
    Route::get('ShowMyDocumentListData', 'Document\MyDocumentController@ShowMyDocumentListData')->name('MyDocument.ShowMyDocumentListData');
    Route::resource('MyDocument', 'Document\MyDocumentController');

    //MASTER DATA
    //Periode
    Route::resource('Periode', 'Register\PeriodeController');
    //ProductType
    Route::resource('ProductType', 'Register\ProductTypeController');
    //Religion
    Route::resource('Religion', 'Register\ReligionController');
    //Currency
    Route::resource('Currency', 'Register\CurrencyController');
    //Country
    Route::resource('Country', 'Register\CountryController');
    //CountryAdministrativeAreaLevel1
    Route::resource('CountryAdministrativeAreaLevel1', 'Register\CountryAdministrativeAreaLevel1Controller');
    //CountryAdministrativeAreaLevel2
    Route::resource('CountryAdministrativeAreaLevel2', 'Register\CountryAdministrativeAreaLevel2Controller');
    //CountryAdministrativeAreaLevel3
    Route::resource('CountryAdministrativeAreaLevel3', 'Register\CountryAdministrativeAreaLevel3Controller');
    //CountryAdministrativeAreaLevel4
    Route::resource('CountryAdministrativeAreaLevel4', 'Register\CountryAdministrativeAreaLevel4Controller');
    //BloodAglutinogenType
    Route::resource('BloodAglutinogenType', 'Register\BloodAglutinogenTypeController');
    //BusinessDocument
    Route::resource('BusinessDocument', 'Register\BusinessDocumentController');
    //BusinessDocumentType
    Route::resource('BusinessDocumentType', 'Register\BusinessDocumentTypeController');
    //BusinessDocumentVersion
    Route::resource('BusinessDocumentVersion', 'Register\BusinessDocumentVersionController');
    //Supplier
    Route::get('Supplier', 'Register\SupplierController@supplier')->name('supplier.index');
    Route::get('addSupplier', 'Register\SupplierController@addSupplier')->name('supplier.addSupplier');
    Route::post('revisionSupplier', 'Register\SupplierController@revisionSupplier')->name('supplier.revisionSupplier');
    // Budget
    Route::get('ModifyBudget', 'Budget\BudgetController@ModifyBudget')->name('Budget.ModifyBudget');
    Route::post('PreviewModifyBudget', 'Budget\BudgetController@PreviewModifyBudget')->name('Budget.PreviewModifyBudget');
    Route::post('ModifyBudget', 'Budget\BudgetController@ModifyBudgetPost')->name('Budget.ModifyBudgetPost');
    Route::get('ReportModifyBudgetSummary', 'Budget\BudgetController@ReportModifyBudgetSummary')->name('Budget.ReportModifyBudgetSummary');
    Route::post('ReportModifyBudgetSummaryStore', 'Budget\BudgetController@ReportModifyBudgetSummaryStore')->name('Budget.ReportModifyBudgetSummaryStore');
    Route::post('PrintExportReportModifyBudgetSummary', 'Budget\BudgetController@PrintExportReportModifyBudgetSummary')->name('Budget.PrintExportReportModifyBudgetSummary');
    Route::get('ReportModifyBudgetDetail', 'Budget\BudgetController@ReportModifyBudgetDetail')->name('Budget.ReportModifyBudgetDetail');
    Route::post('ReportModifyBudgetDetailStore', 'Budget\BudgetController@ReportModifyBudgetDetailStore')->name('Budget.ReportModifyBudgetDetailStore');
    Route::post('PrintExportReportModifyBudgetDetail', 'Budget\BudgetController@PrintExportReportModifyBudgetDetail')->name('Budget.PrintExportReportModifyBudgetDetail');
    Route::resource('Budget', 'BudgetController');
    // Budget Expense
    Route::get('BudgetExpense/GetBudget', 'BudgetExpenseController@GetBudget')->name('BudgetExpense.GetBudget');
    Route::resource('BudgetExpense', 'BudgetExpenseController');
    // Budget ExpenseGroup
    Route::resource('BudgetExpenseGroup', 'BudgetExpenseGroupController');
    // Budget ExpenseLine
    Route::get('BudgetExpenseLine/GetBudgetExpense', 'BudgetExpenseLineController@GetBudgetExpense')->name('BudgetExpenseLine.GetBudgetExpense');
    Route::resource('BudgetExpenseLine', 'BudgetExpenseLineController');
    // Budget ExpenseLineCeiling
    Route::get('BudgetExpenseLineCeiling/GetBudgetExpenseLine', 'BudgetExpenseLineCeilingController@GetBudgetExpenseLine')->name('BudgetExpenseLineCeiling.GetBudgetExpenseLine');
    Route::resource('BudgetExpenseLineCeiling', 'BudgetExpenseLineCeilingController');
    // Budget ExpenseLineCeilingObjects
    Route::get('BudgetExpenseLineCeilingObjects/GetBudgetExpenseLineCeiling', 'BudgetExpenseLineCeilingObjectsController@GetBudgetExpenseLineCeiling')->name('BudgetExpenseLineCeilingObjects.GetBudgetExpenseLineCeiling');
    Route::resource('BudgetExpenseLineCeilingObjects', 'BudgetExpenseLineCeilingObjectsController');
    // Budget Type
    Route::resource('BudgetType', 'BudgetTypeController');
    // CodeOfBudgeting
    Route::resource('CodeOfBudgeting', 'CodeOfBudgetingController');
    // PrivilageMenu
    Route::get('DataListPrivilageMenu', 'Register\PrivilageMenu\PrivilageMenuController@DataListPrivilageMenu')->name('PrivilageMenu.DataListPrivilageMenu');
    // MenuManagement
    Route::get('MenuManagement', 'Register\PrivilageMenu\PrivilageMenuController@MenuManagement')->name('PrivilageMenu.MenuManagement');
    Route::resource('PrivilageMenu', 'Register\PrivilageMenu\PrivilageMenuController');

    //Function
    Route::get('getProject', 'Function\FunctionController@getProject')->name('getProject');
    Route::get('getNewProject', 'Function\FunctionController@getNewProject')->name('getNewProject');
    Route::get('getPurchaseRequisitionByBudgetID', 'Function\FunctionController@getPurchaseRequisitionByBudgetID')->name('getPurchaseRequisitionByBudgetID');
    Route::get('getSite', 'Function\FunctionController@getSite')->name('getSite');
    Route::get('getNewSite', 'Function\FunctionController@getNewSite')->name('getNewSite');
    Route::get('getBudget', 'Function\FunctionController@getBudget')->name('getBudget');
    Route::get('getAdvance', 'Function\FunctionController@getAdvance')->name('getAdvance');
    Route::get('getBank', 'Function\FunctionController@getBank')->name('getBank');
    Route::get('getBankList', 'Function\FunctionController@getBankList')->name('getBankList');
    Route::get('getBankAccount', 'Function\FunctionController@getBankAccount')->name('getBankAccount');
    Route::get('getEntityBankAccount', 'Function\FunctionController@getEntityBankAccount')->name('getEntityBankAccount');
    Route::get('getProduct', 'Function\FunctionController@getProduct')->name('getProduct');
    Route::get('getWorker', 'Function\FunctionController@getWorker')->name('getWorker');
    Route::get('getSupplier', 'Function\FunctionController@getSupplier')->name('getSupplier');
    Route::get('getDeliverTo', 'Function\FunctionController@getDeliverTo')->name('getDeliverTo');
    Route::get('getWarehouse', 'Function\FunctionController@getWarehouse')->name('getWarehouse');
    Route::get('getBusinessTripCostComponentEntity', 'Function\FunctionController@getBusinessTripCostComponentEntity')->name('getBusinessTripCostComponentEntity');
    Route::get('getDocumentType', 'Function\FunctionController@getDocumentType')->name('getDocumentType');
    Route::get('getPrivilageMenu', 'Function\FunctionController@getPrivilageMenu')->name('getPrivilageMenu');
    Route::get('getCurrency', 'Function\FunctionController@getCurrency')->name('getCurrency');
    Route::get('getDepartement', 'Function\FunctionController@getDepartement')->name('getDepartement');
    Route::get('getRole', 'Function\FunctionController@getRole')->name('getRole');
    Route::get('getMenuGroup', 'Function\FunctionController@getMenuGroup')->name('getMenuGroup');
    Route::get('getSubMenu', 'Function\FunctionController@getSubMenu')->name('getSubMenu');
    Route::get('getOneSubMenu', 'Function\FunctionController@getOneSubMenu')->name('getOneSubMenu');

    Route::get('TestApi', 'TestApiController@index')->name('TestApi');



    // ARF 
    Route::get('AdvanceListData', 'Process\Advance\AdvanceRequestController@AdvanceListData')->name('AdvanceRequest.AdvanceListData');
    Route::get('ReportAdvanceSummary', 'Process\Advance\AdvanceRequestController@ReportAdvanceSummary')->name('AdvanceRequest.ReportAdvanceSummary');
    Route::post('ReportAdvanceSummaryStore', 'Process\Advance\AdvanceRequestController@ReportAdvanceSummaryStore')->name('AdvanceRequest.ReportAdvanceSummaryStore');
    Route::get('ReportAdvanceSummaryDetailID/{id}', 'Process\Advance\AdvanceRequestController@ReportAdvanceSummaryDetailID')->name('AdvanceRequest.ReportAdvanceSummaryDetailID');
    Route::get('ReportAdvanceSummaryDetail', 'Process\Advance\AdvanceRequestController@ReportAdvanceSummaryDetail')->name('AdvanceRequest.ReportAdvanceSummaryDetail');
    Route::post('ReportAdvanceSummaryDetailStore', 'Process\Advance\AdvanceRequestController@ReportAdvanceSummaryDetailStore')->name('AdvanceRequest.ReportAdvanceSummaryDetailStore');
    Route::get('RevisionAdvanceIndex', 'Process\Advance\AdvanceRequestController@RevisionAdvanceIndex')->name('AdvanceRequest.RevisionAdvanceIndex');
    Route::post('PrintExportReportAdvanceSummary', 'Process\Advance\AdvanceRequestController@PrintExportReportAdvanceSummary')->name('AdvanceRequest.PrintExportReportAdvanceSummary');
    Route::post('PrintExportReportAdvanceSummaryDetail', 'Process\Advance\AdvanceRequestController@PrintExportReportAdvanceSummaryDetail')->name('AdvanceRequest.PrintExportReportAdvanceSummaryDetail');
    Route::post('updates', 'Process\Advance\AdvanceRequestController@updates')->name('AdvanceRequest.updates');
    Route::resource('AdvanceRequest', 'Process\Advance\AdvanceRequestController');

    // ASF
    Route::post('StoreValidateAdvanceSettlementBeneficiary', 'Process\Advance\AdvanceSettlementController@StoreValidateAdvanceSettlementBeneficiary')->name('AdvanceSettlement.StoreValidateAdvanceSettlementBeneficiary');
    Route::get('RevisionAdvanceSettlementIndex', 'Process\Advance\AdvanceSettlementController@RevisionAdvanceSettlementIndex')->name('AdvanceSettlement.RevisionAdvanceSettlementIndex');
    Route::get('AdvanceSettlementListData', 'Process\Advance\AdvanceSettlementController@AdvanceSettlementListData')->name('AdvanceSettlement.AdvanceSettlementListData');
    Route::get('AdvanceSettlementListDataById', 'Process\Advance\AdvanceSettlementController@AdvanceSettlementListDataById')->name('AdvanceSettlement.AdvanceSettlementListDataById');
    Route::post('SearchAdvanceRequest', 'Process\Advance\AdvanceSettlementController@SearchAdvanceRequest')->name('AdvanceSettlement.SearchAdvanceRequest');
    Route::get('AdvanceSettlementListCartRevision', 'Process\Advance\AdvanceSettlementController@AdvanceSettlementListCartRevision')->name('AdvanceSettlement.AdvanceSettlementListCartRevision');
    Route::get('ReportAdvanceSettlementSummary', 'Process\Advance\AdvanceSettlementController@ReportAdvanceSettlementSummary')->name('AdvanceSettlement.ReportAdvanceSettlementSummary');
    Route::post('ReportAdvanceSettlementSummaryStore', 'Process\Advance\AdvanceSettlementController@ReportAdvanceSettlementSummaryStore')->name('AdvanceSettlement.ReportAdvanceSettlementSummaryStore');
    Route::post('PrintExportReportAdvanceSettlementSummary', 'Process\Advance\AdvanceSettlementController@PrintExportReportAdvanceSettlementSummary')->name('AdvanceSettlement.PrintExportReportAdvanceSettlementSummary');
    
    Route::get('ReportAdvanceSettlementDetail', 'Process\Advance\AdvanceSettlementController@ReportAdvanceSettlementDetail')->name('AdvanceSettlement.ReportAdvanceSettlementDetail');
    Route::post('ReportAdvanceSettlementDetailStore', 'Process\Advance\AdvanceSettlementController@ReportAdvanceSettlementDetailStore')->name('AdvanceSettlement.ReportAdvanceSettlementDetailStore');
    Route::post('PrintExportReportAdvanceSettlementDetail', 'Process\Advance\AdvanceSettlementController@PrintExportReportAdvanceSettlementDetail')->name('AdvanceSettlement.PrintExportReportAdvanceSettlementDetail');
    Route::resource('AdvanceSettlement', 'Process\Advance\AdvanceSettlementController');

    // BSF
    Route::post('StoreValidateBusinessTripSettlement', 'Process\BusinessTrip\BusinessTripSettlementController@StoreValidateBusinessTripSettlement')->name('BusinessTripSettlement.StoreValidateBusinessTripSettlement');
    Route::post('StoreValidateBusinessTripSettlement2', 'Process\BusinessTrip\BusinessTripSettlementController@StoreValidateBusinessTripSettlement2')->name('BusinessTripSettlement.StoreValidateBusinessTripSettlement2');
    Route::post('StoreValidateBusinessTripSettlementRequester', 'Process\BusinessTrip\BusinessTripSettlementController@StoreValidateBusinessTripSettlementRequester')->name('BusinessTripSettlement.StoreValidateBusinessTripSettlementRequester');
    Route::get('RevisionBusinessTripSettlementIndex', 'Process\BusinessTrip\BusinessTripSettlementController@RevisionBusinessTripSettlementIndex')->name('BusinessTripSettlement.RevisionBusinessTripSettlementIndex');
    Route::get('BusinessTripSettlementListData', 'Process\BusinessTrip\BusinessTripSettlementController@BusinessTripSettlementListData')->name('BusinessTripSettlement.BusinessTripSettlementListData');
    Route::get('BusinessTripRequestByBudgetID', 'Process\BusinessTrip\BusinessTripSettlementController@BusinessTripRequestByBudgetID')->name('BusinessTripSettlement.BusinessTripRequestByBudgetID');
    Route::get('BusinessTripSettlementListDataById', 'Process\BusinessTrip\BusinessTripSettlementController@BusinessTripSettlementListDataById')->name('BusinessTripSettlement.BusinessTripSettlementListDataById');
    Route::get('BusinessTripSettlementListCartRevision', 'Process\BusinessTrip\BusinessTripSettlementController@BusinessTripSettlementListCartRevision')->name('BusinessTripSettlement.BusinessTripSettlementListCartRevision');
    Route::post('SearchBusinessTripRequest', 'Process\BusinessTrip\BusinessTripSettlementController@SearchBusinessTripRequest')->name('BusinessTripSettlement.SearchBusinessTripRequest');
    
    Route::get('ReportBusinessTripSettlementSummary', 'Process\BusinessTrip\BusinessTripSettlementController@ReportBusinessTripSettlementSummary')->name('BusinessTripSettlement.ReportBusinessTripSettlementSummary');
    Route::post('ReportBusinessTripSettlementSummaryStore', 'Process\BusinessTrip\BusinessTripSettlementController@ReportBusinessTripSettlementSummaryStore')->name('BusinessTripSettlement.ReportBusinessTripSettlementSummaryStore');
    Route::post('PrintExportReportBusinessTripSettlementSummary', 'Process\BusinessTrip\BusinessTripSettlementController@PrintExportReportBusinessTripSettlementSummary')->name('BusinessTripSettlement.PrintExportReportBusinessTripSettlementSummary');

    Route::get('ReportBusinessTripSettlementDetail', 'Process\BusinessTrip\BusinessTripSettlementController@ReportBusinessTripSettlementDetail')->name('BusinessTripSettlement.ReportBusinessTripSettlementDetail');
    Route::post('ReportBusinessTripSettlementDetailStore', 'Process\BusinessTrip\BusinessTripSettlementController@ReportBusinessTripSettlementDetailStore')->name('BusinessTripSettlement.ReportBusinessTripSettlementDetailStore');
    Route::post('PrintExportReportBusinessTripSettlementDetail', 'Process\BusinessTrip\BusinessTripSettlementController@PrintExportReportBusinessTripSettlementDetail')->name('BusinessTripSettlement.PrintExportReportBusinessTripSettlementDetail');
    Route::resource('BusinessTripSettlement', 'Process\BusinessTrip\BusinessTripSettlementController');

    // BRF
    Route::post('StoreValidateBusinessTripRequest', 'Process\BusinessTrip\BusinessTripRequestController@StoreValidateBusinessTripRequest')->name('BusinessTripRequest.StoreValidateBusinessTripRequest');
    Route::post('StoreValidateBusinessTripRequest2', 'Process\BusinessTrip\BusinessTripRequestController@StoreValidateBusinessTripRequest2')->name('BusinessTripRequest.StoreValidateBusinessTripRequest2');
    Route::get('RevisionBusinessTripRequestIndex', 'Process\BusinessTrip\BusinessTripRequestController@RevisionBusinessTripRequestIndex')->name('BusinessTripRequest.RevisionBusinessTripRequest');
    Route::get('BusinessTripRequestListData', 'Process\BusinessTrip\BusinessTripRequestController@BusinessTripRequestListData')->name('BusinessTripRequest.BusinessTripRequestListData');
    Route::post('BusinessTripRequestListCartRevision', 'Process\BusinessTrip\BusinessTripRequestController@BusinessTripRequestListCartRevision')->name('BusinessTripRequest.BusinessTripRequestListCartRevision');
    Route::get('ReportBusinessTripRequestSummary', 'Process\BusinessTrip\BusinessTripRequestController@ReportBusinessTripRequestSummary')->name('BusinessTripRequest.ReportBusinessTripRequestSummary');
    Route::post('ReportBusinessTripRequestSummaryStore', 'Process\BusinessTrip\BusinessTripRequestController@ReportBusinessTripRequestSummaryStore')->name('BusinessTripRequest.ReportBusinessTripRequestSummaryStore');
    Route::post('PrintExportReportBusinessTripRequestSummary', 'Process\BusinessTrip\BusinessTripRequestController@PrintExportReportBusinessTripRequestSummary')->name('BusinessTripRequest.PrintExportReportBusinessTripRequestSummary');
    Route::get('ReportBusinessTripRequestDetail', 'Process\BusinessTrip\BusinessTripRequestController@ReportBusinessTripRequestDetail')->name('BusinessTripRequest.ReportBusinessTripRequestDetail');
    Route::post('ReportBusinessTripRequestDetailStore', 'Process\BusinessTrip\BusinessTripRequestController@ReportBusinessTripRequestDetailStore')->name('BusinessTripRequest.ReportBusinessTripRequestDetailStore');
    Route::post('PrintExportReportBusinessTripRequestDetail', 'Process\BusinessTrip\BusinessTripRequestController@PrintExportReportBusinessTripRequestDetail')->name('BusinessTripRequest.PrintExportReportBusinessTripRequestDetail');
    Route::resource('BusinessTripRequest', 'Process\BusinessTrip\BusinessTripRequestController');

    // REM
    Route::post('StoreValidateReimbursableExpenditure', 'Process\Reimbursement\ReimbursableExpenditureController@StoreValidateReimbursableExpenditure')->name('ReimbursableExpenditure.StoreValidateReimbursableExpenditure');
    Route::post('StoreValidateReimbursableExpenditure2', 'Process\Reimbursement\ReimbursableExpenditureController@StoreValidateReimbursableExpenditure2')->name('ReimbursableExpenditure.StoreValidateReimbursableExpenditure2');
    Route::post('RevisionReimbursableExpenditure', 'Process\Reimbursement\ReimbursableExpenditureController@RevisionReimbursableExpenditureIndex')->name('ReimbursableExpenditure.RevisionReimbursableExpenditure');
    Route::resource('ReimbursableExpenditure', 'Process\Reimbursement\ReimbursableExpenditureController');

    // PR
    Route::post('StoreValidatePurchaseRequisition', 'Purchase\PurchaseRequisitionController@StoreValidatePurchaseRequisition')->name('PurchaseRequisition.StoreValidatePurchaseRequisition');
    Route::post('StoreValidatePurchaseRequisition2', 'Purchase\PurchaseRequisitionController@StoreValidatePurchaseRequisition2')->name('PurchaseRequisition.StoreValidatePurchaseRequisition2');
    Route::post('RevisionPrIndex', 'Purchase\PurchaseRequisitionController@RevisionPrIndex')->name('PurchaseRequisition.RevisionPrIndex');
    Route::get('ReportPurchaseRequisitionSummary', 'Purchase\PurchaseRequisitionController@ReportPurchaseRequisitionSummary')->name('PurchaseRequisition.ReportPurchaseRequisitionSummary');
    Route::post('ReportPurchaseRequisitionSummaryStore', 'Purchase\PurchaseRequisitionController@ReportPurchaseRequisitionSummaryStore')->name('PurchaseRequisition.ReportPurchaseRequisitionSummaryStore');
    Route::get('ReportPurchaseRequisitionDetailID/{id}', 'Purchase\PurchaseRequisitionController@ReportPurchaseRequisitionDetailID')->name('PurchaseRequisition.ReportPurchaseRequisitionDetailID');
    Route::post('PrintExportReportPurchaseRequisitionSummary', 'Purchase\PurchaseRequisitionController@PrintExportReportPurchaseRequisitionSummary')->name('PurchaseRequisition.PrintExportReportPurchaseRequisitionSummary');
    Route::post('PrintExportReportPurchaseRequisitionDetail', 'Purchase\PurchaseRequisitionController@PrintExportReportPurchaseRequisitionDetail')->name('PurchaseRequisition.PrintExportReportPurchaseRequisitionDetail');
    
    Route::get('ReportPurchaseRequisitionToPurchaseOrder', 'Purchase\PurchaseRequisitionController@ReportsPrtoPo')->name('PurchaseRequisition.ReportPurchaseRequisitionToPurchaseOrder');
    Route::get('ReportPurchaseRequisitionDetail', 'Purchase\PurchaseRequisitionController@ReportPurchaseRequisitionDetail')->name('PurchaseRequisition.ReportPurchaseRequisitionDetail');
    Route::post('ReportPurchaseRequisitionDetailStore', 'Purchase\PurchaseRequisitionController@ReportPurchaseRequisitionDetailStore')->name('PurchaseRequisition.ReportPurchaseRequisitionDetailStore');
    Route::get('PurchaseRequisitionListData', 'Purchase\PurchaseRequisitionController@PurchaseRequisitionListData')->name('PurchaseRequisition.PurchaseRequisitionListData');
    Route::post('ProcReqListCartRevision', 'Purchase\PurchaseRequisitionController@ProcReqListCartRevision')->name('PurchaseRequisition.ProcReqListCartRevision');
    Route::resource('PurchaseRequisition', 'Purchase\PurchaseRequisitionController');

    // PO
    Route::post('StoreValidatePurchaseOrder', 'Purchase\PurchaseOrderController@StoreValidatePurchaseOrder')->name('PurchaseOrder.StoreValidatePurchaseOrder');
    Route::post('StoreValidatePurchaseOrder2', 'Purchase\PurchaseOrderController@StoreValidatePurchaseOrder2')->name('PurchaseOrder.StoreValidatePurchaseOrder2');
    Route::post('StoreValidatePurchaseOrderPrNumber', 'Purchase\PurchaseOrderController@StoreValidatePurchaseOrderPrNumber')->name('PurchaseOrder.StoreValidatePurchaseOrderPrNumber');
    Route::get('RevisionPurchaseOrder', 'Purchase\PurchaseOrderController@RevisionPurchaseOrderIndex')->name('PurchaseOrder.RevisionPurchaseOrder');
    Route::get('ReportPurchaseOrderSummary', 'Purchase\PurchaseOrderController@ReportPoSummary')->name('PurchaseOrder.ReportPurchaseOrderSummary');
    Route::post('ReportPurchaseOrderSummaryStore', 'Purchase\PurchaseOrderController@ReportPurchaseOrderSummaryStore')->name('PurchaseOrder.ReportPurchaseOrderSummaryStore');
    Route::post('PrintExportReportPurchaseOrderSummary', 'Purchase\PurchaseOrderController@PrintExportReportPurchaseOrderSummary')->name('PurchaseOrder.PrintExportReportPurchaseOrderSummary');
    Route::get('ReportPurchaseOrderDetail', 'Purchase\PurchaseOrderController@ReportPoDetail')->name('PurchaseOrder.ReportPurchaseOrderDetail');
    Route::get('ReportPOtoAP', 'Purchase\PurchaseOrderController@ReportPoToAp')->name('PurchaseOrder.ReportPOtoAP');
    Route::get('ReportCFS', 'Purchase\PurchaseOrderController@ReportCFS')->name('PurchaseOrder.ReportCFS');
    Route::post('ReportCFSStore', 'Purchase\PurchaseOrderController@ReportCFSStore')->name('PurchaseOrder.ReportCFSStore');
    Route::post('PrintExportReportCFS', 'Purchase\PurchaseOrderController@PrintExportReportCFS')->name('PurchaseOrder.PrintExportReportCFS');
    Route::post('ReportPurchaseOrderDetailStore', 'Purchase\PurchaseOrderController@ReportPurchaseOrderDetailStore')->name('PurchaseOrder.ReportPurchaseOrderDetailStore');
    Route::post('PrintExportReportPurchaseOrderDetail', 'Purchase\PurchaseOrderController@PrintExportReportPurchaseOrderDetail')->name('PurchaseOrder.PrintExportReportPurchaseOrderDetail');
    Route::get('PurchaseOrderListData', 'Purchase\PurchaseOrderController@PurchaseOrderListData')->name('PurchaseOrder.PurchaseOrderListData');
    // Route::post('RevisionPurchaseOrder', 'Purchase\PurchaseOrderController@RevisionPurchaseOrder')->name('PurchaseOrder.RevisionPurchaseOrder');
    Route::get('PurchaseOrderByPrID', 'Purchase\PurchaseOrderController@PurchaseOrderByPrID')->name('PurchaseOrder.PurchaseOrderByPrID');
    Route::post('addListCartPurchaseOrder', 'Purchase\PurchaseOrderController@addListCartPurchaseOrder')->name('PurchaseOrder.addListCartPurchaseOrder');
    Route::resource('PurchaseOrder', 'Purchase\PurchaseOrderController');

    // OP
    Route::post('StoreValidateOrderPicking', 'Purchase\OrderPickingController@StoreValidateOrderPicking')->name('OrderPicking.StoreValidateOrderPicking');
    Route::post('StoreValidateOrderPicking2', 'Purchase\OrderPickingController@StoreValidateOrderPicking2')->name('OrderPicking.StoreValidateOrderPicking2');
    Route::post('StoreValidateOrderPickingPrNumber', 'Purchase\OrderPickingController@StoreValidateOrderPickingPrNumber')->name('OrderPicking.StoreValidateOrderPickingPrNumber');
    Route::post('RevisionOrderPicking', 'Purchase\OrderPickingController@RevisionOrderPickingIndex')->name('OrderPicking.RevisionOrderPicking');
    Route::get('ReportOrderPickingSummary', 'Purchase\OrderPickingController@ReportPoSummary')->name('OrderPicking.ReportOrderPickingSummary');
    Route::get('ReportOrderPickingDetail', 'Purchase\OrderPickingController@ReportPoDetail')->name('OrderPicking.ReportOrderPickingDetail');
    Route::get('OrderPickingListData', 'Purchase\OrderPickingController@OrderPickingListData')->name('OrderPicking.OrderPickingListData');
    // Route::post('RevisionOrderPicking', 'Purchase\OrderPickingController@RevisionOrderPicking')->name('OrderPicking.RevisionOrderPicking');
    Route::get('OrderPickingByPrID', 'Purchase\OrderPickingController@OrderPickingByPrID')->name('OrderPicking.OrderPickingByPrID');
    Route::post('addListCartOrderPicking', 'Purchase\OrderPickingController@addListCartOrderPicking')->name('OrderPicking.addListCartOrderPicking');
    Route::resource('OrderPicking', 'Purchase\OrderPickingController');
    

    // PPM
    Route::post('StoreValidatePieceMeal', 'HumanResource\PieceMealController@StoreValidatePieceMeal')->name('PieceMeal.StoreValidatePieceMeal');
    Route::post('StoreValidatePieceMeal2', 'HumanResource\PieceMealController@StoreValidatePieceMeal2')->name('PieceMeal.StoreValidatePieceMeal2');
    Route::post('RevisionPieceMeal', 'HumanResource\PieceMealController@RevisionPieceMeal')->name('PieceMeal.RevisionPieceMeal');
    Route::get('PieceMealListData', 'HumanResource\PieceMealController@PieceMealListData')->name('PieceMeal.PieceMealListData');
    Route::post('PieceMealListCartRevision', 'HumanResource\PieceMealController@PieceMealListCartRevision')->name('PieceMeal.PieceMealListCartRevision');
    Route::resource('PieceMeal', 'HumanResource\PieceMealController');
    //Timesheet
    Route::post('Timesheet/event', 'HumanResourckae\TimesheetController@event')->name('Timesheet.event');                                                                                                                                                                                                                                                                                                                                                                   
    Route::post('Timesheet/updates', 'HumanResource\TimesheetController@updates')->name('Timesheet.updates');
    Route::post('Timesheet/storeActivity', 'HumanResource\TimesheetController@storeActivity')->name('Timesheet.storeActivity');
    Route::resource('Timesheet', 'HumanResource\TimesheetController');

    // DOR
    Route::post('StoreValidateDeliveryOrderRequest', 'Inventory\DeliveryOrderRequestController@StoreValidateDeliveryOrderRequest')->name('DeliveryOrderRequest.StoreValidateDeliveryOrderRequest');
    Route::post('StoreValidateDeliveryOrderRequest2', 'Inventory\DeliveryOrderRequestController@StoreValidateDeliveryOrderRequest2')->name('DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2');
    Route::post('StoreValidateDeliveryOrderRequestSupplier', 'Inventory\DeliveryOrderRequestController@StoreValidateDeliveryOrderRequestSupplier')->name('DeliveryOrderRequest.StoreValidateDeliveryOrderRequestSupplier');
    Route::post('RevisionDeliveryOrderRequestIndex', 'Inventory\DeliveryOrderRequestController@RevisionDeliveryOrderRequestIndex')->name('DeliveryOrderRequest.RevisionDeliveryOrderRequestIndex');
    Route::get('DeliveryOrderRequestListData', 'Inventory\DeliveryOrderRequestController@DeliveryOrderRequestListData')->name('DeliveryOrderRequest.DeliveryOrderRequestListData');
    Route::get('DeliveryOrderRequestListDataByID', 'Inventory\DeliveryOrderRequestController@DeliveryOrderRequestListDataByID')->name('DeliveryOrderRequest.DeliveryOrderRequestListDataByID');
    Route::get('DeliveryOrderRequestByBudgetID', 'Inventory\DeliveryOrderRequestController@DeliveryOrderRequestByBudgetID')->name('DeliveryOrderRequest.DeliveryOrderRequestByBudgetID');
    Route::get('ReportDORequestSummary', 'Inventory\DeliveryOrderRequestController@ReportDORSummary')->name('Inventory.ReportDORequestSummary');
    Route::post('ReportDORequestSummaryStore', 'Inventory\DeliveryOrderRequestController@ReportDORSummaryStore')->name('Inventory.ReportDORequestSummaryStore');
    Route::post('PrintExportReportDORequestSummary', 'Inventory\DeliveryOrderRequestController@PrintExportReportDORSummary')->name('Inventory.PrintExportReportDORequestSummary');
    Route::get('ReportDORequestDetail', 'Inventory\DeliveryOrderRequestController@ReportDORDetail')->name('Inventory.ReportDORequestDetail');
    Route::post('ReportDORequestDetailStore', 'Inventory\DeliveryOrderRequestController@ReportDORDetailStore')->name('Inventory.ReportDORequestDetailStore');
    Route::post('PrintExportReportDORequestDetail', 'Inventory\DeliveryOrderRequestController@PrintExportReportDORDetail')->name('Inventory.PrintExportReportDORequestDetail');
    Route::get('ReportDORtoDO', 'Inventory\DeliveryOrderRequestController@ReportDORtoDO')->name('Inventory.ReportDORtoDO');
    // Route::post('DeliveryOrderRequestByPrID', 'Inventory\DeliveryOrderRequestController@DeliveryOrderRequestByPrID')->name('DeliveryOrderRequest.DeliveryOrderRequestByPrID');
    Route::post('DeliveryOrderRequestListCartRevision', 'Inventory\DeliveryOrderRequestController@DeliveryOrderRequestListCartRevision')->name('DeliveryOrderRequest.DeliveryOrderRequestListCartRevision');
    Route::post('SearchPurchaseOrder', 'Inventory\DeliveryOrderRequestController@SearchPurchaseOrder')->name('DeliveryOrderRequest.SearchPurchaseOrder');
    Route::post('SearchOrderPicking', 'Inventory\DeliveryOrderRequestController@SearchOrderPicking')->name('DeliveryOrderRequest.SearchOrderPicking');
    Route::post('SearchStockMovement', 'Inventory\DeliveryOrderRequestController@SearchStockMovement')->name('DeliveryOrderRequest.SearchStockMovement');
    Route::resource('DeliveryOrderRequest', 'Inventory\DeliveryOrderRequestController');

    // DO
    Route::post('RevisionDeliveryOrderIndex', 'Inventory\DeliveryOrderController@RevisionDeliveryOrderIndex')->name('DeliveryOrder.RevisionDeliveryOrderIndex');
    Route::get('DeliveryOrderListData', 'Inventory\DeliveryOrderController@DeliveryOrderListData')->name('DeliveryOrder.DeliveryOrderListData');
    Route::get('DeliveryOrderListDataDor', 'Inventory\DeliveryOrderController@DeliveryOrderListDataDor')->name('DeliveryOrder.DeliveryOrderListDataDor');
    Route::post('DeliveryOrderListCartRevision', 'Inventory\DeliveryOrderController@DeliveryOrderListCartRevision')->name('DeliveryOrder.DeliveryOrderListCartRevision');
    Route::get('DeliveryOrderByBudgetID', 'Inventory\DeliveryOrderController@DeliveryOrderByBudgetID')->name('DeliveryOrder.DeliveryOrderByBudgetID');
    Route::get('DeliveryOrderByDorID', 'Inventory\DeliveryOrderController@DeliveryOrderByDorID')->name('DeliveryOrder.DeliveryOrderByDorID');
    Route::get('ReportDOSummary', 'Inventory\DeliveryOrderController@ReportDOSummary')->name('Inventory.ReportDOSummary');
    Route::post('ReportDOSummaryStore', 'Inventory\DeliveryOrderController@ReportDOSummaryStore')->name('Inventory.ReportDOSummaryStore');
    Route::post('PrintExportReportDOSummary', 'Inventory\DeliveryOrderController@PrintExportReportDOSummary')->name('Inventory.PrintExportReportDOSummary');
    Route::post('StoreValidateDeliveryOrderSupplier', 'Inventory\DeliveryOrderController@StoreValidateDeliveryOrderSupplier')->name('DeliveryOrder.StoreValidateDeliveryOrderSupplier');
    Route::get('ReportDODetail', 'Inventory\DeliveryOrderController@ReportDODetail')->name('Inventory.ReportDODetail');
    Route::post('ReportDODetailStore', 'Inventory\DeliveryOrderController@ReportDODetailStore')->name('Inventory.ReportDODetailStore');
    Route::post('PrintExportReportDODetail', 'Inventory\DeliveryOrderController@PrintExportReportDODetail')->name('Inventory.PrintExportReportDODetail');
    Route::post('SearchDeliveryOrderRequest', 'Inventory\DeliveryOrderController@SearchDeliveryOrderRequest')->name('DeliveryOrder.SearchDeliveryOrderRequest');
    Route::resource('DeliveryOrder', 'Inventory\DeliveryOrderController');

    //MaterialReceive
    Route::post('StoreValidateMaterialReceive', 'Inventory\MaterialReceiveController@StoreValidateMaterialReceive')->name('MaterialReceive.StoreValidateMaterialReceive');
    Route::post('StoreValidateMaterialReceive2', 'Inventory\MaterialReceiveController@StoreValidateMaterialReceive2')->name('MaterialReceive.StoreValidateMaterialReceive2');
    Route::post('MaterialReceiveListCartRevision', 'Inventory\MaterialReceiveController@MaterialReceiveListCartRevision')->name('MaterialReceive.MaterialReceiveListCartRevision');
    Route::get('MaterialReceiveListDataPO', 'Inventory\MaterialReceiveController@MaterialReceiveListDataPO')->name('MaterialReceive.MaterialReceiveListDataPO');
    Route::get('MaterialReceiveListDataDO', 'Inventory\MaterialReceiveController@MaterialReceiveListDataDO')->name('MaterialReceive.MaterialReceiveListDataDO');
    Route::post('RevisionMaterialReceiveIndex', 'Inventory\MaterialReceiveController@RevisionMaterialReceiveIndex')->name('MaterialReceive.RevisionMaterialReceiveIndex');
    Route::get('MaterialReceiveListData', 'Inventory\MaterialReceiveController@MaterialReceiveListData')->name('MaterialReceive.MaterialReceiveListData');
    Route::post('SearchDeliveryOrder', 'Inventory\MaterialReceiveController@SearchDeliveryOrder')->name('MaterialReceive.SearchDeliveryOrder');
    Route::resource('MaterialReceive', 'Inventory\MaterialReceiveController');

    // MRET
    Route::post('StoreValidateiMaterialReturn', 'Inventory\MaterialReturnController@StoreValidateiMaterialReturn')->name('MaterialReturn.StoreValidateiMaterialReturn');
    Route::post('StoreValidateiMaterialReturn2', 'Inventory\MaterialReturnController@StoreValidateiMaterialReturn2')->name('MaterialReturn.StoreValidateiMaterialReturn2');
    Route::post('RevisionMaterialReturnIndex', 'Inventory\MaterialReturnController@RevisionMaterialReturnIndex')->name('MaterialReturn.RevisionMaterialReturnIndex');
    Route::get('MaterialReturnListData', 'Inventory\MaterialReturnController@MaterialReturnListData')->name('MaterialReturn.MaterialReturnListData');
    Route::post('MaterialReturnListCartRevision', 'Inventory\MaterialReturnController@MaterialReturnListCartRevision')->name('MaterialReturn.MaterialReturnListCartRevision');
    Route::get('MaterialReturnByDorID', 'Inventory\MaterialReturnController@MaterialReturnByDorID')->name('MaterialReturn.MaterialReturnByDorID');
    Route::get('ReportMatReturnDetail', 'Inventory\MaterialReturnController@ReportMatReturnDetail')->name('Inventory.ReportMatReturnDetail');
    Route::post('ReportMatReturnDetailStore', 'Inventory\MaterialReturnController@ReportMatReturnDetailStore')->name('Inventory.ReportMatReturnDetailStore');
    Route::post('PrintExportReportMatReturnDetail', 'Inventory\MaterialReturnController@PrintExportReportMatReturnDetail')->name('Inventory.PrintExportReportMatReturnDetail');
    Route::get('ReportMatReturnSummary', 'Inventory\MaterialReturnController@ReportMatReturnSummary')->name('Inventory.ReportMatReturnSummary');
    Route::post('ReportMatReturnSummaryStore', 'Inventory\MaterialReturnController@ReportMatReturnSummaryStore')->name('Inventory.ReportMatReturnSummaryStore');
    Route::post('PrintExportReportMatReturnSummary', 'Inventory\MaterialReturnController@PrintExportReportMatReturnSummary')->name('Inventory.PrintExportReportMatReturnSummary');
    Route::resource('MaterialReturn', 'Inventory\MaterialReturnController');

    // Workflow
    Route::post('WorkflowRoute/store', 'Admin\Workflow\WorkflowController@WorkflowRouteStore')->name('Workflow.WorkflowRouteStore');
    Route::get('WorkflowRoute', 'Admin\Workflow\WorkflowController@WorkflowRoute')->name('Workflow.WorkflowRoute');
    Route::resource('Workflow', 'Admin\Workflow\WorkflowController');

    // MAterial Receive
    Route::post('revisionMaterialReceive', 'logisticMaterialReceive@revisionMaterialReceive')->name('MR.revisionMaterialReceive');
    Route::get('createMaterialReceive', 'logisticMaterialReceive@index')->name('MR.createMaterialReceive');


    //CO

    Route::get('CO', 'controllerSalesCo@index')->name('CO.index');
    Route::get('revisionCo', 'controllerSalesCo@revisionCo')->name('CO.revisionCo');


    //SETTING
    Route::get('ColorMode', 'Setting\Mode\ColorModeController@ColorMode')->name('ColorMode');

    // Route::post('ModifyBudget', 'TestApiController@ModifyBudget')->name('ModifyBudget');
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
| Route for API : report.form.resume.humanResource...                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getReportFormResumePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getReportFormResumePersonWorkTimeSheet', 'webWithoutCSRF');



/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : report.PDF.dataList.supplyChain....                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getPDFDataListPurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getPDFDataListPurchaseOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.budgeting....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpense', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpense', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseGroup', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseGroup', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseLine', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseLine', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseLineCeiling', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseLineCeiling', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBudgetExpenseLineCeilingObjects', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBudgetExpenseLineCeilingObjects', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.customerRelation....                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.finance....                                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateAdvancePayment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateAdvancePayment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateAdvancePayment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateAdvancePayment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateAdvancePaymentDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateAdvancePaymentDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateAdvancePaymentDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateAdvancePaymentDetail', 'webWithoutCSRF');



/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.humanResource....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePersonWorkTimeSheetActivity', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateBankBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateBankBranch', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePaymentTerm', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePaymentTerm', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateProjectSectionItemWork', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateProjectSectionItemWork', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.supplyChain....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateDeliveryDestinationType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateDeliveryDestinationType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateDeliveryDestinationType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateDeliveryDestinationType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreatePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreatePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreatePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreatePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateWarehouseType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateWarehouseType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.create.taxation....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateTaxTariff', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateTaxTariff', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateTaxTariff', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateTaxTariff', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateTaxType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateTaxType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateTaxType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateTaxType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateTransactionTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateTransactionTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateTransactionTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateTransactionTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataCreateTransactionTaxDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataCreateTransactionTaxDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataCreateTransactionTaxDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataCreateTransactionTaxDetail', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBudgetType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBudgetType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBudgetType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBudgetType', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWorkerType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWorkerType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentNumbering', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentNumbering', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentNumberingFormat', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentNumberingFormat', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteBusinessDocumentType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteBusinessDocumentType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteBusinessDocumentType', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePaymentTerm', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePaymentTerm', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteProjectSectionItemWork', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteProjectSectionItemWork', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.delete.supplyChain....                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDeliveryDestinationType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDeliveryDestinationType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDeliveryDestinationType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDeliveryDestinationType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseOrderAdditionalCostType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseOrderAdditionalCostType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseOrderAdditionalCostType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseOrderAdditionalCostType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteWarehouseType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteWarehouseType', 'webWithoutCSRF');


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
| Route for API : transaction.delete.taxation....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteTaxTariff', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteTaxTariff', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteTaxTariff', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteTaxTariff', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteTaxType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteTaxType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteTaxType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteTaxType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataDeleteTransactionTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataDeleteTransactionTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataDeleteTransactionTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataDeleteTransactionTax', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.hide.supplyChain....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataHideWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataHideWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataHideWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataHideWarehouse', 'webWithoutCSRF');


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
| Route for API : transaction.initialize.humanResource....                                                                         |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeOrganizationalDepartment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeOrganizationalDepartment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeOrganizationalDepartment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeOrganizationalDepartment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeOrganizationalJobPosition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeOrganizationalJobPosition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeOrganizationalJobPosition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeOrganizationalJobPosition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeWorkerType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeWorkerType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.initialize.master....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeBankBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeBankBranch', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeInstitution', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeInstitution', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeInstitutionBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeInstitutionBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializePaymentTerm', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializePaymentTerm', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDBObject_Index', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDBObject_Index', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeDBObject_Index', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeDBObject_Index', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeDBObject_Schema', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeDBObject_Schema', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeDBObject_Table', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeDBObject_Table', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeRotateLog_FileUploadStagingArea', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeRotateLog_FileUploadStagingArea', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingArea', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingArea', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataInitializeRotateLog_FileUploadStagingAreaDetail', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.master....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 'webWithoutCSRF');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListTradeMark', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListTradeMark', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListTradeMark', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.production....                                                                         |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListBillOfMaterialDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListBillOfMaterialDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListMaterialProductAssembly', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListMaterialProductAssembly', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListMaterialProductComponent', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListMaterialProductComponent', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListMaterialProductComponent', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataList.supplyChain....                                                                        |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataListPurchaseOrderAdditionalCostType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataListPurchaseOrderAdditionalCostType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataListPurchaseOrderAdditionalCostType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataListPurchaseOrderAdditionalCostType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.humanResource....                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordOrganizationalDepartment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordOrganizationalDepartment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordOrganizationalDepartment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordOrganizationalDepartment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordOrganizationalJobPosition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordOrganizationalJobPosition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordOrganizationalJobPosition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordOrganizationalJobPosition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWorkerType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWorkerType', 'webWithoutCSRF');



/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.master....                                                                           |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordBankBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordBankBranch', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordPaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordPaymentTerm', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordPaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordPaymentTerm', 'webWithoutCSRF');
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


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.read.dataRecord.supplyChain....                                                                      |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordDeliveryOrderDetail', 'webWithoutCSRF');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataRecordWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataRecordWarehouseType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataRecordWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataRecordWarehouseType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.show.supplyChain....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataShowWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataShowWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataShowWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataShowWarehouse', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.synchronize.budgeting....                                                                            |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataSynchronizeCombinedBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataSynchronizeCombinedBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataSynchronizeCombinedBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataSynchronizeCombinedBudget', 'webWithoutCSRF');


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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePersonWorkTimeSheet', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePersonWorkTimeSheet', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePersonWorkTimeSheetActivity', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePersonWorkTimeSheetActivity', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWorker', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWorker', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWorkerCareerInternal', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWorkerCareerInternal', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWorkerType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWorkerType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWorkerType', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.master....                                                                                  |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteBankBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteBankBranch', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePaymentTerm', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePaymentTerm', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteProjectSectionItemWork', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteProjectSectionItemWork', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteProjectSectionItemWork', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.undelete.supplyChain....                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDeliveryDestinationType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDeliveryDestinationType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDeliveryDestinationType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDeliveryDestinationType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDeliveryOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDeliveryOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteDeliveryOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteDeliveryOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseOrderAdditionalCostType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseOrderAdditionalCostType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseOrderAdditionalCostType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseOrderAdditionalCostType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseRequisition', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseRequisition', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeletePurchaseRequisitionDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeletePurchaseRequisitionDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteSupplier', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteSupplier', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWarehouse', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWarehouse', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWarehouseInboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWarehouseInboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWarehouseInboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWarehouseInboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWarehouseOutboundOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWarehouseOutboundOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWarehouseOutboundOrderDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWarehouseOutboundOrderDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteWarehouseType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteWarehouseType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteWarehouseType', 'webWithoutCSRF');



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
| Route for API : transaction.undelete.taxation....                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteTaxTariff', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteTaxTariff', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteTaxTariff', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteTaxTariff', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteTaxType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteTaxType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteTaxType', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteTaxType', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUndeleteTransactionTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUndeleteTransactionTax', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUndeleteTransactionTax', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUndeleteTransactionTax', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.budgeting....                                                                                 |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBudget', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBudget', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBudget', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateSalesContract', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateSalesContract', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateSalesOrder', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateSalesOrder', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateSalesOrder', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.finance....                                                                                   |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateAdvancePayment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateAdvancePayment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateAdvancePayment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateAdvancePayment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateAdvancePaymentDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateAdvancePaymentDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateAdvancePaymentDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateAdvancePaymentDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePayment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePayment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePayment', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePayment', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePaymentDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePaymentDetail', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePaymentDetail', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePaymentDetail', 'webWithoutCSRF');


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : transaction.update.master....                                                                                    |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBank', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBank', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBankAccount', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBankAccount', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdateBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdateBankBranch', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdateBankBranch', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdateBankBranch', 'webWithoutCSRF');
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
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePaymentMethod', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePaymentMethod', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_setDataUpdatePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_setDataUpdatePaymentTerm', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_setDataUpdatePaymentTerm', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_setDataUpdatePaymentTerm', 'webWithoutCSRF');
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











\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('sendRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@SendRequest', 'webWithoutCSRF');


//---->>> GAK JELAS (HAPUS AJA KEDEPANNYA)

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| Route for API : dataPickList.master....                                                                                          |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGateway_getDataPickListBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGateway_getDataPickListBudgetOrigin', 'webWithoutCSRF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('APIGatewayJQuery_getDataPickListBudgetOrigin', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@APIGatewayJQuery_getDataPickListBudgetOrigin', 'webWithoutCSRF');



//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----


//URL::forceScheme('https');
