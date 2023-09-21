<script>
    var msg = "{{Session::get('NotFound')}}";
    var exist = "{{Session::has('NotFound')}}";
    if(exist){
		toastr.options =
		{
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "3000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
  		toastr.error("{{ session('NotFound') }}");
    }
</script>

<!-- toastr.success("{{ session('message') }}");
toastr.error("{{ session('error') }}");
toastr.warning("{{ session('warning') }}");
toastr.info("{{ session('info') }}"); -->
