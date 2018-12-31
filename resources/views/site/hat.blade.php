@extends('site.layouts.default')

@section('content')

    <div id="content" class="col-sm-10">      <!--<h2>LESS x DICKIES</h2>分類標題-->
        <div class="row">
            <div class="col-sm-12"><p><br></p></div>
        </div>
        <div class="row">
            <div class="col-md-8 category02" >
                <div class="btn-group hidden-xs">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="圖文"><i class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="圖片"><i class="fa fa-th"></i></button>
                </div>
            </div>
        </div>
        <br />
        <div id="myDiv">
            @foreach($merchandises as $merchandise)
                <div id="product{{$merchandise->id}}"  class="product-layout product-list col-xs-12">
                    <div class="product-thumb">
                        <div class="image"><a href=""><img src="/storage/galeryImages/{{$merchandise->photo}}"  title="{{{$merchandise->name}}}" class="img-responsive" /></a></div>
                        <div>
                            <div class="caption">
                                <h4>{{$merchandise->name}}</h4>
                                <p>{{$merchandise->name}}</p>
                                <p class="price">
                                    NT:{{$merchandise->price}}
                                </p>
                                <div>
                                    <button class="updateBtn" style="background-color: white; border: 0px" value="{{$merchandise->id}}"><i class="fa fa-pen"></i> <span class="hidden-xs hidden-sm hidden-md">新增商品</span></button>
                                    <button class="deleteBtn" style="background-color: white; border: 0px" value="{{$merchandise->id}}"><i class="fa fa-trash"></i> <span class="hidden-xs hidden-sm hidden-md">刪除</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>




@endsection