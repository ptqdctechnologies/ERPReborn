<script>
	var msg = "{{Session::get('NotFound')}}";
	var exist = "{{Session::has('NotFound')}}";
	if (exist) {
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-middle-center",
			"preventDuplicates": false,
			"onclick": null,
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		toastr.error("{{ session('NotFound') }}", {timeOut: 3000});
	}
</script>

<!-- toastr.success("{{ session('message') }}");
toastr.error("{{ session('error') }}");
toastr.warning("{{ session('warning') }}");
toastr.info("{{ session('info') }}"); -->