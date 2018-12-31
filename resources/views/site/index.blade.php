@extends('site.layouts.default')

@section('content')

    <div id="content" class="col-sm-10">
        <div class="col-xs-4">
            <div class="panel panel-info">
             <div class="panel-heading text-center">
                 Total Merchandised
             </div>
             <div class="panel-body">
                 <h1 class="text-center">
                     {{$merchandised_count}}
                 </h1>
             </div>
            </div>
        </div>


        <div class="col-xs-4">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                  Tatol Category
                </div>
                <div class="panel-body">
                    <h1 class="text-center">
                        {{$category_count}}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="panel panel-danger">
                <div class="panel-heading text-center">
                    Revenue
                </div>
                <div class="panel-body">
                    <h1 class="text-center">
                       $ {{$revenue_count}}
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
    <div class="w3-content w3-display-container">
        <img class="mySlides" src="http://lesscrew.com/shop/image/cache/catalog/index/banner01-1140x383.jpg" style="width:100%">
        <img class="mySlides" src="http://lesscrew.com/shop/image/cache/catalog/index/banner02-1140x383.jpg" style="width:100%">
        <img class="mySlides" src="http://lesscrew.com/shop/image/cache/catalog/index/banner03-1140x383.jpg" style="width:100%">

    </div>
        </div>
    </div>






@endsection