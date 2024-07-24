@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">DOR Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            <div class="card">
                            <form method="post" action="{{ route('Inventory.ReportDORequestDetailStore') }}" id="FormSubmitReportDORDetail">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 10px;"><label>DOR Number&nbsp;</label></th>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="project_id" name="project_id" value="" hidden>
                                                                <input id="site_id" name="site_id" value="" hidden>
                                                                <input id="advance_RefID" name="advance_RefID" hidden>
                                                                <input id="advance_number" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision form-control" name="advance_number" value="" readonly>
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                    <a href="#" id="advance_popup" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                            <!-- <div class="input-group">
                                                                <input id="budget_id" style="border-radius:0;" class="form-control" name="budget_id"> 
                                                                <input id="budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProject">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </div> -->
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-default btn-sm" type="submit">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                                                            </button>
                                                            &nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </form>

                                                    <form method="post" action="{{ route('Inventory.PrintExportReportDORequestDetail') }}" id="FormPrintReportDORDetail">
                                                        @csrf
                                                        <td>
                                                            <select name="print_type" id="print_type" class="form-control">
                                                                <option value="PDF">Export PDF</option>
                                                                <option value="Excel">Export Excel</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-default btn-sm" type="submit">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
                                                            </button>
                                                        </td>
                                                    </form>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CONTENT DETAIL DOR -->
                        <?php if ($dataReport) : ?>
                            <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>DOR Number&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['number']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['recordID']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Sub Budget&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['businessDocumentType_RefID']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Date&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['date']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Delivery From&nbsp;</label></th>
                                                            <td>
                                                                QDC
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Delivery To&nbsp;</label></th>
                                                            <td>
                                                                Gudang Tigaraksa
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>PIC&nbsp;</label></th>
                                                            <td>
                                                                PM
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DETAIL -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PR Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Id</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit of Measure</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $dataDetail['no']; ?></td>
                                                        <td style="text-align: center;"><?= $dataDetail['prNumber']; ?></td>
                                                        <td style="text-align: center;"><?= $dataDetail['productId']; ?></td>
                                                        <td style="text-align: center;"><?= $dataDetail['qty']; ?></td>
                                                        <td style="text-align: center;"><?= $dataDetail['uom'] ?></td>
                                                        <td style="text-align: center;"><?= $dataDetail['remark'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif; Session::forget("isButtonReportDORDetailSubmit"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@endsection