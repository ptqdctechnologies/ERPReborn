<div class="card-body table-responsive p-0" style="height: 250px;">
    <table class="table table-head-fixed text-nowrap table-striped" id="arfTableDisableEnable">
        <thead>
            <tr>
                <th></th>
                <th>No Trans</th>
                <th>Work Id</th>
                <th>Work Name</th>
                <th>Product Id</th>
                <th>Material Name</th>
                <th>Unit</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Total Price</th>
                <th>Currency</th>
                <th>Description</th>
                <th>Available</th>
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
            <tr>
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
                <td><span class="tag tag-success" id="getCurrency1">ARF-01</span></td>
                <td><span class="tag tag-success" id="getWorkId1">6001</span></td>
                <td><span class="tag tag-success" id="getWorkName1">Project Overhead Actual</span></td>
                <td><span class="tag tag-success" id="getProductId1">810002-0000</span></td>
                <td><span class="tag tag-success" id="getProductName1">Stationary dan Printing</span></td>
                <td><span class="tag tag-success" id="getQty1">10</span></td>
                <td><span class="tag tag-success" id="getUom1">Ls</span></td>
                <td><span class="tag tag-success" id="getPrice1">1000000</span></td>
                <td><span class="tag tag-success" id="totalArf1">10000000</span></td>
                <td><span class="tag tag-success" id="getCurrency1">IDR</span></td>
                <td><span class="tag tag-success" id="getCurrency1">Ini adalah deskripsi</span></td>
                <td>
                    @if($y1 > 0 && $y1 <= 50)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-green" style="width: {{$y1}}%;"></div>
                        </div>
                    @elseif($y1 > 50 && $y1 <= 90)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-yellow" style="width: {{$y1}}%;"></div>
                        </div>
                    @elseif($y1 > 90 && $y1 <= 100)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
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
                <td><span class="tag tag-success" id="getRequester1" style="display:none;">2000000</span></td>
            </tr>
        </tbody>
    </table>
</div>