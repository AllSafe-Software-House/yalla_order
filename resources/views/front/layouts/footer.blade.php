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
