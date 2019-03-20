@extends('layouts.frontend.app')
@section('title')
<title>Profile</title>
@endsection
@section('content')
    <div class="main-container col1-layout content-color color">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"> <a href="/kart/abani" title="Go to Home Page">Home</a></li>
                    <li> <strong>Profile</strong></li>
                </ul>
            </div>
        </div><!--- .breadcrumbs-->
        <div class="content-top text-center no-border">
            <h2>Hello, {{ Auth::user()->firstName }}</h2>
        </div>
        <div class="container">
            <div class="col-md-4">
                <div class="block widget_categories">
                    <div class="block-title"><strong><span>OPTIONS</span></strong></div>
                    <ul class="optionUl">
                        <li><a href="#" class="profileOption">Profile</a></li>
                        <li><a href="#" class="profileOption">Manage Billing Address</a></li>
                        <li><a href="#" class="profileOption">Manage Shipping Address</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8" id="profileDiv" style="display: none;">
                <div class="info-portfolio-box">
                    <h2>Personal Information</h2>
                    <div class="row-content">
                        <div class="left pull-left"><i class="fa fa-user"></i>Name</div>
                        <div class="right pull-right"><p>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p></div>
                    </div>
                    <div class="row-content">
                        <div class="left pull-left"><i class="fa fa-google"></i> Email Address:</div>
                        <div class="right pull-right"><p>{{ Auth::user()->email }}</p></div>
                    </div>
                    <div class="row-content">
                        <div class="left pull-left"><i class="fa fa-phone"></i> Mobile No:</div>
                        <div class="right pull-right"><p>{{ Auth::user()->mobileNo }}</p></div>
                    </div>
                </div><!--- .info-portfolio-box-->
            </div>
            <div class="col-md-8" id="billingDiv">
                <ul class="step-list-info">
                    @foreach($billingData as $billing)
                    <li class="answer">
                        <div class="title-step">Billing Address<a href="#formView"  onclick="changeAdd({{$billing->id}})">CHANGE</a></div>
                        <p><strong>{{$billing->firstName}}  {{$billing->lastName}}</strong><br>
                            {{$billing->address}}<br>
                            {{$billing->city}} - {{$billing->postcode}}<br>
                            {{$billing->state}}<br>
                            {{$billing->mobileNo}}<br>
                        </p>
                    </li>
                    @endforeach
                    <li>
                        <button name="billingId" class="btn-step addNew">New Address</button>
                        <!-- <input type="radio" name="billingId" value="newAddress" id="r1" required><label for="r1" required>New Address</label> -->
                    </li>
                </ul>
            </div>
            <form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout" action="{{URL('/billingAdd')}}" enctype="multipart/form-data" id="addForm" 
            >
            {{@csrf_field()}}
            <div style="clear: both;"></div>
            <div class="row" id="addressForm">
                <div class="col-md-12">
                    <div class="checkout-info-text" id="formView">
                        <h3>Address</h3>
                    </div>

                    <div class="woocommerce-billing-fields">
                        <ul class="row">
                            <li class="col-md-6">
                                <p class="form-row validate-required" id="billing_first_name_field">
                                    <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="firstName" id="firstName" placeholder="">
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row validate-required" id="billing_last_name_field">
                                    <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="lastName" id="lastName" placeholder="">
                                </p>
                            </li>
                            <li class="col-md-12  col-left-12">
                                <p class="form-row  validate-required validate-email" id="billing_email_field">
                                    <label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="email" id="email" placeholder="" value="">
                                </p>
                            </li>
                            <li class="col-md-12  col-left-12">
                                <p class="form-row  validate-required validate-email" id="billing_email_field">
                                    <label for="billing_email" class="">Address <abbr class="required" title="required">*</abbr></label>
                                    <textarea  name="address" id="address" placeholder="" rows="3" style="width: 100%;border: 1px solid #dddee0;"></textarea>
                                    @if ($errors->has('address'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </li>

                            <li class="col-md-6">
                                <p class="form-row address-field validate-zipCode woocommerce-validated" id="billing_zipCode_field">
                                    <label for="billing_zipCode" class="">Zip code <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="zipCode" id="zipCode" onkeyup="zipCodeData(this.value)">
                                    @if ($errors->has('zipCode'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('zipCode') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row validate-required validate-phone woocommerce-validated" id="billing_phone_field">
                                    <label for="billing_phone" class="">Phone number <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="mobileNo" id="mobileNo" placeholder="" value="">
                                    @if ($errors->has('mobileNo'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('mobileNo') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
                                    <label for="billing_city" class="">City <abbr class="required" title="required">*</abbr></label>
                                    <select class="form-control" name="city" id="city">
                                        <option selected>Enter zipcode to get city</option>
                                    </select>
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row address-field validate-state" id="billing_state_field">
                                    <label for="billing_state" class="">State/Province</label>
                                    <select class="form-control" name="state" id="state">
                                        <option selected>Enter zipcode to get state</option>
                                    </select>
                                </p>
                            </li>
                        </ul>
                    </div><!--- .woocommerce-billing-fields---> 

                    <div class="checkout-col-footer">
                        <input type="submit" value="Continue" class="btn-step">
                        <div class="note">(<span>*</span>) Required fields</div>
                    </div><!--- .checkout-col-footer--->    
                </div>
            </div>
        </form>
        </div><!--- .container-->
        
    </div><!--- .main-container -->

@endsection

@section('script')
<script type="text/javascript">
    selectCity = document.getElementById( 'city' );
    selectState = document.getElementById( 'state' );
    $('body').find('#addressForm').hide();
    $(document).on('click', '.addNew', function() {
        $("#city option").remove();
        $("#state option").remove();
        option = document.createElement( 'option' );
        option.text="Enter zipcode to get city"
        selectCity.add( option ); 
        option = document.createElement( 'option' );
        option.text="Enter zipcode to get state"
        selectState.add( option ); 
        $('#addressForm').show();
    });
    $(document).on('click', '.profileOption', function() {
        $( '.active' ).removeClass( 'active' );
        $(this).addClass("active");

    });
    function zipCodeData(zipcode,city='')
    {
       // Username for postal code ============  breach , marc , code   ============== 
       $.getJSON("http://api.geonames.org/postalCodeLookupJSON?postalcode="+zipcode+"&country=IN&username=breach",  
        function(data) {
            var dataArray = data.postalcodes;
            $("#city option").remove();
            $("#state option").remove();
            $(".heapOptions li").remove();
            option = document.createElement( 'option' );
            option.text="Choose any one"
            selectCity.add( option ); 
            for (i = 0; i < dataArray.length; i++) { 
                option = document.createElement( 'option' );
                var cityName=dataArray[i]['placeName']+','+ dataArray[i]['adminName2'];
                if (city!='')
                {
                    if (city==cityName)
                    {
                        bSelected=true;
                        option.selected = bSelected;
                    }
                }
                option.value = option.text = cityName;  
                selectCity.add( option );
            }
            option = document.createElement( 'option' );
            option.value = option.text = dataArray[0]['adminName1'];    
            selectState.add( option );
        });
   }
</script>
@endsection
