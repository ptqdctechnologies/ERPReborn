<div id="mySearchBOQCO" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose No Trans</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">

                            <table class="table table-head-fixed text-nowrap table-striped" id="TableBOQCO">
                                <thead>
                                    <tr>
                                        <th>Action</th>`
                                        <th>Applied</th>
                                        <th>Trano</th>
                                        <th>Product Id</th>
                                        <th>Name Material</th>
                                        <th>UOM</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Currency</th>
                                        <th>Descirption</th>
                                    </tr>
                                </thead>
                                <tbody id="showContentBOQ2">
                                    
                                    @php $totalApplied1 = round((((2-1) * 1000000) / 2000000 * 100),2); @endphp
                                    <td>
                                        @if($totalApplied1 == 100)
                                        <button type="reset" class="btn btn-outline-primary btn-sm float-right klikCoDetail1" title="Submit" style="border-radius: 100px;" disabled>
                                            <i class="fas fa-file" aria-hidden="true"></i>
                                        </button>
                                        
                                        @else
                                        <button type="reset" class="btn btn-outline-success btn-sm float-right klikCoDetail1" title="Submit" style="border-radius: 100px;" data-dismiss="modal">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                            @if($totalApplied1 >= 0 && $totalApplied1 <= 40)
                                            <div class="progress-bar bg-green" style="width:{{$totalApplied1}}%;"></div>
                                            @elseif($totalApplied1 >= 41 && $totalApplied1 <= 89)
                                            <div class="progress-bar bg-yellow" style="width:{{$totalApplied1}}%;"></div>
                                            @elseif($totalApplied1 >= 90 && $totalApplied1 <= 100)
                                            <div class="progress-bar bg-red" style="width:{{$totalApplied1}}%;"></div>
                                            @endif
                                        </div>
                                        <small>
                                            <center>{{$totalApplied1}} %</center>
                                        </small>
                                    </td>
                                    <td><span class="tag tag-success" id="getTrano1">ARF-0001</span></td>
                                    <td><span class="tag tag-success" id="getProductId1">810002-0000</span></td>
                                    <td><span class="tag tag-success" id="getProductName1">Stationary dan Printing</span></td>
                                    <td><span class="tag tag-success" id="getUom1">Ls</span></td>
                                    <td><span class="tag tag-success" id="getPrice1">@currency(1000000)</span></td>
                                    <td><span class="tag tag-success" id="getQty11">2</span></td>
                                    <td><span class="tag tag-success" id="getTotalArfDetail1">@currency(2000000)</span></td>
                                    <td><span class="tag tag-success" id="getCurrency1">IDR</span></td>
                                    <td><span class="tag tag-success" id="getRequester1">Description 1</span></td>
                                    </tr>
                                    <tr>
                                        @php $totalApplied2 = round((((4-2) * 20000000) / 80000000 * 100),2); @endphp
                                        <td>
                                            @if($totalApplied2 == 100)
                                            <button type="reset" class="btn btn-outline-primary btn-sm float-right klikCoDetail2" title="Submit" style="border-radius: 100px;" disabled>
                                                <i class="fas fa-file" aria-hidden="true"></i>
                                            </button>
                                            
                                            @else
                                            <button type="reset" class="btn btn-outline-success btn-sm float-right klikCoDetail2" title="Submit" style="border-radius: 100px;" data-dismiss="modal">
                                                <i class="fas fa-plus" aria-hidden="true"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                                @if($totalApplied2 >= 0 && $totalApplied2 <= 40)
                                                <div class="progress-bar bg-green" style="width:{{$totalApplied2}}%;"></div>
                                                @elseif($totalApplied2 >= 41 && $totalApplied2 <= 89)
                                                <div class="progress-bar bg-yellow" style="width:{{$totalApplied2}}%;"></div>
                                                @elseif($totalApplied2 >= 90 && $totalApplied2 <= 100)
                                                <div class="progress-bar bg-red" style="width:{{$totalApplied2}}%;"></div>
                                                @endif
                                            </div>
                                            <small>
                                                <center>{{$totalApplied2}} %</center>
                                            </small>
                                        </td>
                                        <td><span class="tag tag-success" id="getTrano2">ARF-0002</span></td>
                                        <td><span class="tag tag-success" id="getProductId2">820001-0000</span></td>
                                        <td><span class="tag tag-success" id="getProductName2">Salaries</span></td>
                                        <td><span class="tag tag-success" id="getUom2">Ls</span></td>
                                        <td><span class="tag tag-success" id="getPrice2">@currency(20000000)</span></td>
                                        <td><span class="tag tag-success" id="getQty22">4</span></td>
                                        <td><span class="tag tag-success" id="getTotalArfDetail2">@currency(80000000)</span></td>
                                        <td><span class="tag tag-success" id="getCurrency2">IDR</span></td>
                                        <td><span class="tag tag-success" id="getRequester2">Description 2</span></td>
                                    </tr>
                                    <tr>
                                        @php 
                                            $totalApplied3 = round((((6-2) * 10000000) / 60000000 * 100),2);
                                        @endphp
                                        <td>
                                            @if($totalApplied3 == 100)
                                            <button type="reset" class="btn btn-outline-primary btn-sm float-right klikCoDetail3" title="Submit" style="border-radius: 100px;" disabled>
                                                <i class="fas fa-file" aria-hidden="true"></i>
                                            </button>
                                            
                                            @else
                                            <button type="reset" class="btn btn-outline-success btn-sm float-right klikCoDetail3" title="Submit" style="border-radius: 100px;" data-dismiss="modal">
                                                <i class="fas fa-plus" aria-hidden="true"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                                @if($totalApplied3 >= 0 && $totalApplied3 <= 40)
                                                <div class="progress-bar bg-green" style="width:{{$totalApplied3}}%;"></div>
                                                @elseif($totalApplied3 >= 41 && $totalApplied3 <= 89)
                                                <div class="progress-bar bg-yellow" style="width:{{$totalApplied3}}%;"></div>
                                                @elseif($totalApplied3 >= 90 && $totalApplied3 <= 100)
                                                <div class="progress-bar bg-red" style="width:{{$totalApplied3}}%;"></div>
                                                @endif
                                            </div>
                                            <small>
                                                <center>{{$totalApplied3}} %</center>
                                            </small>
                                        </td>
                                        <td><span class="tag tag-success" id="getTrano3">ARF-0003</span></td>
                                        <td><span class="tag tag-success" id="getProductId3">820002-0000</span></td>
                                        <td><span class="tag tag-success" id="getProductName3">Site Office Rent/Warehouse</span></td>
                                        <td><span class="tag tag-success" id="getUom3">Ls</span></td>
                                        <td><span class="tag tag-success" id="getPrice3">@currency(10000000)</span></td>
                                        <td><span class="tag tag-success" id="getQty33">6</span></td>
                                        <td><span class="tag tag-success" id="getTotalArfDetail3">@currency(60000000)</span></td>
                                        <td><span class="tag tag-success" id="getCurrency3">IDR</span></td>
                                        <td><span class="tag tag-success" id="getRequester3">Description 3</span></td>
                                    </tr>
                                    <tr>
                                        @php $totalApplied4 = round((((8-4) * 2000000) / 16000000 * 100),2); @endphp
                                        <td>
                                            @if($totalApplied4 == 100)
                                            <button type="reset" class="btn btn-outline-primary btn-sm float-right klikCoDetail4" title="Submit" style="border-radius: 100px;" disabled>
                                                <i class="fas fa-file" aria-hidden="true"></i>
                                            </button>
                                            
                                            @else
                                            <button type="reset" class="btn btn-outline-success btn-sm float-right klikCoDetail4" title="Submit" style="border-radius: 100px;" data-dismiss="modal">
                                                <i class="fas fa-plus" aria-hidden="true"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                                @if($totalApplied4 >= 0 && $totalApplied4 <= 40)
                                                <div class="progress-bar bg-green" style="width:{{$totalApplied4}}%;"></div>
                                                @elseif($totalApplied4 >= 41 && $totalApplied4 <= 89)
                                                <div class="progress-bar bg-yellow" style="width:{{$totalApplied4}}%;"></div>
                                                @elseif($totalApplied4 >= 90 && $totalApplied4 <= 100)
                                                <div class="progress-bar bg-red" style="width:{{$totalApplied4}}%;"></div>
                                                @endif
                                            </div>
                                            <small>
                                                <center>{{$totalApplied4}} %</center>
                                            </small>
                                        </td>
                                        <td><span class="tag tag-success" id="getTrano4">ARF-0004</span></td>
                                        <td><span class="tag tag-success" id="getProductId4">820009-0000</span></td>
                                        <td><span class="tag tag-success" id="getProductName4">Entertainment</span></td>
                                        <td><span class="tag tag-success" id="getUom4">Ls</span></td>
                                        <td><span class="tag tag-success" id="getPrice4">@currency(2000000)</span></td>
                                        <td><span class="tag tag-success" id="getQty44">8</span></td>
                                        <td><span class="tag tag-success" id="getTotalArfDetail4">@currency(16000000)</span></td>
                                        <td><span class="tag tag-success" id="getCurrency4">IDR</span></td>
                                        <td><span class="tag tag-success" id="getRequester4">Description 4</span></td>
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
</div>

<script>
    $(document).ready(function() {

        $('.klikCoDetail1').click(function() {
            
            var get1 = $("#getTrano1").html();
            $("#type").val(get1);
        });
        $('.klikCoDetail2').click(function() {

            var get2 = $("#getTrano2").html();
            $("#type").val(get2);

        });
        $('.klikCoDetail3').click(function() {

            var get3 = $("#getTrano3").html();
            $("#type").val(get3);
        });
        $('.klikCoDetail4').click(function() {

            var get4 = $("#getTrano4").html();
            $("#type").val(get4);

        });
    });
</script>