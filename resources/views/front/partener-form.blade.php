@extends('front.layouts.main')

@section('css')

<style>
    /* Loader CSS */
    .loader {
        border: 16px solid #a99c92; /* Light grey */
        border-top: 16px solid #fb7d7d; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        display: none; /* Hidden by default */
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999; /* Ensure it's above all other elements */
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }


    /* Overlay CSS */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        z-index: 9999; /* Ensure it's above all other elements but below the loader */
        display: none; /* Hidden by default */
    }

    .success-image {
        display: none;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 10000; /* Ensure it's above all other elements */
    }
    .padding-fix{
        padding-top: 100px
    }
</style>

@endsection



{{-- @include('front.layouts.header') --}}
@section('header-content')
<div class="w-full padding-fix px-4 my-4 xl:w-1/2">

    <h1 class="">
        <span class="text-rose-400 text-[35px] md:text-5xl font-bold font-main ">نمِّ عملك التجاري
            <br />عبر الإنترنت مع Insta</span><span
            class="text-blue-500 text-[35px] md:text-5xl font-bold font-['Cabin Condensed']">Order</span><span
            class="text-rose-400 text-[35px] md:text-5xl font-bold font-main">!
        </span>
    </h1>
    <div class="text-white text-[20px] md:text-[32px] font-normal font-['Roboto']">
        @if ($partenerpartone)
            {{ $partenerpartone->title }}
        @endif
    </div>
    <!-- Overlay Element -->
    <div class="overlay" id="overlay"></div>
    <!-- Loader Element -->
    <div class="loader" id="loader"></div>
    <div class="p-6 text-center bg-white shadow-xl rounded-2xl">
        <h4 id="form_text" class="text-stone-900 text-[25px] my-2 md:text-[32px] font-normal font-['Roboto']">عمولة 20%
            لمدة 60 يومًا!
        </h4>
        <form class="py-5" id="partner-form">
            <input type="text" placeholder="الاسم الاول" id="f_name"
                class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
            <input type="text" placeholder="الاسم الاخر" id="l_name"
                class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
            <input type="email" placeholder="البريد الالكتروني للعمل" id="email"
                class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
            <input type="number" placeholder="رقم الهاتف" id="mobile"
                class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">

            {{-- <label for="business" class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">نوع المنشأه</label> --}}
            <select class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none" id="business_type" name>
                    <option value="">اختر نوع المشأه</option>
                    <option value="restaurantes">مطعم</option>
                    <option value="clinic">صيدليه</option>

            </select>

            {{-- <input type="hidden" id="business_type" value="restaurantes"> --}}
            <button id="submit-btn" type="button"
                class="w-full bg-main text-white py-3 rounded-full font-bold text-[30px] font-['Roboto']">انشاء
                حساب</button>
        </form>
    </div>
</div>
<div class="hidden w-full px-4 my-4 xl:w-1/2 xl:block">
    <img src="{{ asset('/src/images/Group 1171276211.png') }}" class="w-full" alt="food" />
</div>
@endsection
@section('content')

<section class="py-20">
    <div class="py-5 section-text">
        <h2 class="text-center">
            <span class="text-3xl font-bold text-stone-900 md:text-5xl font-main">لماذا يجب عليك</span>
            <span class="text-3xl font-bold text-rose-400 md:text-5xl font-main">التعاون معنا</span>
        </h2>
    </div>
    <div class="container">
        <div class="slider rounded-2xl bg-[#1F1F1F] overflow-hidden z-[-1] py-10 relative px-2">
            <img src="{{ asset('/src/images/Group 1171276175 2.png') }}" class="absolute hidden z-[-1] md:block right-0 bottom-0"
                alt="frame" />
            <div class="flex flex-wrap">
                @if ($resones)
                    @foreach ($resones as $data)
                        <div class="w-full px-4 my-4 md:w-1/3">
                            <div class="text-center">
                                <img src="{{ asset($data->image) }}" alt="magnet" class="mx-auto my-4 text-center">
                                <h4 class="text-center text-rose-400 text-[20px] md:text-[32px] font-medium font-['Roboto']">
                                    {{ $data->title }}
                                </h4>
                                <p class="text-center text-white my-2 text-[20px] md:text-[25px] font-normal font-['Roboto']">
                                    {{ $data->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<section class="relative py-20">
    <img src="{{ asset('/src/images/Group 1171276403.png') }}" alt="frame" class="absolute bottom-0 z-[-1] left-0">
    <div class="py-5 section-text">
        <h2 class="text-center">
            <span class="text-5xl font-bold text-stone-900 font-main">كيف سنعمل </span><span
                class="text-5xl font-bold text-rose-400 font-main">معًا </span><span
                class="text-5xl font-bold text-blue-500 font-main">سويًا</span>
        </h2>
    </div>
    <div class="container">

        <div class="flex flex-wrap">
            <div class="w-full px-4 my-4 md:w-1/2">
                <div>
                    <img src="{{ asset('/src/images/amico.png') }}" alt="app" class="mx-auto my-5">
                    <h4 class="text-center">
                        <span class="text-rose-400 text-[25px] md:text-3xl font-normal font-['Roboto']">طلبات
                            العملاء
                            <br /></span>
                        <span class="text-stone-900 text-[18px] md:text-2xl font-normal font-['Roboto']">يقوم العميل
                            بتقديم طلب أو حجز استشارة عبر التطبيق.</span>
                    </h4>
                </div>
            </div>
            <div class="w-full px-4 my-4 md:w-1/2">
                <div>
                    <img src="{{ asset('/src/images/Pizza maker-rafiki 1.png') }}" alt="app" class="mx-auto my-5">
                    <h4 class="text-center">
                        <span class="text-rose-400 text-[25px] md:text-3xl font-normal font-['Roboto']">أنت تحضر
                            <br /></span>
                        <span class="text-stone-900 text-[18px] md:text-2xl font-normal font-['Roboto']">ستتلقى
                            إشعارًا لبدء تحضير طلبك أو الاستشارة.</span>
                    </h4>
                </div>
            </div>
            <div class="w-full px-4 my-4 md:w-1/2">
                <div>
                    <img src="{{ asset('/src/images/delivery.png') }}" alt="app" class="mx-auto my-5">
                    <h4 class="text-center">
                        <span class="text-blue-500 text-[25px] md:text-3xl font-normal font-['Roboto']">نحن نوصل
                            <br /></span>
                        <span class="text-stone-900 text-[18px] md:text-2xl font-normal font-['Roboto']">سوف يأتي
                            السائق قريبًا لاستلام الطلب وتوصيله إلى العميل &<br />الوصول في الوقت المناسب لاستشارتك
                            الطبية.</span>
                    </h4>
                </div>
            </div>
            <div class="w-full px-4 my-4 md:w-1/2">
                <div>
                    <img src="{{ asset('/src/images/bussnis.png') }}" alt="app" class="mx-auto my-5">
                    <h4 class="text-center">
                        <span class="text-blue-500 text-[25px] md:text-3xl font-normal font-['Roboto']">شاهد نمو
                            عملك
                            <br /></span>
                        <span class="text-stone-900 text-[18px] md:text-2xl font-normal font-['Roboto']">تتبع
                            مبيعاتك، راقب الطلبات، حجوزات العيادة، جداول المواعيد، استثمر في التسويق والمزيد في
                            بوابة مطعمك وعيادتك الشخصية.</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('here we go');
        $('#submit-btn').click(function(e) {
            console.log('here we go again');
            e.preventDefault();
            $('#overlay').show();
            $('#loader').show();

            $.ajax({
                url: "{{ route('resturants-requests.store') }}",  // Replace with your route
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    f_name: $('#f_name').val(),
                    l_name: $('#l_name').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    business_type: $('#business_type').val()
                },
                success: function(response) {
                    $('#overlay').hide();
                    $('#loader').hide();
                    if(response.success) {
                        $('#partner-form').hide();
                        $('#success-message').show();
                        $('#success-image').show();
                        $('#form_text').text('تم إرسال طلبك بنجاح');


                    }
                },
                error: function(response) {
                    // Handle validation errors
                    console.log('here we go again ya nass');
                    $('#overlay').hide();
                    $('#loader').hide();
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        // Clear previous error messages
                        $('.error-message').remove();
                        // Display new error messages
                        for(let field in errors) {
                            let errorMessages = errors[field].join(', ');
                            $(`#${field}`).after(`<span class="text-danger error-message" style="color:red">${errorMessages}</span>`);
                        }
                    }
                }
            });
        });
    });
</script>
@endsection
