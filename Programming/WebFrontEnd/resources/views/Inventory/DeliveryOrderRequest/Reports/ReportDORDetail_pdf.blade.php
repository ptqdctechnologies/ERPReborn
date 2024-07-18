<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <link rel="shortcut icon" href="{{ asset('AdminLTE-master/dist/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/ionicons.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/jquery.dataTables.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <!-- Loading css -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/loading.css') }}">
  <!-- Budget css -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/budget.min.css') }}">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.css') }}">

  <!-- JQUERY JS -->
  <script src="{{ asset('AdminLTE-master/dist/js/jquery-3.5.1.js') }}"></script>

  <!-- Sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <script src="{{ asset('AdminLTE-master/dist/js/sweetalert2.min.js') }}"></script>

  <!-- Toast Notification  -->

  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/toastr.min.css') }}">
  <script src="{{ asset('AdminLTE-master/dist/js/sweetalert2.min.js') }}"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Core  -->
  <script src="{{ asset('js/zht-js/core.js') }}"></script>
  <script>
    new zht_JSCore(false)
  </script>

</head>

<body>
    <div class="card-body table-responsive p-0">
        <div style="text-align: right; font-size: 14px;">July 18, 2024</div>
        <div style="text-align: center; font-size: 20px; font-weight: bold;">DO Detail Report</div>
        <div style="text-align: right; font-size: 14px;">11.58 AM</div>
        <table style=" margin: 30px 0px 15px 1px;">
            <tr>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    DOR Number
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    PR02-23000210
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Delivery From
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    QDC
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    Q000195 - Civil Work Batch 2 Pembangunan Pabrik Smelter Feronikel Kolaka
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Delivery To
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    Gudang Tigaraksa
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Sub Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    1000 - Overhead
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    PIC
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    PM
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Date
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    11/15/2023
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td></td>
            </tr>
        </table>

        <!-- DISINI -->
        <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        PR Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Product Id
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Qty
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Unit Price
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Remark
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-top: 4px;">
                        1
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataDetailReportDORDetail.title"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataDetailReportDORDetail.number"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataDetailReportDORDetail.recordID"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataDetailReportDORDetail.recordID"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataDetailReportDORDetail.businessDocumentType_RefID"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataDetailReportDORDetail.date"); ?>
                    </div>
                </td>
            </tr>
        </table>
        <!-- DISINI -->
         
        <?php Session::forget("dataDetailReportDORDetail"); ?>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('AdminLTE-master/dist/js/jquery.dataTables.min.js') }}"></script>
    <!-- Fullcalender -->
    <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>
    <!-- Adminlte JS -->
    <script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('AdminLTE-master/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Format Date -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.30.1/date_fns.min.js"></script>
</body>

</html>