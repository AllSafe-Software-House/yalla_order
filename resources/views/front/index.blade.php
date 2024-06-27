@extends('front.layouts.main')
@section('header-content')
<div class="w-full px-4 my-4 md:w-1/2">
    <h1 class="font-main text-center text-white text-[50px] md:text-start my-8 md:text-[64px]">
        @if ($partone)
            {{ $partone->title }}
        @endif
    </h1>
    {{-- <div class="relative input">
        <i class="fa-solid fa-location-dot absolute right-3 top-1/2 text-[#ddd] -translate-y-1/2"></i>
        <input type="text" placeholder="ابحث عن موقعك.."
            class="w-full px-8 py-4 rounded-full outline-none" />
        <button
            class="absolute px-4 py-2 text-white -translate-y-1/2 rounded-full outline-none bg-main left-2 top-1/2">
            ابحث
        </button>
    </div> --}}
    </div>
    <div class="w-full px-4 my-4 md:w-1/2">
        <img src="{{ asset('src/images/Group 1171276423.png') }}" class="w-full" alt="food" />
    </div>
@endsection
@section('content')
    <section dir="rtl">
        <div class="container">
            <div class="bg-white md:mt-[-100px] shadow-2xl rounded-2xl flex flex-wrap py-5 px-7">
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('/src/images/Group 1171276204.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            @lang('message.توصيل') <br />
                            @lang('message.سريع')
                        </p>
                    </div>
                </div>
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('/src/images/Component 8.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            @lang('message.خصم') <br />
                            @lang('message.يومي')
                        </p>
                    </div>
                </div>
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('/src/images/Component 9.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            100+ <br />
                            @lang('message.مطاعم')
                        </p>
                    </div>
                </div>
                <div class="w-1/2 px-5 my-5 lg:w-1/4">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('/src/images/Component 10.png') }}" alt="fast" />
                        <p class="font-bold mx-3 text-[18px]">
                            100+ <br />
                            @lang('message.المطابخ')
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
                    <div class="text-rose-900 text-[40px] md:text-5xl font-bold font-main">
                        @if ($parttwo)
                            {{ $parttwo->title }}
                        @endif
                    </div>
                    <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        @if ($parttwo)
                            {{ $parttwo->description }}
                        @endif
                        {{--  <span class="text-stone-900 text-[40px] font-bold font-['Roboto']">عملائنا وزبائننا</span>  --}}
                    </div>
                    {{--  <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
                        سجل أو قم بتسجيل الدخول في بوابتنا
                    </div>
                    <div class="text-stone-900 text-[30px] md:text-[32px] font-bold font-['Roboto']">
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
                    <img src="{{ asset('/src/images/Group 1171276508.png') }}" class="w-full" alt="burger" />
                </div>
            </div>
        </div>
    </section>
    <section class="py-24">
        <div class="container">
            <div class="slider rounded-2xl bg-[#1F1F1F] py-10 relative px-2">
                <img src="{{ asset('/src/images/Group 1171276175 2.png') }}" class="absolute bottom-0 right-0 hidden md:block"
                    alt="frame" />
                <h3 class="font-main text-center py-4 md:text-[45px] text-[30px] text-white">
                    @lang('message.المأكولات المفضلة للعملاء')
                </h3>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                            <img src="{{ asset('/src/images/burger.png') }}" class="mx-auto my-4" alt="burger" />
                            <h4 class="text-[24px]">@lang('message.برجر')</h4>
                        </div>
                        <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                            <img src="{{ asset('/src/images/fast food 1.png') }}" class="mx-auto my-4" alt="burger" />
                            <h4 class="text-[24px]">@lang('message.بيتزا')</h4>
                        </div>
                        <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                            <img src="{{ asset('/src/images/sushi.png') }}" class="mx-auto my-4" alt="burger" />
                            <h4 class="text-[24px]">@lang('message.صيني')</h4>
                        </div>
                        <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                            <img src="{{ asset('/src/images/Group.png') }}" class="mx-auto my-4" alt="burger" />
                            <h4 class="text-[24px]">@lang('message.بطاطس')</h4>
                        </div>
                        <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                            <img src="{{ asset('/src/images/donut.png') }}" class="mx-auto my-4" alt="burger" />
                            <h4 class="text-[24px]">@lang('message.حلويات')</h4>
                        </div>
                        <div class="swiper-slide border border-white text-center rounded-xl text-white bg-[#1F1F1F]">
                            <img src="{{ asset('/src/images/Hot Dog.png') }}" class="mx-auto my-4" alt="burger" />
                            <h4 class="text-[24px]">@lang('message.ساندويتش')</h4>
                        </div>
                    </div>
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
                        <span class="text-rose-400 text-4xl font-bold font-['Roboto']">@lang('message.ماذا')
                        </span>
                        <span class="text-white text-4xl font-medium font-['Roboto']">@lang('message.تنتظر ؟')</span>
                    </div>
                </div>
                <div class="my-20 text-center">
                    <a href="{{ url('/become-partner') }}" class="bg-white text-slate-900 px-16 rounded-full py-2 text-[30px]">
                        @lang('message.تسجيل الدخول كـ شريك')
                    </a>
                </div>
            </div>
            <div class="hidden xl:w-1/3 xl:block">
                <img src="{{ asset('/src/images/Group 1171276286.png') }}" class="w-100 ml-[-230px]" alt="pizza">
            </div>
        </div>
    </section>
    <section class="relative py-24 " dir="ltr">
        <img src="{{ asset('/src/images/Group 1171276175 1.png') }}" class="absolute top-[-270px] z-[-1] left-0" alt="frame">
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
                            <a href="{{ url('/') }}" class="text-rose-400 text-[17px] md:text-xl font-normal py-1 font-['Roboto']">@lang('message.استكشف')
                            </a>
                        </div>
                        <div class="w-1/4 bg-cover rounded-r-2xl overflow-hidden ml-[-15px]">
                            <img src="{{ asset('/src/images/unsplash_LV2p9Utbkbw.png') }}" class="object-cover h-full" alt="">
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
                            <a href="{{ url('/doctors') }}" class="text-blue-500 text-[17px] md:text-xl font-normal py-1 font-['Roboto']">@lang('message.استكشف')
                            </a>
                        </div>
                        <div class="w-1/4 bg-cover rounded-r-2xl overflow-hidden ml-[-15px]">
                            <img src="{{ asset('/src/images/Medicine uniform healthcare medical workers day concept.png') }}"
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
                        <span class="text-rose-400 text-4xl font-medium font-['Roboto']">@lang('message.استمتع')</span>
                        <span class="text-white text-4xl font-medium font-['Roboto']">@lang('message.بأفضل الوجبات')</span>
                    </div>
                    <div class="flex items-center">
                        <div class="mx-3">
                            <img src="{{ asset('/src/images/apple.png') }}" alt="app store" class="w-full cursor-pointer">
                        </div>
                        <div class="mx-3">
                            <img src="{{ asset('/src/images/logo_playstore.png') }}" alt="google play" class="w-full cursor-pointer">
                        </div>
                    </div>
                </div>
                <div class="relative w-full md:w-1/2">
                    <img src="{{ asset('/src/images/OnePlus 10T.png') }}"
                        class="md:absolute lg:top-[-150px] xl:top-[-200px] md:top-[-130px]" alt="yallaOrder">
                </div>
            </div>

        </div>
    </section>
@endsection
