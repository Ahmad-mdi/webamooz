<ul class="dropdown-menu">
    <li>
        <table id="cart-menu" class="table">
            <tbody id="cart-table-body">
            @foreach(\App\Models\Cart::getItems() as $item)
                @php
                    $product = $item['product'];
                    $productQty = $item['quantity'];
                @endphp
                <tr id="cart-row{{$product->id}}">
                    <td class="text-center">
                        <a href="{{route('client.productDetails.show',$product)}}">
                            <img width="100" height="100" class="img-thumbnail" title="{{$product->name}}" alt="{{$product->name}}" src="{{str_replace('public','/storage',$product->image)}}">
                        </a>
                    </td>
                    <td class="text-left">
                        <a href="{{route('client.productDetails.show',$product)}}">{{$product->name}}</a>
                    </td>
                    <td class="text-right" id="product-quantity-{{$product->id}}">x {{$productQty}}</td>
                    <td class="text-right">{{number_format($product->price_with_discount)}} تومان</td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCart({{$product->id}})" type="button">
                            <i class="fa fa-times"></i>
                        </button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </li>
    <li>
        <div>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="text-right"><strong>جمع کل</strong></td>
                    <td class="text-right cart-totalPrice">{{\App\Models\Cart::totalPrice()}} تومان</td>
                </tr>
                <tr>
                    <td class="text-right"><strong>قابل پرداخت</strong></td>
                    <td class="text-right cart-totalPrice">{{\App\Models\Cart::totalPrice()}} تومان</td>
                </tr>
                </tbody>
            </table>
            <p class="checkout">
                <a href="{{route('client.cart.index')}}" class="btn btn-primary">
                    <i class="fa fa-shopping-cart"></i> مشاهده سبد
                </a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('client.orders.create')}}" class="btn btn-primary">
                    <i class="fa fa-share"></i> ثبت سفارش
                </a>
            </p>
        </div>
    </li>
</ul>


