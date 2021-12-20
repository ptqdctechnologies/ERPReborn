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

                                                    <a href="{{ route('BudgetExpenseLineCeilingObjects.create') }}" class="btn btn-outline-primary btn-rounded btn-sm my-0 style=" border-radius: 100px;"><i class="fa fa-plus"></i></a>

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
                                                    <tbody>
                                                        @foreach($data as $datas)
                                                        <tr>
                                                            <td>{{$datas['productName']}}</td>
                                                            <td>{{$datas['quantity']}}</td>
                                                            <td>{{$datas['quantityUnit_RefID']}}</td>
                                                            <td>{{$datas['quantityUnitName']}}</td>
                                                            <td>{{$datas['productUnitPriceBaseCurrencyValue']}}</td>
                                                            <td>{{$datas['productUnitPriceCurrencyISOCode']}}</td>
                                                            <td>
                                                                <center>
                                                                    <form action="{{ route('BudgetExpenseLineCeilingObjects.destroy', $datas['sys_Branch_RefID']) }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <a href="{{ route('BudgetExpenseLineCeilingObjects.edit', $datas['sys_Branch_RefID']) }}" class="btn btn-outline-primary btn-rounded btn-sm my-0 style=" border-radius: 100px;"><i class="fa fa-edit"></i></a>
                                                                        <button class="btn btn-outline-danger btn-rounded btn-sm my-0 style=" border-radius: 100px;" type="submit"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
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