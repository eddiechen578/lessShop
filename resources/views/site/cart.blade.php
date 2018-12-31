@extends('site.layouts.default')

@section('content')
    <div id="content" class="col-sm-10">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                @if(count($cart))
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)

                            <tr>
                                <td class="cart_product">
                                    <a href="#"><img src="{{$item->options->has('image') ? $item->options->image : ''}}" alt="" width="80px" height="80px" class="img-responsive"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$item->name}}</a></h4>
                                    <p>Web ID: {{$item->id}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{$item->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="{{url("/admin/cart/add?product_id=$item->id&increment=1")}}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="{{url("/admin/cart/add?product_id=$item->id&decrease=1")}}"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$item->subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url("/admin/cart/add?product_id=$item->id&remove=1")}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p>You have no items in the shopping cart</p>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td>Subtotal</td>
                            <td>$ {{Cart::total()}}</td>
                        </tr>
                        <tr>
                            <td colspan="5">&nbsp;</td>
                            <td><a class="btn btn-default check_out" href="{{route('cart.checkout')}}">Check Out</a></td>
                        </tr>
                        </tfoot>
                    </table>


            </div>
        </div>
    </section> <!--/#cart_items-->
    </div>
@endsection