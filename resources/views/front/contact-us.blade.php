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

</style>

@endsection


@section('header-content')
<div class="container">

    <div class="flex flex-wrap items-center justify-center">
        <div class="w-full px-4 my-4 xl:w-1/2" style="margin-top: 6rem;">
            <div class="p-6 text-center bg-white shadow-xl rounded-2xl">
                <h4 class="text-stone-900 text-[30px] my-2 md:text-[40px] font-bold font-['Roboto']">تواصل معنا
                </h4>
                @if (Session::has('done'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('done') }}
                </div>
            @endif
                @if ($errors->any())
                    <div class="alert alert-primary">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Overlay Element -->
                <div class="overlay" id="overlay"></div>
                <!-- Loader Element -->
                <div class="loader" id="loader"></div>
                <div id="form_text"  ><span class="text-rose-400 text-2xl font-normal font-['Roboto']">هل تحتاج</span><span
                        class="text-blue-500 text-2xl font-normal font-['Roboto']"> لمساعدة؟</span></div>

                <form class="py-5" id="partner-form" method="POST" action="{{ route('contactus') }}">
                    @csrf
                    <input type="text" placeholder="الاسم الاول" id="f_name" name="fname"
                        class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
                    <input type="text" placeholder="الاسم الاخر" id="l_name" name="lname"
                        class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
                    <input type="email" placeholder="البريد الالكتروني للعمل" id="email" name="email"
                        class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
                    <input type="number" placeholder="رقم الهاتف" id="mobile" name="phone"
                        class="w-full px-8 py-4 my-5 border rounded-full outline-none border-slate-500 focus:ring-main focus:border-main focus:outline-none">
                        <textarea id="message" name="message" placeholder="رساله" rows="4" class="w-full px-8 py-4 my-5 border outline-none rounded-xl border-slate-500 focus:ring-main focus:border-main focus:outline-none"></textarea>
                    <button  type="submit"
                        class="w-full bg-main text-white py-3 rounded-full font-bold text-[30px] font-['Roboto']"> تواصل معنا
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
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
                url: "{{ route('contact-us.store') }}",  // Replace with your route
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    f_name: $('#f_name').val(),
                    l_name: $('#l_name').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    message: $('#message').val()
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
