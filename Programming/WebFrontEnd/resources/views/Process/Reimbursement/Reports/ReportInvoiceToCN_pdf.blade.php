@extends('Partials.app')
@section('main')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <center>
                        <div style="text-align: center; font-size: 20px; font-weight: bold;">Report Reimbursement To Crebit Note</div>
                    </center>
                    <table style="float:right;">
                        <!-- <tr>
                        <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/AdminLTE-master/dist/img/qdc.png'))) }}" width="180"></td>
                        </tr> -->
                        </tr>
                    </table>
                    <br><br>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">

                        <div class="col-12 ShowTableReportAdvanceSummary">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="TableReportAdvanceSummary" id="TableReportAdvanceSummary" style="font-size: 13px;width:100%;border: 1px solid #ced4da;border-collapse: collapse;">
                                        <thead>
                                            <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">No</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">CN Number</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Budget</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Sub Budget</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Supplier/Customer</th>
                                                <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">CN IDR</th>
                                                <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">CN Other Currency</th>
                                                <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">CN Equivalent IDR</th>
                                            </tr>
                                            <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                                            </tr>
                                        </thead>
                                        <?php $counter = 1; ?>
                                        <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                            <tr>
                                                
                                            </tr>
                                            <tbody>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $counter++; ?></td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['DocumentNumber']; ?></td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['CombinedBudgetCode'] }} - {{ $dataDetail['CombinedBudgetName'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['CombinedBudgetSectionCode'] }} - {{ $dataDetail['CombinedBudgetSectionName'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?></td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>

                                            </tbody>
                                        <?php } ?>

                                        <tfoot>
                                            <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="6">GRAND TOTAL</td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format(0, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format(0, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format(0, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format(0, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format(0, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format(0, 2, '.', ','); ?></td> 
                                            </tr>
                                        </tfoot>
                            

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
