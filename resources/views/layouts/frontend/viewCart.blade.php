@php
$productData=cartList();
$i=0;
@endphp
@if ($productData!="")
@foreach ($productData as $product)
<li class="item clearfix">
    <div class="cart-content-top">
        <a href="#" class="product-image"><img src="{{URL('resources/assets/products/'.$productData[$i]['productId'].'/'.$productData[$i]['productThumb'])}}" width="60" height="75" alt="Brown Arrows Cushion"></a>
        <div class="product-details">
            <p class="product-name"><a href="#">{{$productData[$i]['productName']}}</a></p>
            <strong>{{$productData[$i]['productQty']}}</strong> x <span class="price">${{$productData[$i]['productPrice']}}</span>
        </div>
    </div>
    <div class="cart-content-bottom">
        <div class="clearfix"> <a href="#" title="Edit item" class="btn-edit"><i class="fa fa-pencil-square-o"></i></a> <a onclick="removeProduct({{$productData[$i]['productId']}})" title="Remove" class="btn-remove btn-remove2"><i class="icon-close icons"></i></a></div>
    </div>
</li>
@php
    $i++;
@endphp
@endforeach  
@endif