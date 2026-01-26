<x-app-layout>
    <link href="{{ asset('css/products.css') }}" rel="stylesheet" />

    <section class="products">
        <h2>{{$category->name}}</h2>
        <div class="product-list">
            @foreach($products as $product)
            <div class="card">
                <a href="{{route('product.show',[$product->id])}}" class="card-a">

                    @if($product->media->where('media_type',10)->first())
                        <img src="{{ asset('storage/' . $product->media->where('media_type',10)->first()->url) }}" alt="{{$product->name}}">
                    @elseif($product->media->where('media_type',0)->first())
                        <img src="{{ asset('storage/' . $product->media->where('media_type',0)->first()->url) }}" alt="{{$product->name}}">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="{{$product->name}}">
                    @endif
                </a>
                <h3> {{$product->name }} </h3>
                <p>{{$product->description }}</p>
{{--                <div class="price-like">--}}
{{--                    <a href="{{route('product.show',[$product->id])}}">--}}
{{--                    <span class="price">حساب السعر >> </span>--}}
{{--                    </a>--}}
{{--                    <span class="likes"><i class="far fa-heart"></i> 15</span>--}}
{{--                </div>--}}
            </div>
                 @endforeach

        </div>
    </section>

    <script src="{{asset('js/products.js')}}"></script>

</x-app-layout>
