<div class="header-container header-color color">
    <div class="header_full">
        <div class="header">
            <div class="header-logo show-992">
                <a href="index.html" class="logo"><img class="img-responsive" src="{{URL('resources/assets/front_images/template1/logo.png')}}" /></a>
            </div><!--- .header-logo -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="header-config-bg">
                            <div class="header-wrapper-bottom">
                                <div class="custom-menu col-lg-12">
                                    <div class="header-logo hidden-992">
                                        <a href="index.html" class="logo"><img class="img-responsive" src="{{URL('resources/assets/front_images/template1/logo.png')}}" /></a>
                                    </div><!--- .header-logo -->
                                    <div class="magicmenu clearfix">
                                        <ul class="nav-desktop sticker">
                                            <li class="level0 logo display"><a class="level-top" href="index.html"><img alt="logo" src="{{URL('resources/assets/front_images/template1/logo.png')}}"></a></li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{url('/index')}}"><span class="icon-home fa fa-home"></span><span class="icon-text">Home</span></a>
                                            </li>
                                            <li class='level0 cat  noChild' >
                                                <a class="level-top" href="{{url('/productList')}}">
                                                    <span>Laptop </span>
                                                    <span class="boder-menu"></span>
                                                </a>
                                            </li>
                                            <li class='level0 cat  noChild'>
                                                <a class="level-top" href="{{url('/aboutUs')}}">
                                                    <span>About</span>
                                                    <span class="boder-menu"></span>
                                                </a>
                                            </li>
                                            <li class='level0 cat  noChild'>
                                                <a class="level-top" href="{{url('/contact')}}">
                                                    <span>Contact Us </span>
                                                    <span class="boder-menu"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-page clearfix">
                <div class="miniCartWrap">
                    <div class="mini-maincart">
                        <div class="cartSummary">
                            <div class="crat-icon"> 
                                <span class="icon-handbag icons"></span>
                                <p class="mt-cart-title">My Cart</p>
                            </div>
                            <div class="cart-header"> 
                                <span class="zero">0 </span>
                                <p class="cart-tolatl"> 
                                    <span class="toltal">Total:</span> 
                                    <span><span class="price">$0.00</span></span>
                                </p>
                            </div>
                        </div>
                        <div class="mini-contentCart" style="display: none">
                            <div class="block-content">
                                <p class="block-subtitle">Recently added item(s)</p>
                                <ol id="cart-sidebar" class="mini-products-list clearfix">
                                    @include('layouts.frontend.viewCart')
                                </ol>
                                <div class="actions"> 
                                    <a href="{{ route('productFront.getViewCartProduct') }}"  class="view-cart"> View cart </a> 
                                    {{-- <a href="{{ route('productFront.checkout') }}">Checkout</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-setting">
                    <div class="settting-switcher">
                        <div class="dropdown-toggle">
                            <div class="icon-setting"><i class="icon-settings icons"></i></div>
                        </div>
                        <div class="dropdown-switcher">
                            <div class="top-links-alo">
                                <div class="header-top-link">
                                    <ul class="links">
                                        <!-- <li><a href="#" title="My Account" >My Account</a></li> -->
                                        <li><a href="{{ route('productFront.getViewCartProduct') }}" title="My Cart" >My Cart</a></li>
                                        @if (Auth::user()!=NULL)                    
                                        <li ><a href="{{ route('productFront.checkout') }}" title="Checkout" class="top-link-checkout">Checkout</a></li>
                                        <li class=" last" ><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Log In" >Log Out</a>
                                        </li>
                                        <li class=" last" ><a href="{{ URL('/orderHistory') }}" title="Order History" >Order History</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="view" value="front">
                                        </form>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>