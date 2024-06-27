<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{URL::asset('assets/img/logoinsta.png')}}" type="image/x-icon"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('src/CSS/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('src/CSS/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('src/CSS/output.css') }}" />
    <title>Insta Order</title>
</head>

@php
    $locale = App::getLocale();
@endphp
@if ($locale == 'ar')
    <body dir="rtl">
@else
    <body dir="ltr">
@endif
    <nav class="bg-white z-[99999] fixed top-0 w-full border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset($info->logo) }}" alt="logo">
            </a>
            <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                {{-- <a href="ContactUsAR.html">
                    <button type="button"
                    class="px-4 py-2 text-sm font-medium text-center text-black bg-transparent border border-black rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تواصل معنا</button></a> --}}
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block px-3 py-2 rounded md:p-0 bg-rose-700 md:bg-transparent md:text-rose-700 md:dark:text-rose-500 "
                            @if (!Request::is('/'))
                                style="color: black"
                            @endif
                            aria-current="page">@lang('message.الرئيسيه')</a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:dark:hover:text-rose-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">المطاعم</a>
                    </li> --}}
                    <li>
                        <a href="{{ url('/become-partner') }}"
                            class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:dark:hover:text-rose-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            @if (Request::is('become-partner'))
                                style="color: #be143e"
                            @endif
                            >@lang('message.اصبح شريك')</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact-us') }}"
                            class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:dark:hover:text-rose-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            @if (Request::is('contact-us'))
                                style="color: #be143e"
                            @endif
                            > @lang('message.تواصل معنا') </a>
                    </li>
                </ul>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <header
        class="min-h-[100vh] flex items-center justify-center bg-cover bg-[url('../images/snack-pastry-board-with-potatoes-water-black-background-top-view.png')]">
        <div class="container">
            <div class="flex flex-wrap items-center justify-start">
                <div class="w-full px-4 my-4 md:w-1/2">
                    <h1 class="font-main text-center text-white text-[50px] md:text-start my-8 md:text-[64px]">
                        @if ($partoneclinic)
                            {{ $partoneclinic->title }}
                        @endif
                    </h1>
                </div>
                <div class="w-full px-4 my-4 md:w-1/2">
                    <img src="{{ asset('src/images/Group 1171276400.png') }}" class="w-full" alt="food" />
                </div>
            </div>
        </div>
    </header>
    <section dir="ltr">
        <div class="container">
            <div class="bg-white md:mt-[-100px] shadow-2xl rounded-2xl flex flex-wrap py-5 px-7">
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('src/images/Group 1171276474.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            @lang('message.حجز') <br />
                            @lang('message.سهل')
                        </p>
                    </div>
                </div>
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('src/images/Component 82.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            @lang('message.خصم') <br />
                            @lang('message.يومي')
                        </p>
                    </div>
                </div>
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('src/images/Group 1171276474.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            100+ <br />
                            @lang('message.عيادات')
                        </p>
                    </div>
                </div>
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('src/images/Component 82.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            100+ <br />
                            @lang('message.اطباء')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20">
        <div class="container">
            <div class="flex flex-wrap items-center">
                <div class="w-full px-4 my-4 md:w-1/2">
                    <div class="text-blue-900 text-[40px] md:text-5xl font-bold font-main">
                        @if ($parttwoclinic)
                            {{ $parttwoclinic->title }}
                        @endif
                    </div>
                    {{--  <div class="w-[356px]">
                        <span class="text-blue-400 text-[40px] font-medium font-['Roboto']">نحن نقدّر</span>
                        <span class="text-stone-900 text-[40px] font-bold font-['Roboto']">عملائنا وزبائننا</span>
                    </div>  --}}
                    <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        @if ($parttwoclinic)
                            {{ $parttwoclinic->description }}
                        @endif
                    </div>
                    {{--  <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        ابحث عن موقعك
                    </div>
                    <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        اعثر على مطعمك المفضل
                    </div>
                    <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        اختر المطبخ الذي تفضله
                    </div>
                    <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        احصل على طعامك موصل إلى عنوانك
                    </div>  --}}
                </div>
                <div class="w-full px-4 my-4 md:w-1/2">
                    <img src="{{ asset('src/images/Group 1171276413.png') }}" class="w-full" alt="burger" />
                </div>
            </div>
        </div>
    </section>
    <section class="py-24">
        <div class="container">
            <div class="slider rounded-2xl bg-[#1F1F1F] py-10 relative px-2">
                <img src="{{ asset('src/images/Group 1171276404.png') }}" class="absolute bottom-0 right-0 hidden md:block"
                    alt="frame" />
                <h3 class="font-main text-center py-4 md:text-[45px] text-[30px] text-white">
                    @lang('message.أفضل الأطباء تقييما')
                </h3>
                <div class="swiper mySwiper">
                    @if ($best)
                        <div class="swiper-wrapper">
                            @foreach ($best as $doctoritem)
                                <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                                    <img src="{{ asset($doctoritem->doctore->image) }}" class="mx-auto my-4" alt="burger" />
                                    {{--  <h4 class="text-[24px]">@lang('message.طب الاسنان')</h4>  --}}
                                    <h4 class="text-[24px]">{{ $doctoritem->doctore->department }}</h4>

                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24" dir="ltr">
        <div class="flex flex-wrap items-center">
            <div
                class="w-full bg-cover xl:w-2/3 xl:rounded-r-[100px] py-6 bg-[url('../images/snack-pastry-board-with-potatoes-water-black-background-top-view.png')]">
                <div class="mx-auto">
                    <div class="text-white text-center text-[50px] md:text-[64px] font-bold font-main">
                        @lang('message.اصبح واحد منا؟')
                    </div>
                    <div class="text-center">
                        <span class="text-blue-400 text-4xl font-bold font-['Roboto']">@lang('message.ماذا')
                        </span>
                        <span class="text-white text-4xl font-medium font-['Roboto']">@lang('message.ماذا تنتظر ؟')</span>
                    </div>
                </div>
                <div class="my-20 text-center">
                    <a href="{{ url('/become-partner') }}" class="bg-white text-slate-900 px-16 rounded-full py-2 text-[30px]">
                        @lang('message.تسجيل الدخول كـ شريك')
                    </a>
                </div>
            </div>
            <div class="hidden xl:w-1/3 xl:block">
                <img src="{{ asset('src/images/Group 1171276412.png') }}" class="w-100 ml-[-230px]" alt="pizza">
            </div>
        </div>
    </section>
    <section class="relative py-24 " dir="ltr">
        <img src="{{ asset('src/images/Group 1171276175 1.png') }}" class="absolute top-[-270px] z-[-1] left-0" alt="frame">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 my-4 overflow-hidden lg:w-1/2">
                    <div class="flex flex-wrap items-stretch">
                        <div dir="rtl" class="w-3/4 bg-[#1F1F1F] py-5 rounded-2xl relative px-7">
                            <div class="text-rose-400 text-[25px] md:text-[32px] font-bold font-['Roboto']">
                                @if ($cardfood)
                                    {{ $cardfood->title }}
                                @endif
                            </div>
                            <div class="text-white text-[17px] md:text-xl font-bold py-4 font-['Roboto']">
                                @if ($cardfood)
                                    {{ $cardfood->description }}
                                @endif
                            </div>
                            <a href="{{ url('/') }}" class="text-blue-400 text-[17px] md:text-xl font-normal py-1 font-['Roboto']">استكشف
                            </a>
                        </div>
                        <div class="w-1/4 bg-cover rounded-r-2xl overflow-hidden ml-[-15px]">
                            <img src="{{ asset('src/images/unsplash_LV2p9Utbkbw.png') }}" class="object-cover h-full" alt="">
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 my-4 overflow-hidden lg:w-1/2">
                    <div class="flex flex-wrap items-stretch">
                        <div dir="rtl" class="w-3/4 bg-[#1F1F1F] py-5 rounded-2xl relative px-7">
                            <div class="text-blue-500 text-[25px] md:text-[32px] font-bold font-['Roboto']">
                                @if ($cardclinic)
                                    {{ $cardclinic->title }}
                                @endif
                            </div>
                            <div class="text-white text-[17px] md:text-xl font-bold py-4 font-['Roboto']">
                                @if ($cardclinic)
                                    {{$cardclinic->description}}
                                @endif
                            </div>
                            <a href="{{ url('/doctors') }}" class="text-blue-500 text-[17px] md:text-xl font-normal py-1 font-['Roboto']">استكشف
                            </a>
                        </div>
                        <div class="w-1/4 bg-cover rounded-r-2xl overflow-hidden ml-[-15px]">
                            <img src="{{ asset('src/images/Medicine uniform healthcare medical workers day concept.png') }}"
                                class="object-cover h-full" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24">
        <div class="container">
            <div
                class="bg-cover bg-[url('../images/snack-pastry-board-with-potatoes-water-black-background-top-view.png')] py-10 md:rounded-l-3xl px-8 flex flex-wrap">
                <div class="w-full px-4 my-4 md:w-1/2">
                    <div class="text-white lg:text-[64px] md:text-[40px] text-[30px] font-bold font-main">@lang('message.حمل تطبيقنا')
                        <br>@lang('message.الآن!')
                    </div>
                    <div class="py-6">
                        <span class="text-blue-400 text-4xl font-medium font-['Roboto']">@lang('message.استمتع')</span>
                        <span class="text-white text-4xl font-medium font-['Roboto']">@lang('message.بافضل الدكاتره')</span>
                    </div>
                    <div class="flex items-center">
                        <div class="mx-3">
                            <img src="{{ asset('src/images/apple.png') }}" alt="app store" class="w-full cursor-pointer">
                        </div>
                        <div class="mx-3">
                            <img src="{{ asset('src/images/logo_playstore.png') }}" alt="google play" class="w-full cursor-pointer">
                        </div>
                    </div>
                </div>
                <div class="relative w-full md:w-1/2">
                    <img src="{{ asset('src/images/OnePlusD 10T.png') }}"
                        class="md:absolute lg:top-[-150px] xl:top-[-200px] md:top-[-130px]" alt="InstaOrder">
                </div>
            </div>

        </div>
    </section>
    <footer dir="ltr" class="py-7 bg-[#1F1F1F]">
        <div class="container flex flex-wrap justify-between">
            <div class="w-full my-2 md:w-1/2">
                <img src="{{ asset($info->logo) }}" alt="logo">
            </div>
            <div class="w-full my-2 md:w-1/2">
                <div class="flex items-center">
                    <div class="text-white text-right cursor-pointer text-2xl font-normal font-['Roboto'] mx-2">
                        <a href="{{ url('/contact-us') }}" >
                            Contact us </a>
                    </div>
                    <div class="text-white text-right cursor-pointer text-2xl font-normal font-['Roboto'] mx-2">Follow
                        Us on </div>
                    <div class="flex items-center mx-2">
                        @foreach ($icon as $item)
                            <a href="{{ $item->link }}">
                                <i class="mx-2 text-white cursor-pointer fa-brands {{ $item->classname }}"></i>
                            </a>
                        @endforeach
                        {{--  <i class="mx-2 text-white cursor-pointer fa-brands fa-instagram"></i>  --}}
                    </div>
                </div>
                <div class="flex items-center my-6">
                    <div class="mx-3">
                        <a href="{{ $info->linkAppStore }}"><img src="{{ asset('src/images/apple.png') }}" alt="app store" class="w-full cursor-pointer"></a>
                    </div>
                    <div class="mx-3">
                        <a href="{{ $info->linkPlayStore }}"><img src="{{ asset('src/images/logo_playstore.png') }}" alt="google play" class="w-full cursor-pointer"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('src/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('src/js/flowbite.min.js') }}"></script>
    <script src="{{ asset('src/js/script.js') }}"></script>
</body>

</html>
