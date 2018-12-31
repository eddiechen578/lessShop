@extends('site.layouts.default')

@section('content')
    <link href="{{asset('/css/theme.css')}}" rel="stylesheet" type="text/css" />

    <div id="content" class="col-sm-20">

    <section id="content" class="theme_page standard">
            <div id="product_detail_page" class="clearfix">
                <div id="product_detail_image">

                    <a href="{{$merchandise->photo}}" class="fancybox" rel="group"><img src="{{$merchandise->photo}}" alt="Image of LESS - NEED LESS ZIP SWEATSHIRT" class="default_image" /></a>
                    <ul id="product_thumbs" class="clearfix">

                        <li class="thumbnail"><a href="{{$merchandise->photo}}" class="fancybox" rel="group"><img src="{{$merchandise->photo}}" alt="Image of LESS - NEED LESS ZIP SWEATSHIRT" /></a></li>

                        {{--<li class="thumbnail"><a href="https://assets.bigcartel.com/product_images/191682058/LESS-NEED-LESS-ZIP-SWEATSHIRT-04.jpg?auto=format&fit=max&h=1000&w=1000" class="fancybox" rel="group"><img src="https://assets.bigcartel.com/product_images/191682058/LESS-NEED-LESS-ZIP-SWEATSHIRT-04.jpg?auto=format&fit=max&h=75&w=75" alt="Image of LESS - NEED LESS ZIP SWEATSHIRT" /></a></li>--}}

                        {{--<li class="thumbnail"><a href="https://assets.bigcartel.com/product_images/191682061/LESS-NEED-LESS-ZIP-SWEATSHIRT-05.jpg?auto=format&fit=max&h=1000&w=1000" class="fancybox" rel="group"><img src="https://assets.bigcartel.com/product_images/191682061/LESS-NEED-LESS-ZIP-SWEATSHIRT-05.jpg?auto=format&fit=max&h=75&w=75" alt="Image of LESS - NEED LESS ZIP SWEATSHIRT" /></a></li>--}}

                        {{--<li class="thumbnail"><a href="https://assets.bigcartel.com/product_images/191682187/LESS-NEED-LESS-ZIP-SWEATSHIRT-022.jpg?auto=format&fit=max&h=1000&w=1000" class="fancybox" rel="group"><img src="https://assets.bigcartel.com/product_images/191682187/LESS-NEED-LESS-ZIP-SWEATSHIRT-022.jpg?auto=format&fit=max&h=75&w=75" alt="Image of LESS - NEED LESS ZIP SWEATSHIRT" /></a></li>--}}

                    </ul>
                </div>
                <div id="product_detail_info">
                    <h1>{{$merchandise->name}}</h1>


                    <h3 id="price" class=""><span class="currency_sign">NT$</span>{{$merchandise->price}}</span></h3>
                    <hr>



                        <div id="add_cart">
                            <form method="POST" action="{{route('cart.add')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_id" value="{{$merchandise->id}}">
                                <button type="submit" class="btn btn-fefault add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </form>
                        </div>



                    <div id="description">
                        <hr />
                        <p>{{$merchandise->introduction}}</p>
                        <p>● Shipped Worldwide
                            <br />If you have any questions,Please email to: info@lesscrew.com or Drop Message.</p>
                        <p>如顯示為完售可能為"真的完售"或是"庫存僅存一"(線上商店會先行下架以門市販售為主)，如有需要歡迎可於 Facebook粉絲團訊息 詢問 :)</p>
                    </div>




                </div>
            </div>
        </section>

    </div>



@endsection