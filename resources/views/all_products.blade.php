<x-app-layout>
    <link href="{{ asset('css/all_products.css') }}" rel="stylesheet" />
    <div class="container">

        <!-- 🔹 ناف بار الأقسام -->
        <nav class="category-navbar">
            <ul>
                <li><a href="#" data-category="all" class="active">الكل</a></li>
                @foreach($categories as $cat)
                    <li><a href="#" data-category="{{ $cat->id }}">{{ $cat->name }}</a></li>
                @endforeach
            </ul>
        </nav>

        <!-- 🔹 أدوات التحكم -->
        <div class="controls">
            <!-- البحث -->
            <div>
                <label for="searchInput">بحث:</label>
                <input type="text" id="searchInput" placeholder="ابحث باسم المنتج...">
            </div>

            <!-- الفرز -->
            <div>
                <label for="sortBy">فرز حسب:</label>
                <select id="sortBy">
                    <option value="name">الاسم</option>
                    <option value="date">التاريخ</option>
                </select>
            </div>
        </div>

        <!-- 🔹 المنتجات -->
        <div id="productsGrid">
            @foreach($products as $product)
                <div class="product-card"

                     data-category="{{ $product->category_id }}"
                     data-name="{{ $product->name }}"
                     data-date="{{ $product->created_at }}">
                    <a href="{{route('product.show',[$product->id])}}">
                    <div class="image">
                        @if($product->media->where('media_type',10)->first())
                            <img src="{{ asset('storage/' . $product->media->where('media_type',10)->first()->url) }}" alt="{{$product->name}}">
                        @elseif($product->media->where('media_type',0)->first())
                            <img src="{{ asset('storage/' . $product->media->where('media_type',0)->first()->url) }}" alt="{{$product->name}}">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="{{$product->name}}">
                        @endif
                    </div>
                    <div class="content">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ Str::limit($product->description, 60) }}</p>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <script src="{{asset('js/all_products.js')}}"></script>
</x-app-layout>
