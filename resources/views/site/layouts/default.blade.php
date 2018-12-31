@include('site.layouts.header')
<body>
@section('sidebar')
    <aside id="column-left" class="col-sm-2 hidden-xs">
            <div class="list-group">

                <a href="" class="list-group-item active">線上商店/ONLINE SHOP</a>

                <a href="{{route('category.item', ['category_id' => 1])}}" class="list-group-item">LESS x DICKIES ({{$cate_1_count}})</a>

                <a href="{{route('category.item', ['category_id' => 2])}}" class="list-group-item">HATS &amp; CAPS ({{$cate_2_count}})</a>

                <a href="{{route('category.item', ['category_id' => 3])}}" class="list-group-item">JACKETS ({{$cate_3_count}})</a>

                <a href="{{route('category.item', ['category_id' => 4])}}" class="list-group-item">HOODIE &amp; SWEAT ({{$cate_4_count}})</a>

                <a href="{{route('category.item', ['category_id' => 5])}}" class="list-group-item">SHIRTS ({{$cate_5_count}})</a>

                <a href="{{route('category.item', ['category_id' => 6])}}" class="list-group-item">T-SHIRTS ({{$cate_6_count}})</a>

                <a href="{{route('category.item', ['category_id' => 7])}}" class="list-group-item">PANTS ({{$cate_7_count}})</a>

                <a href="{{route('category.item', ['category_id' => 8])}}" class="list-group-item">SHORT ({{$cate_8_count}})</a>

                <a href="{{route('category.item', ['category_id' => 9])}}" class="list-group-item">SHOES ({{$cate_9_count}})</a>

                <a href="{{route('category.item', ['category_id' => 10])}}" class="list-group-item">ACCESSORIES ({{$cate_10_count}})</a>

            </div>
        </aside>

            @show

    @yield('content')

@include('site.layouts.footer')
</body>
</html>