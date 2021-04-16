<div class="card-body table-responsive p-0" style="height: 250px;">
    <table class="table table-head-fixed text-nowrap table-striped" id="arfTableDisableEnable">
        <thead>
            <tr>
                <th>Action</th>
                <th>Applied</th>
                <th>Work Id</th>
                <th>Work Name</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Qty Available</th>
                <th>Qty Budget</th>
                <th>Uom</th>
                <th>Price</th>
                <th>Total</th>
                <th>Currency</th>
            </tr>
        </thead>
        <tbody>
            @php
            $y1= number_format(((10000000/10000000) * 100),2);
            $y2= number_format(((300000000/600000000) * 100),2);
            $y3= number_format(((400000000/600000000) * 100),2);
            $y4= number_format(((50000000/100000000) * 100),2);
            $i=1;
            @endphp

            <td>
                @if($y1 == 100)
                <button type="reset" class="btn btn-outline-primary btn-sm float-right klikDetail1" title="Submit" style="border-radius: 100px;" disabled>
                    <i class="fas fa-file" aria-hidden="true"></i>
                </button>
                @else
                <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail1" title="Submit" style="border-radius: 100px;">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                </button>
                @endif
            </td>
            <td>
                @if($y1 > 0 && $y1 <= 50) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                    <div class="progress-bar bg-green" style="width: {{$y1}}%;"></div>
