@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!--|-------------------------------------------------------------------------|
                |                         Create Advance Request                          |
                |-------------------------------------------------------------------------|-->
                    <form action="">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label class="card-title">Project Dashboard</label>
                                            <br>
                                            <hr><br>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-body table-responsive p-0" style="height: 400px;">
                                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">188882838</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder">1</i></a></td>
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
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection