@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">Budget Expense Ceiling Objects</label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table id="example1" class="table table-bordered table-striped">

                                                    <a href="{{ route('BudgetExpenseLineCeilingObjects.create') }}?BudgetExpenseLineCeilingId={{ $BudgetExpenseLineCeilingId }}" class="btn btn-outline-primary btn-rounded btn-sm my-0 style=" border-radius: 100px;"><i class="fa fa-plus"></i></a>

                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Quantity</th>
                                                            <th>Quantity Ref ID</th>
                                                            <th>Quantity Unit Name</th>
                                                            <th>Price</th>
                                                            <th>UOM</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    @if($num == '1')
                                                    <tbody>
                                                        @foreach($data as $datas)

                                                        @php $sts = ""; $id = ""; @endphp
                                                        @if($datas['productName'] == "Unspecified Product (Remaining Allocation)")
                                                            @php 
                                                                $sts = "disabled";
                                                            @endphp 
                                                        @else
                                                            @php
                                                                $id = $datas['sys_ID'];
                                                            @endphp 
                                                        @endif
                                                        <tr>
                                                            <td>{{$datas['productName']}}</td>
                                                            <td>{{$datas['quantity']}}</td>
                                                            <td>{{$datas['quantityUnit_RefID']}}</td>
                                                            <td>{{$datas['quantityUnitName']}}</td>
                                                            <td>{{$datas['productUnitPriceBaseCurrencyValue']}}</td>
                                                            <td>{{$datas['productUnitPriceCurrencyISOCode']}}</td>
                                                            <td>
                                                                <center>
                                                                    <form action="{{ route('BudgetExpenseLineCeilingObjects.destroy', $id) }}?BudgetExpenseLineCeilingId={{ $BudgetExpenseLineCeilingId }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <a href="{{ route('BudgetExpenseLineCeilingObjects.edit', $id) }}" class="btn btn-outline-primary btn-rounded btn-sm my-0 {{ $sts }}"><i class="fa fa-edit"></i></a>
                                                                        <button {{ $sts }} class="btn btn-outline-danger btn-rounded btn-sm my-0" type="submit"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    @endif
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@include('Partials.footer')
@endsection