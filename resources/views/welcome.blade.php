<x-app-layout>
    <div class="main_holder">

        <div class="panel-holder">
            <div class="panel-swiper">

                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper panelSwiper">
                    <div class="parallax-bg" style="
    background-image: url('{{ asset('images/panel1.png') }}');
             " data-swiper-parallax="-23%"></div>

                    <div class="swiper-wrapper">

                        <!-- شريحة 1 -->
                        @foreach($banner as $inf)

                            <div class="swiper-slide" dir="rtl">
                                <div class="title" data-swiper-parallax="-300">{{$inf->title}}</div>
                                <div class="subtitle" data-swiper-parallax="-200">{{$inf->subtitle}}</div>
                                <div class="text" data-swiper-parallax="-100">
                                    <p>
                                        {!! $inf->content !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
        <div class="holder" id="products">
            <h2> احدث بضائعنا  <span><i class="fa-solid fa-box-open"></i></span> </h2>
            <div class="products-home">
                @foreach($products as $product)

                    <div class="card">
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
                                <h3> {{$product->name }} </h3>
                                <p>{{$product->description }}</p>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>

<div class="show-all-products">
    <a href="{{route('all_products.show')}}">
               عرض الكل <i class="fa-solid fa-list"></i>
    </a>
</div>
        </div>

    </div>
        <div class="holder" id="we">
            <h2>
                من نحن ؟
            </h2>

            <div class="we">

                @if($we && $we->media && $we->media->isNotEmpty())
                    <div class="img">
                        <img src="{{asset('storage/'.$we->media?->first()?->url)}}" alt="من نحن">
                    </div>
                @else
                    <div class="img">
                        <img src="{{asset('images/we.png')}}" alt=" من نحن  ">
                    </div>
                @endif


                <div class="description">
                    @if($we && $we->content  )

                         {!!$we->content!!}
                    @endif
                </div>
            </div>
        </div>

        <div class="holder" id="projects">
            <h2>
                امتع عينك
            </h2>

            <div class="products">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($jobs as $job)

                            <div class="swiper-slide">
                            <a href="{{route('job.show',[$job->id])}}">
                                <img src="{{asset('storage/'.$job->media->first()->url)}}" alt="واجهة زجاجية شفافة" style="width:100%;height:100%;object-fit:cover;">
                            </a>
                            </div>

                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <div class="holder" id="where">
            <h2>

                اين نحن ؟
            </h2>
            <div class="location">
                @if($whereWe && $whereWe->media && $whereWe->media->isNotEmpty())

                    <div class="image">
                        <img src="{{asset('storage/'.$whereWe->media->first()->url)}}" alt="نحن هنا">
                    </div>
                @else
                    <div class="image">
                        <img src="{{asset('images/arrow.png')}}" alt="نحن هنا">
                    </div>
                @endif
                <div class="describe">
                    <p>
                        @if($whereWe && $whereWe->content )

                        {!! $whereWe->content !!}
                        @endif
                    </p>
                </div>


            </div>
        </div>



        <div class="holder">
            <h2>
                الاقسام <i class="fas fa-layer-group"></i>

            </h2>
            <div class="sections">


                <div class="content">

                    @foreach($categories as $category)
                        <div class="card">
                            <a href="{{route('products.list',$category->id)}}">
                                <div class="image">

                                    @if($category->media->first())

                                        <img src="{{ asset('storage/' . $category->media->first()->url) }}" alt="{{$category->name}}">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt=""> {{-- صورة افتراضية --}}
                                    @endif
                                </div>
                                <div class="footer">
                                   {{$category->name}}
                                </div>
                            </a>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>

    <div class="holder" id="services">
        <h2>خدماتنا</h2>
        <div class="services">
            <div class="left">
                @php
                    $img_src ="";
                @endphp

                @foreach($services as $service)

                    @php
                        if($loop->first){
                    $img_src ='storage/'.( $service->media->first()?$service->media->first()->url:'images/defaultService.png');
             }
                    @endphp

                <div class="sub {{$loop->first ? 'active' : '' }}" data-img="{{asset('storage/'.( $service->media->first()?$service->media->first()->url:'images/defaultService.png'))}}">

                    <div>
                        <div class="title">{{$service->title}}</div>
                        <div class="content-service {{$loop->first ? 'show' : '' }}">
                        {!!   $service->content !!}
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            <div class="right">
                <img class="device" src="{{asset($img_src)}}" alt="portfolio device mockup">
            </div>
        </div>
    </div>

{{--            <div class="holder">--}}

{{--                <h2>الاكثر اعجابا--}}
{{--                    <i class="far fa-heart"></i>--}}
{{--                </h2>--}}
{{--                <div class="spatial">--}}

{{--                    <div class="heart">--}}

{{--                    </div>--}}
{{--                    <div class="swiper spatialSwiper">--}}
{{--                        <div class="swiper-wrapper">--}}
{{--                            @foreach($likes as $like)--}}
{{--                                <div class="swiper-slide">--}}
{{--                                    <a href="{{route('product.show',[$like->Product->id])}}">--}}

{{--                                        @if($like->Product->media->where('media_type',10)->first())--}}
{{--                                            <img src="{{ asset('storage/' . $like->Product->media->where('media_type',10)->first()->url) }}" alt="{{$product->name}}">--}}
{{--                                        @elseif($like->Product->media->first())--}}
{{--                                            <img src="{{ asset('storage/' . $like->Product->media->where('media_type',0)->first()->url) }}" alt="{{$product->name}}">--}}
{{--                                        @else--}}
{{--                                            <img src="{{ asset('images/default.png') }}" alt="{{$like->Product->name}}">--}}
{{--                                        @endif--}}

{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        <div class="holder">
            <h2>شركاء النجاح </h2>
            <div class="partners-banner">
                <div class="logos">
                    <div class="logo-slide">
                    @foreach($partners as $partner)
                        @if( $partner->media->first())
                                <img src="{{asset('storage/'.$partner->media->first()->url)}}" alt= "">
                            @else
                                <img src="{{asset('images/logo_temp.png')}}" alt= "">
                            @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
 <div class="holder">
     <h2>ماذا يقول عملاءنا </h2>
     <div class="clients-says">
         <button class="nav-btn prev">&#10094;</button>

         <section class="testimonials" id="testimonials">
             @foreach($messages as $message)
                 <div class="t-item {{$loop->first ? 'active' : ''}}">
                     <div class="content">
                         {{$message->content}}
                     </div>
                     <div class="sender">{{$message->sender}}</div>
                 </div>
             @endforeach
         </section>

         <button class="nav-btn next">&#10095;</button>
     </div>


 </div>
{{--        <div class="holder">--}}
{{--            <h2>الفروع  <i class="fas fa-map-marked-alt"></i></h2>--}}
{{--            <div class="branches">--}}
{{--                <div class="swiper brSwiper">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        @foreach($branches as $branch)--}}
{{--                            <div class="swiper-slide">--}}
{{--                                <div class="image branch-image">--}}
{{--                                    @if(!$branch->media->isEmpty())--}}
{{--                                        <img src="{{ asset('storage/'.$branch->media->first()->url) }}" alt="">--}}
{{--                                    @else--}}
{{--                                        <img src="{{ asset('images/default_branch.png') }}" alt="">--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="content branch-content">--}}
{{--                                    <p>{{ $branch->phone }} <i class="fas fa-phone"></i></p>--}}
{{--                                    <p>{{ $branch->location }} <i class="fas fa-map-marker-alt"></i></p>--}}
{{--                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode(($branch->map_location)) }}"--}}
{{--                                       target="_blank" class="branch-link">--}}
{{--                                        <i class="fas fa-directions"></i> اذهب إلى الموقع--}}
{{--                                    </a>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    <div class="swiper-pagination"></div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}


</x-app-layout>