</div>
@elseif($y1 > 50 && $y1 <= 90) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
    <div class="progress-bar bg-yellow" style="width: {{$y1}}%;"></div>
    </div>
    @elseif($y1 > 90 && $y1 <= 100) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
        <div class="progress-bar bg-pink" style="width: {{$y1}}%;"></div>
        </div>
        @else
        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
            <div class="progress-bar bg-grey" style="width: {{$y1}}%;"></div>
        </div>
        @endif
        <small>
            <center>{{ $y1 }} %</center>
        </small>
        </td>
        <td><span class="tag tag-success" id="getWorkId1">6001</span></td>
        <td><span class="tag tag-success" id="getWorkName1">Project Overhead Actual</span></td>
        <td><span class="tag tag-success" id="getProductId1">810002-0000</span></td>
        <td><span class="tag tag-success" id="getProductName1">Stationary dan Printing</span></td>
        <td><span class="tag tag-success" id="getQty11">10</span></td>
        <td><span class="tag tag-success" id="getQty1">4</span></td>
        <td><span class="tag tag-success" id="getUom1">Ls</span></td>
        <td><span class="tag tag-success" id="getPrice1">1000000</span></td>
        <td><span class="tag tag-success" id="totalArf1">10000000</span></td>
        <td><span class="tag tag-success" id="getCurrency1">IDR</span></td>
        <td><span class="tag tag-success" id="getRequester1" style="display:none;">2000000</span></td>
        </tr>
        <tr>
            <td>
                @if($y2 == 100)
                <button type="reset" class="btn btn-outline-primary btn-sm float-right klikDetail2" title="Submit" style="border-radius: 100px;" disabled>
                    <i class="fas fa-file" aria-hidden="true"></i>
                </button>
                @else
                <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail2" title="Submit" style="border-radius: 100px;">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                </button>
                @endif
            </td>
            <td>

                @if($y2 > 0 && $y2 <= 50) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                    <div class="progress-bar bg-green" style="width: {{$y2}}%;"></div>
                    </div>
                    @elseif($y2 > 50 && $y2 <= 90) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                        <div class="progress-bar bg-yellow" style="width: {{$y2}}%;"></div>
                        </div>
                        @elseif($y2 > 90 && $y2 <= 100) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-pink" style="width: {{$y2}}%;"></div>
                            </div>
                            @else
                            <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                <div class="progress-bar bg-grey" style="width: {{$y2}}%;"></div>
                            </div>
                            @endif
                            <small>
                                <center>{{ $y2 }} %</center>
                            </small>
            </td>
            <td><span class="tag tag-success" id="getWorkId2">6002</span></td>
            <td><span class="tag tag-success" id="getWorkName2">Project Overhead Actual</span></td>
            <td><span class="tag tag-success" id="getProductId2">820001-0000</span></td>
            <td><span class="tag tag-success" id="getProductName2">Salaries</span></td>
            <td><span class="tag tag-success" id="getQty22">9</span></td>
            <td><span class="tag tag-success" id="getQty2">2</span></td>
            <td><span class="tag tag-success" id="getUom2">Ls</span></td>
            <td><span class="tag tag-success" id="getPrice2">300000000</span></td>
            <td><span class="tag tag-success" id="totalArf2">600000000</span></td>
            <td><span class="tag tag-success" id="getCurrency2">IDR</span></td>
            <td><span class="tag tag-success" id="getRequester2" style="display:none;">300000000</span></td>
        </tr>
        <tr>
            <td>
                @if($y3 == 100)
                <button type="reset" class="btn btn-outline-primary btn-sm float-right klikDetail3" title="Submit" style="border-radius: 100px;" disabled>
                    <i class="fas fa-file" aria-hidden="true"></i>
                </button>
                @else
                <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail3" title="Submit" style="border-radius: 100px;">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                </button>
                @endif
            </td>
            <td>

                @if($y3 > 0 && $y3 <= 50) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                    <div class="progress-bar bg-green" style="width: {{$y3}}%;"></div>
                    </div>
                    @elseif($y3 > 50 && $y3 <= 90) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                        <div class="progress-bar bg-yellow" style="width: {{$y3}}%;"></div>
                        </div>
                        @elseif($y3 > 90 && $y3 <= 100) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-pink" style="width: {{$y3}}%;"></div>
                            </div>
                            @else
                            <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                <div class="progress-bar bg-grey" style="width: {{$y3}}%;"></div>
                            </div>
                            @endif
                            <small>
                                <center>{{ $y3 }} %</center>
                            </small>
            </td>
            <td><span class="tag tag-success" id="getWorkId3">6003</span></td>
            <td><span class="tag tag-success" id="getWorkName3">Project Overhead Actual</span></td>
            <td><span class="tag tag-success" id="getProductId3">820002-0000</span></td>
            <td><span class="tag tag-success" id="getProductName3">Site Office Rent/Warehouse</span></td>
            <td><span class="tag tag-success" id="getQty33">8</span></td>
            <td><span class="tag tag-success" id="getQty3">3</span></td>
            <td><span class="tag tag-success" id="getUom3">Ls</span></td>
            <td><span class="tag tag-success" id="getPrice3">20000000</span></td>
            <td><span class="tag tag-success" id="totalArf3">600000000</span></td>
            <td><span class="tag tag-success" id="getCurrency3">IDR</span></td>
            <td><span class="tag tag-success" id="getRequester3" style="display:none;">40000000</span></td>
        </tr>
        <tr>
            <td>
                @if($y4 == 100)
                <button type="reset" class="btn btn-outline-primary btn-sm float-right klikDetail4" title="Submit" style="border-radius: 100px;" disabled>
                    <i class="fas fa-file" aria-hidden="true"></i>
                </button>
                @else
                <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail4" title="Submit" style="border-radius: 100px;">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                </button>
                @endif
            </td>
            <td>
                @if($y4 > 0 && $y4 <= 50) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                    <div class="progress-bar bg-green" style="width: {{$y4}}%;"></div>
                    </div>
                    @elseif($y4 > 50 && $y4 <= 90) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                        <div class="progress-bar bg-yellow" style="width: {{$y4}}%;"></div>
                        </div>
                        @elseif($y4 > 90 && $y4 <= 100) <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-pink" style="width: {{$y4}}%;"></div>
                            </div>
                            @else
                            <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                                <div class="progress-bar bg-grey" style="width: {{$y4}}%;"></div>
                            </div>
                            @endif
                            <small>
                                <center>{{ $y4 }} %</center>
                            </small>
            </td>
            <td><span class="tag tag-success" id="getWorkId4">6004</span></td>
            <td><span class="tag tag-success" id="getWorkName4">Project Overhead Actual</span></td>
            <td><span class="tag tag-success" id="getProductId4">820009-0000</span></td>
            <td><span class="tag tag-success" id="getProductName4">Entertainment</span></td>
            <td><span class="tag tag-success" id="getQty44">7</span></td>
            <td><span class="tag tag-success" id="getQty4">3</span></td>
            <td><span class="tag tag-success" id="getUom4">Ls</span></td>
            <td><span class="tag tag-success" id="getPrice4">25000000</span></td>
            <td><span class="tag tag-success" id="totalArf4">100000000</span></td>
            <td><span class="tag tag-success" id="getCurrency4">IDR</span></td>
            <td><span class="tag tag-success" id="getRequester4" style="display:none;">50000000</span></td>
        </tr>
        </tbody>
        </table>
        </div>