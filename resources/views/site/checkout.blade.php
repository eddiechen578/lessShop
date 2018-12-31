<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('css/checkout.css')}}">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>
            <div class="row">
                <div style="display: table; margin: auto;">
                    <div id="logo">
                        <a href="/admin/home"><img src="{{URL::asset('/img/logo.png')}}" title="LESS ONLINE SHOP" alt="LESS ONLINE SHOP" class="img-responsive" /></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <p></p>
            </div>
        </div>
    </div>
    <div class="row cart-body">
        <form class="form-horizontal" method="post" action="#">

            <div class="col-lg-6 col-md-10 col-sm-5 col-xs-10 col-md-push-1 col-sm-pull-1">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Review Order <div class="pull-right"><small><a class="afix-1" href="#">Cart</a></small></div>
                    </div>
                    <div class="panel-body">
                        @foreach(Cart::content() as $item)
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3">
                                <img class="img-responsive" src="{{$item->options->has('image') ? $item->options->image : ''}}" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12">{{$item->name}}</div>
                                <div class="col-xs-12"><small>qty :<span>{{$item->qty}}</span></small></div>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <h6><span>$</span>{{$item->subtotal}}</h6>
                            </div>
                        </div>
                        <div class="form-group"><hr /></div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Order Total</strong>
                                <div class="pull-right"><span>$</span><span>{{number_format(Cart::total())}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--REVIEW ORDER END-->
            </div>
        </form>
            <div class="  col-lg-5 col-md-5 col-sm-5 col-xs-12 col-md-push-3 col-sm-push-1">
                <!--CREDIT CART PAYMENT-->
                <div class="panel panel-info">
                    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                    <div class="panel-body">
                        <form action="{{route('cart.checkout')}}" method="POST">
                            {{csrf_field()}}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_0Z72WZha5HNjSgtnoNOSOMfG"
                                    data-amount="{{Cart::total() * 100}}"
                                    data-name="Demo Site"
                                    data-description="Example charge"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto">
                            </script>
                        </form>
                        <div class="col-md-12">
                            <ul class="cards">
                                <li class="visa hand">Visa</li>
                                <li class="mastercard hand">MasterCard</li>
                                <li class="amex hand">Amex</li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                <!--CREDIT CART PAYMENT END-->
            </div>

    </div>
    <div class="row cart-footer">

    </div>
</div>