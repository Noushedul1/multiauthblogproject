 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('admin') }}/vendor/jquery/jquery.min.js"></script>
 <script src="{{ asset('admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Core plugin JavaScript-->
 <script src="{{ asset('admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('admin') }}/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('admin') }}/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('admin') }}/js/demo/chart-area-demo.js"></script>
 <script src="{{ asset('admin') }}/js/demo/chart-pie-demo.js"></script>
 {{-- start of toastr  --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 {{-- start of fontawesome  --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 {{-- start of toastr  --}}
 <script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type','success') }}";
    switch(type) {
        case 'warning':
            toastr.options = {
                'progressBar': true,
                'closeBar': true
            }
            toastr.success("{{ Session::get('message') }}",'Warning',{timeOut: 1200});
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}",'Success',{timeOut: 1200});
            break;

        case 'error':
            toastr.success("{{ Session::get('message') }}",'Error',{timeOut: 1200});
            break;
    }
    @endif
 </script>
 {{-- end of toastr  --}}
@stack('dashboard_script')
