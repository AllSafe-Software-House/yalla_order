<nav class="bg-white z-[99999] fixed top-0 w-full border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('src/images/Meal Med.png') }}" alt="logo">
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            {{-- <button type="button"
                class="px-4 py-2 text-sm font-medium text-center text-black bg-transparent border border-black rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تسجيل دخول</button> --}}
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
                        aria-current="page">الرئيسيه</a>
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
                        >اصبح شريك</a>
                </li>
                <li>
                    <a href="{{ url('/contact-us') }}"
                        class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:dark:hover:text-rose-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                        @if (Request::is('contact-us'))
                            style="color: #be143e"
                        @endif
                        > تواصل معنا </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
