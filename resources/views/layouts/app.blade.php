<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
{{--        <link href= {{secure_asset('css/main.css')}} rel="stylesheet" />--}}
        <link href= {{ asset('css/main.css')}} rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @php
        $settings_about=\App\Models\Info::where('type',4)->first();
        $settings_whats=\App\Models\Info::where('type',7)->first();
        $settings_insta=\App\Models\Info::where('type',8)->first();
        $settings_email=\App\Models\Info::where('type',6)->first();
        $settings_phone=\App\Models\Info::where('type',5)->first();


    @endphp
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}

                <footer class="footer">
                    <div class="footer-container">

                        <!-- 🔹 عن الشركة -->
                        <div class="company">
                            <h4>الومنتك القابضة</h4>
                            <p>
                              {!!    $settings_about->content ?? ''!!}
                            </p>
                        </div>
                        <!-- 🔹 روابط سريعة -->
                        <div class="shortCuts">
                            <h4>روابط سريعة</h4>
                            <ul>
                                <li><i class="fa-solid fa-angles-left"></i> الرئيسية</li>

                                <li> <a href="{{ route('welcome') }}#we"><i class="fa-solid fa-angles-left"></i> من نحن </a> </li>

                                <li>
                                    <a href="{{ route('welcome') }}#products">
                                    <i class="fa-solid fa-angles-left"></i> ما نقدمه
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('welcome') }}#projects">
                                    <i class="fa-solid fa-angles-left"></i>
                                    مشاريعنا
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('welcome') }}#where">
                                    <i class="fa-solid fa-angles-left"></i> اين نحن؟
                                    </a>
                                </li>
                            </ul>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>

                            <script>
                                setTimeout(function () {
                                    let alertBox = document.getElementById("success-alert");
                                    if (alertBox) {
                                        alertBox.style.transition = "opacity 0.5s ease";
                                        alertBox.style.opacity = "0";
                                        setTimeout(() => alertBox.remove(), 500); // يحذف الديف بعد الانميشن
                                    }
                                }, 3000);

                            </script>
                        @endif
                        <div class="shareUs">
                            <h4>شاركنا رأيك</h4>
                            <p>قم بمشاركة رأيك أو اقتراحك وارساله إلينا</p>
                            <div class="share-box">
                                <form action="{{ route('message.add') }}" method="post">
                                    @csrf
                                    <input name="sender" type="text" placeholder=" ادخل اسمك " required>
                                    <input name="content" type="text" placeholder="أدخل رايك" required>
                                    <input type="submit" value="إرسال" class="send">
                                </form>

                            </div>
                        </div>

                        <!-- 🔹 تواصل معنا -->
                        <div class="contactUs">
                            <h4>تواصل معنا</h4>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href="mailto:{{ strip_tags($settings_email->content ?? '') }}">
                                        {{ strip_tags($settings_email->content ?? '') }}
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <a href="tel:{{ strip_tags($settings_phone->content ?? '') }}">
                                        {{ strip_tags($settings_phone->content ?? '') }}
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <a href="https://wa.me/{{  strip_tags($settings_whats->content ?? '') }}"
                                       target="_blank">
                                      مراسلة . .
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-brands fa-instagram"></i>
                                    <a href="{{ strip_tags($settings_insta->content ?? '') }}"
                                       target="_blank">
                                        {{ strip_tags($settings_insta->content ?? '') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>


                    <div class="footer-bottom">
                        <p>© 2025 جميع الحقوق محفوظة | الومنتك القابضة </p>
                    </div>
                </footer>

            </main>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{--        <script src="{{secure_asset('js/main.js')}}"></script>--}}
        <script src="{{ asset('js/main.js')}}"></script>
{{--        <script src="{{secure_asset('js/movements.js')}}"></script>--}}
        <script src="{{ asset('js/movements.js')}}"></script>
        <script src="{{ asset('js/clintsSays.js')}}"></script>



    </body>
</html>
