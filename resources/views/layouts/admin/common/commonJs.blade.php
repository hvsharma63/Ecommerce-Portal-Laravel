
<script src="{{ URL('resources/assets/js/jquery.min.js')}}"></script>
<script src="{{ URL('resources/assets/js/tether.min.js')}}"></script>

<script src="{{ URL('resources/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL('resources/assets/js/metisMenu.min.js')}}"></script>
<script src="{{ URL('resources/assets/js/waves.js')}}"></script>
<script src="{{ URL('resources/assets/js/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{ URL('resources/assets/plugins/parsleyjs/parsley.min.js')}}"></script>

<!-- Counter js  -->
<script src="{{ URL('resources/assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{ URL('resources/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

<!--C3 Chart-->
<script type="text/javascript" src="{{ URL('resources/assets/plugins/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{ URL('resources/assets/plugins/c3/c3.min.js')}}"></script>

<!--Echart Chart-->
<script src="{{ URL('resources/assets/plugins/echart/echarts-all.js')}}"></script>


<!-- Dashboard init -->
<script src="{{ URL('resources/assets/js/jquery.dashboard.js')}}"></script>

<script src="{{URL('resources/assets/plugins/switchery/switchery.min.js')}}"></script>
<!-- App js -->
<script src="{{ URL('resources/assets/js/jquery.core.js')}}"></script>
<script src="{{ URL('resources/assets/js/jquery.app.js')}}"></script>

<script src="{{ URL('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL('resources/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL('resources/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{URL('resources/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{URL('resources/assets/plugins/jquery-toastr/jquery.toast.min.js')}}" type="text/javascript"></script>
<script src="{{URL('resources/assets/js/jquery.toastr.js')}}" type="text/javascript"></script>

<script src="{{URL('resources/assets/plugins/jquery.filer/js/jquery.filer.min.js')}}"></script>
<script src="{{URL('resources/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    {{-- <script type="text/javascript" src="{{URL('resources/assets/pages/jquery.form-advanced.init.js')}}"></script> --}}
	<script src="{{URL('resources/assets/js/jquery.fileuploads.init.js')}}"></script>
<script src="{{URL('resources/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('form').parsley();
    });
	function blockChar(e) {
        var lettr= e.keyCode;
        return ((lettr>64 && lettr < 91) || (lettr > 96 && lettr < 123) || lettr==8 || (lettr>=48 && lettr <=57));
    }
    function onlyNum(e) {
        var charCode= e.keyCode;
        return (charCode != 46 && charCode > 47 && (charCode <  65 || charCode > 123));
    }
    function numDot(e) {
        var charCode= e.keyCode;
        return (charCode != 46 && charCode > 48 && (charCode <  65 || charCode > 123));
    }
</script>