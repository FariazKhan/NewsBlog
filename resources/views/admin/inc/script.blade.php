<!-- Jquery Core Js -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}


    {{-- Ajax --}}
    <!-- Bootstrap Core Js -->
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

    {{-- Bootstrap Color Picker Js --}}
    <script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

    {{-- Modal JS --}}
    <script src="{{asset('admin/js/pages/ui/modals.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    {{-- <!-- Morris Plugin Js -->
    <script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('admin/plugins/chartjs/Chart.bundle.js')}}"></script> --}}

    {{-- <!-- Flot Charts Plugin Js -->
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.time.js')}}"></script> --}}

    <!-- Sparkline Chart Plugin Js -->
    {{-- <script src="{{asset('admin/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script> --}}

    <!-- Custom Js -->
    <script src="{{asset('admin/js/admin.js')}}"></script>
    {{-- <script src="{{asset('admin/js/pages/index.js')}}"></script> --}}

    <!-- Demo Js -->
    <script src="{{asset('admin/js/demo.js')}}"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('admin/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    {{-- CkEditor CDN --}}
    <script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

    <script>
        $(document).ready(function(){
            // DataTable initialization
            $('table').DataTable();

            // Select JS inititalization
            $('select').select();

            // ColorPicker initialization
            $('.colorpicker').colorpicker();
        });
    </script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    {{-- ToastR --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        toastr.options = 
        {
            "positionClass": "toast-bottom-center"
        }
    </script>

