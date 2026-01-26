<x-app-layout>


{{--    <div>--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="main_holder">


    <div class="panel-swiper">

        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper panelSwiper">
            <div class="parallax-bg" style="
    background-image: url('{{ asset('images/panel1.png') }}');
             " data-swiper-parallax="-23%"></div>

            <div class="swiper-wrapper">

                <!-- شريحة 1 -->
                <div class="swiper-slide" dir="rtl">
                    <div class="title" data-swiper-parallax="-300">الشريحة الأولى</div>
                    <div class="subtitle" data-swiper-parallax="-200">العنوان الفرعي الأول</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>
                            هذا نص تجريبي يستخدم لاختبار تنسيق وتصميم الشريحة الأولى.
                            يمكن استبداله لاحقًا بالمحتوى الفعلي الذي يعبر عن مشروعك أو خدماتك.
                            الهدف من هذا النص هو توضيح كيفية ظهور الفقرات داخل السلايدر.
                        </p>
                    </div>
                </div>

                <!-- شريحة 2 -->
                <div class="swiper-slide" dir="rtl">
                    <div class="title" data-swiper-parallax="-300">الشريحة الثانية</div>
                    <div class="subtitle" data-swiper-parallax="-200">العنوان الفرعي الثاني</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>
                            هذا نص افتراضي للشريحة الثانية، وهو مصمم لإعطاء فكرة عن شكل المحتوى.
                            يمكنك إضافة وصف قصير أو نقاط أساسية تبرز ميزات ما تقدمه لعملائك.
                            طول النص يمكن تعديله حسب الحاجة.
                        </p>
                    </div>
                </div>

                <!-- شريحة 3 -->
                <div class="swiper-slide" dir="rtl">
                    <div class="title" data-swiper-parallax="-300">الشريحة الثالثة</div>
                    <div class="subtitle" data-swiper-parallax="-200">العنوان الفرعي الثالث</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>
                            هذه فقرة اختبارية للشريحة الثالثة.
                            الهدف منها هو عرض مثال حي على كيفية تنسيق النصوص الطويلة داخل السلايدر
                            مع الحفاظ على وضوح القراءة وسهولة التصفح.
                        </p>
                    </div>
                </div>

                <!-- شريحة 4 -->
                <div class="swiper-slide" dir="rtl">
                    <div class="title" data-swiper-parallax="-300">الشريحة الرابعة</div>
                    <div class="subtitle" data-swiper-parallax="-200">العنوان الفرعي الرابع</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>
                            النص التجريبي في هذه الشريحة مخصص لعرض نموذج فقرة يمكن استبدالها لاحقًا.
                            من الجيد دائمًا استخدام نصوص بديلة أثناء التصميم لاختبار المظهر العام
                            قبل إضافة المحتوى الحقيقي.
                        </p>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="holder">
        <h2>
            من نحن ؟
        </h2>
        <div class="we">
            <div class="img">
                <img src="{{ asset('images/we.png') }}" />
            </div>
            <div class="description">

                نحن [اسم شركتك]، نؤمن أن الجودة ليست خيارًا بل أسلوب حياة. نسعى لتقديم منتجات/خدمات تجمع بين الإبداع، الدقة، والتميز، لنمنح عملاءنا تجربة استثنائية تبقى في الذاكرة. رؤيتنا أن نكون الخيار الأول في [مجالك]، وقيمنا تقوم على الشفافية، الالتزام، والابتكار.
            </div>
        </div>
    </div>

    <div class="product-holder">
        <h2>
            امتع عينك
        </h2>
        <div class="products">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=800&q=80" alt="تصميم واجهة بانورامية" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1479839672679-a46483c0e7c8?auto=format&fit=crop&w=800&q=80" alt="برج بزجاج عاكس" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=800&q=80" alt="واجهة زجاجية شفافة" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1486304873000-235643847519?auto=format&fit=crop&w=800&q=80" alt="تصميم زجاجي عصري" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1479839672679-a46483c0e7c8?auto=format&fit=crop&w=800&q=80" alt="برج بزجاج أزرق" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=800&q=80" alt="تصميم واجهة بانورامية" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1479839672679-a46483c0e7c8?auto=format&fit=crop&w=800&q=80" alt="برج بزجاج عاكس" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=800&q=80" alt="واجهة زجاجية شفافة" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1486304873000-235643847519?auto=format&fit=crop&w=800&q=80" alt="تصميم زجاجي عصري" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1479839672679-a46483c0e7c8?auto=format&fit=crop&w=800&q=80" alt="برج بزجاج أزرق" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=800&q=80" alt="تصميم واجهة بانورامية" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1479839672679-a46483c0e7c8?auto=format&fit=crop&w=800&q=80" alt="برج بزجاج عاكس" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=800&q=80" alt="واجهة زجاجية شفافة" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1486304873000-235643847519?auto=format&fit=crop&w=800&q=80" alt="تصميم زجاجي عصري" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1479839672679-a46483c0e7c8?auto=format&fit=crop&w=800&q=80" alt="برج بزجاج أزرق" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

<div class="holder">
    <h2>

        اين نحن ؟
    </h2>
    <div class="location">

        <div class="image">
            <img src="{{asset('images/arrow.png')}}" alt="نحن هنا">
        </div>
        <div class="describe">
            <p>
                نقع في قلب [اسم المدينة أو المنطقة]، في موقع استراتيجي يسهل الوصول إليه من جميع أنحاء المدينة والمناطق المحيطة. يتيح موقعنا المتميز للعملاء والزوار التواصل المباشر معنا بسهولة ويسر، سواء عبر زيارتنا الشخصية أو عبر القنوات الرقمية.

                لدينا فروع متعددة في [عدد] مناطق رئيسية لتقديم خدماتنا بأعلى مستوى من الاحترافية والقرب من العملاء. سواء كنت ترغب في زيارة مقرنا الرئيسي أو أحد فروعنا، نحن هنا لخدمتك بأفضل شكل
            </p>
        </div>


    </div>
</div>

    <div class="holder">
        <h2>
            الاقسام <i class="fas fa-layer-group"></i>

        </h2>
        <div class="sections">
{{--            <div class="navbar">--}}
{{--                <div class="sec-name">--}}
{{--                    الزجاج--}}
{{--                </div>--}}
{{--                <div class="sec-name">--}}
{{--                    الالومانيوم--}}
{{--                </div>--}}
{{--                <div class="sec-name">--}}
{{--                    الاخشاب--}}
{{--                </div>--}}
{{--                <div class="sec-name">--}}
{{--                    الفايبر--}}
{{--                </div>--}}
{{--                <div class="sec-name">--}}
{{--                    المقاولات--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="content">

                <div class="card">
                    <a href="{{route('products.list',1)}}">
                        <div class="image">
                            <img src="{{asset('images/glass.png')}}" alt="">
                        </div>
                        <div class="footer">
                           الزجاج
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="image">
                        <img src="{{asset('images/window.png')}}" alt="">
                    </div>
                    <div class="footer">
                       الشبابيك
                    </div>
                </div>
                <div class="card">
                    <div class="image">
                        <img src="{{asset('images/door.png')}}" alt="">
                    </div>
                    <div class="footer">
                       ابواب
                    </div>
                </div>
                <div class="card">
                    <div class="image">
                        <img src="{{asset('images/fix.png')}}" alt="">
                    </div>
                    <div class="footer">
                       الصيانة
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="holder">

    <h2>الاكثر اعجابا
        <i class="far fa-heart"></i>
    </h2>
    <div class="spatial">

        <div class="heart">

        </div>
        <div class="swiper spatialSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{asset('images/1.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/2.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/3.png')}}" alt="">

                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/4.png')}}" alt="">

                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/5.png')}}" alt="">

                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/6.png')}}" alt="">

                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/7.png')}}" alt="">

                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/8.png')}}" alt="">

                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/9.png')}}" alt="">

                </div>
            </div>
        </div>
    </div>
</div>

    <div class="holder">
        <h2>شركاء النجاح </h2>
        <div class="partners">

            <div #swiperRef="" class="swiper partSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="circle">

                        </div>
                        <div class="footer">
  الشركة 1
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="circle">

                        </div>
                        <div class="footer">
                            الشركة 1
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="circle">

                        </div>
                        <div class="footer">
                            الشركة 1
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="circle">

                        </div>
                        <div class="footer">
                            الشركة 1
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="circle">

                        </div>
                        <div class="footer">
                            الشركة 1
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="circle">

                        </div>
                        <div class="footer">
                            الشركة 1
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <div class="holder">
        <h2>الفروع  <i class="fas fa-map-marked-alt"></i></h2>
        <div class="branches">
            <div class="swiper brSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{asset('images/loc.png')}}" alt="">
                        </div>
                        <div class="content">
                            <p>053 256 5215 <i class="fas fa-phone"></i></p>
                            <p>ارياض - العليا - شارع الملك فهد <i class="fas fa-map-marker-alt"></i></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{asset('images/loc.png')}}" alt="">
                        </div>
                        <div class="content">
                            <p>053 256 5215 <i class="fas fa-phone"></i></p>
                            <p>ارياض - العليا - شارع الملك فهد <i class="fas fa-map-marker-alt"></i></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{asset('images/loc.png')}}" alt="">
                        </div>
                        <div class="content">
                            <p>053 256 5215 <i class="fas fa-phone"></i></p>
                            <p>ارياض - العليا - شارع الملك فهد <i class="fas fa-map-marker-alt"></i></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{asset('images/loc.png')}}" alt="">
                        </div>
                        <div class="content">
                            <p>053 256 5215 <i class="fas fa-phone"></i></p>
                            <p>ارياض - العليا - شارع الملك فهد <i class="fas fa-map-marker-alt"></i></p>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </div>



</div>


    <!-- استدعاء مكتبة Font Awesome -->






</x-app-layout>
