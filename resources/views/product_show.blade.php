<x-app-layout>
    <link href="{{ secure_asset('css/product_show.css') }}" rel="stylesheet" />
    <link href="{{  asset('css/product_show.css') }}" rel="stylesheet" />



    <div class="moreDetail">
        <p>
            {{$product->detail}}
        </p>
    </div>

    <div class="container">
        <section class="product" aria-label="بطاقة عرض الصنف">
            <!-- Gallery -->
            <div class="gallery" id="gallery" aria-roledescription="carousel" aria-label="صور المنتج">
                <div class="slides" id="slides">

                    @foreach($product->media->where('media_type', 0) as $image)
                    <div class="slide">
                        <img src="{{asset('storage/'.$image->url)}}" alt="">
                    </div>
                    @endforeach
                </div>
                <button class="arrow prev" id="prev" aria-label="السابق" title="السابق">&#x276F;</button>
                <button class="arrow next" id="next" aria-label="التالي" title="التالي">&#x276E;</button>
                <div class="dots" id="dots" role="tablist" aria-label="مؤشرات الشرائح"></div>
            </div>

            <!-- Details -->
            <div class="details">
                <span class="badge">متوفر الآن</span>
                <h1 class="title">{{$product->name}}</h1>
                <p class="desc">
                {{$product->description}}
                </p>

<div class="price-calc">

    <div class="price-calc">
        <div class="qty">
            <label for="qty" style="color:var(--muted)">الكمية</label>
            <div class="stepper">
                <button type="button" id="minus" aria-label="إنقاص">−</button>
                <input id="qty" type="number" min="1" value="1" inputmode="numeric" />
                <button type="button" id="plus" aria-label="زيادة">+</button>
            </div>
        </div>

        <div class="dimensions" style="display:none; margin-top:8px;">
            <label>الطول (م)</label>
            <input type="number" id="length" min="0" step="0.01" value="0" class="measure">
            <label>العرض (م)</label>
            <input type="number" id="width" min="0" step="0.01" value="0" class="measure">
        </div>

        <div class="unit">
            <label for="unitSelect" style="color:var(--muted)">الوحدة</label>
            <select id="unitSelect">
                @foreach($product->productUnits as $unit)
                    <option value="{{$unit->price}}" data-is_measurable="{{$unit->unit->is_measurable}}">{{$unit->unit->name}}</option>
                @endforeach
            </select>
        </div>


    </div>


{{--                <div class="cta">--}}
{{--                    <button class="btn btn-primary" id="addToCart" >أضِف للسلة</button>--}}
{{--                    <a href=""></a>--}}

{{--                    <button class="btn btn-ghost" id="detailsBtn" data-whatsnum ="{{$settings_order_number->content}}">اطلبها الان </button>--}}
{{--                </div>--}}

{{--                <div class="meta">--}}
{{--                    <div>السعرات: 120 كالوري</div>--}}
{{--                    <div>الوزن الصافي: 330 مل</div>--}}
{{--                    <div>منشأ: الهند</div>--}}
{{--                    <div>تخزين: يُحفظ مبرداً</div>--}}
{{--                </div>--}}

                <!-- Thumbnails -->
                <div class="thumbs" id="thumbs" aria-label="مصغرات الصور"></div>
            </div>
            </div>
            <div class="moreInfo">
                اظهار المزيد من التفاصيل <i class="fas fa-info-circle"></i>
            </div>
            <div class="vr-holder">
                <div class="vr">
                    عرض على الواقع المعزز <i class="fas fa-camera"></i>
                </div>
                <div class="message">
                    عرض على الصورة :
                    <div class="vr-option">
                        @foreach($product->media->where('media_type', 0) as $image)
                            <a href="{{route('vr.show',["$image->id"])}}">
                                <img src="{{asset('storage/'.$image->url)}}" alt="">
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

        </section>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>

    <div id="panorama"
         @if($product->media->where('media_type', 1)->isEmpty())
             style="display: none"
        @endif
    >
    </div>

    <script>
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            @if(!optional($product->media)->where('media_type', 1)->isEmpty())
            "panorama": "{{asset( 'storage/'.$product->media->where('media_type', 1)->first()->url ?? '')}}",
            @endif
            "autoLoad": true
        });
    </script>



    <script src="{{ asset('js/product_show.js')}}"></script>

</x-app-layout>
