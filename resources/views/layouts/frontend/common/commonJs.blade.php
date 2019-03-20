<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.noconflict.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.bxslider.js')}}"></script> 
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.ddslick.js')}}"></script> 
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.meanmenu.hack.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.fancybox.pack.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.animateNumber.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery.heapbox-0.9.4.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/packery-mode.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/video.js')}}"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/jquery-ui.js')}}"></script>

<script type="text/javascript" src="{{URL('resources/assets/scripts/magiccart/magicproduct.js')}}"></script> 
<script type="text/javascript" src="{{URL('resources/assets/scripts/magiccart/magicaccordion.js')}}"></script> 
<script type="text/javascript" src="{{URL('resources/assets/scripts/magiccart/magicmenu.js')}}"></script>


<script src="{{URL('resources/assets/scripts/jquery-toastr/jquery.toast.min.js')}}" type="text/javascript"></script>
<script src="{{URL('resources/assets/scripts/jquery.toastr.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{URL('resources/assets/scripts/script.js')}}"></script>
    <!--[if lt IE 9]> 
    <script type="text/javascript" src="assets/scripts/bootstrap/html5shiv.js"></script>
    <script type="text/javascript" src="assets/scripts/bootstrap/respond.min.js"></script> <![endif]-->
    <!--[if lt IE 7]> 
    <script type="text/javascript" src="assets/scripts/lte-ie7.js"></script>
    <script type="text/javascript" src="assets/scripts/ds-sleight.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/styles/styles-ie.css" media="all" /> <![endif]-->

<script type="text/javascript">
	function removeProduct(productId) {
		var request = jQuery.ajax({
			url: '{{ route('productFront.deleteProduct') }}',
			type: 'POST',
			data: {productId:productId,_token: "{{csrf_token()}}" },
		});
		request.done(function(response){
			jQuery('#cart-sidebar').html(response);
			jQuery('tr.'+productId).remove();
			jQuery("#divTot").load(location.href + " #divTotChange");
			totalHide();
			jQuery.toast({
				heading: 'Well done!',
				showHideTransition: 'slide',
				text: 'Product removed from cart',
				position: 'bottom-left',
				loaderBg: '#da8609',
				icon: 'warning',
				hideAfter: 5000,
				stack: 3
			});
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}
	function onlyNum(e) {
        var charCode= e.keyCode;
        return (charCode != 46 && charCode > 47 && (charCode <  65 || charCode > 123));
    }
    function totalHide() {
		var trCount=document.getElementById('cartProducts').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
		console.log(trCount);
		if(trCount==0)
		{
			jQuery('#cartTotal').hide();
			jQuery('#cartProducts tr:last').after('<td colspan="4"><div class="wish-list-notice" style="font-size: 25px;color: #955251;"><i class="icon-close" style="font-size: 25px;"></i>No Product has been added to Cart. <a href="{{ url('/productList') }}">Click here</a> to continue shopping.</div></td>');
		}
	}
</script>