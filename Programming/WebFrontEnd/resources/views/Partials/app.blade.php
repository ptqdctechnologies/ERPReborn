<!--|-----------------------------------------------------------|
    |                          Extends                          |
    |-----------------------------------------------------------|-->
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>ERP Reborn</title>
            <link rel="shortcut icon" href="/AdminLTE-master/dist/img/favicon.ico">

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/jqvmap/jqvmap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.css') }}">
            <!-- DataTables -->
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

            <!-- Bootstrap4 Duallistbox -->
            <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

            

        </head>
        <body class="hold-transition sidebar-mini"> 
            <div class="wrapper">
                @yield('main')
                <aside class="control-sidebar control-sidebar-dark"></aside>
            </div>
            <script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>1
            <script src="{{ asset('AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            
            <script src="{{ asset('AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
            
            <script src="{{ asset('AdminLTE-master/plugins/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/sparklines/sparkline.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/dist/js/pages/dashboard.js') }}"></script>
            <script src="{{ asset('AdminLTE-master/dist/js/demo.js') }}"></script>

            <!-- Bootstrap4 Duallistbox -->
            <script src="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

            <!-- DataTables -->
            <script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <script>

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            $(function () {
                $("#examples").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
                $('#examplesz').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });
            });
            </script>

            <script>
                $(document).ready(function(){
                    $('.tombolProject').click(function(){
                        var code = $("#kata1").html();                        
                        var name  = $("#kata").html();                                                
                        $("#projectcode").val(code);
                        $("#projectname").val(name);
                    });
                    $('.tombolSubProject').click(function(){
                        var code1 = $("#kata2").html();                        
                        var name1  = $("#kata3").html();                                                
                        $("#subprojectc").val(code1);
                        $("#subprojectn").val(name1);
                    });
                    $('.tombolRequest').click(function(){
                        var code2 = $("#kata4").html();                                              
                        var name2  = $("#kata5").html();                                                
                        $("#requestcode").val(code2);
                        $("#requestname").val(name2);
                    });
                    $('.tombolAsfManager').click(function(){
                        var managerUid = $("#kata6").html();                                                
                        var managerName  = $("#kata7").html();                                                
                        $("#managerUid").val(managerUid);
                        $("#managerNames").val(managerName);
                    });
                    $('.tombolCurrency').click(function(){
                        var currencyCodeId = $("#kata8").html();                                                
                        var currencyNameId  = $("#kata9").html();                                                
                        $("#currencyCodeId").val(currencyCodeId);
                        $("#currencyNameId").val(currencyNameId);
                    });		
                });
            </script>              

            <script>
                $(function () {
                bsCustomFileInput.init();
                });
            </script>
            
            <script type="text/javascript">


            $(document).ready(function() {

            $(".fileInputMulti").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });

            });

            </script>
            
        </body>
    </html>
<!--|-----------------------------------------------------------|
    |                      End Extends                          |
    |-----------------------------------------------------------|-->