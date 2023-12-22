@extends('Partials.app')
@section('main')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h3><span style="text-transform:uppercase;font-weight:bold;">Revision History for PO : PO01-22000122</span></h3>
                                </center>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body table-responsive p-0 AdvanceListCart" style="height:350px;">
                                <table class="table table-head-fixed text-nowrap table-bordered table-sm TableShowRevisionHistory" id="TableShowRevisionHistory" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Product ID</th>
                                            <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                                            <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                                            <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                                            <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Unit Price</th>
                                            <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Total</th>
                                            @if(count($data) > 1)
                                                @for($i = 1; $i < count($data); $i++) 
                                                    <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Rev {{ $i }} - Aldi Mulyadi (30-12-2023 14:38)</th>
                                                @endfor
                                            @endif
                                        </tr>
                                        @if(count($data) > 1)
                                        <tr>
                                            @for($i = 1; $i < count($data); $i++) 
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Qty</th>
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Price</th>
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Total</th>
                                            @endfor
                                        </tr>
                                        @endif
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $data[0]['content']['product_RefID'] }}</td>
                                            <td>{{ $data[0]['content']['product_RefID'] }}</td>
                                            <td>{{ $data[0]['content']['quantity'] }}</td>
                                            <td>{{ $data[0]['content']['sys_PID'] }}</td>
                                            <td>{{ $data[0]['content']['productUnitPriceCurrencyValue'] }}</td>
                                            <td>{{ $data[0]['content']['priceCurrencyValue'] }}</td>
                                            @if(count($data) > 1)
                                                @for($i = 1; $i < count($data); $i++) 
                                                    <td>{{ $data[count($data) - 1]['content']['quantity'] }}</td>
                                                    <td>{{ $data[count($data) - 1]['content']['productUnitPriceCurrencyValue'] }}</td>
                                                    <td>{{ $data[count($data) - 1]['content']['priceCurrencyValue'] }}</td>
                                                @endfor
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection