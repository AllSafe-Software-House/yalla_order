<!-- main-sidebar -->
<div class="" data-toggle="sidebar" style="color:read;">menue</div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('dashboard') }}">Insta Order Dashboard</a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="row">
                    <div class="col-6">
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::User()->name }}</h4>
                            <span class="mb-0 text-muted">{{ Auth::User()->email }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-info">
                            <i class="fas fa-times close-sidebar" data-toggle="sidebar"></i>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" href=""><svg xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">Dashbord Home</span></a>
            </li>
            @php
                $user = Auth::user();
                $admin = \App\Models\Admin::where('user_id', $user->id)->first();
                $placeid = $admin->place_id;
            @endphp
            @if ($placeid != null)
                @can('showMenu')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('menulist',$placeid) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                                <path
                                    d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                            </svg><span class="side-menu__label">Show Menu</span>
                        </a>
                    </li>
                @endcan
                @can('showDoctor')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('doctorlist',$placeid) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                                <path
                                    d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                            </svg><span class="side-menu__label">Show Doctores</span>
                        </a>
                    </li>
                @endcan
                @can('ChangeStatus')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('change_statuspage',$placeid) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                                <path
                                    d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                            </svg><span class="side-menu__label">Change Status The Place</span>
                        </a>
                    </li>
                @endcan
            @endif
            @can('showResturant')
                <li class="side-item side-item-category">Resturants</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ route('dashboard') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Resturants</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('resturantRequest') }}"> Resturants Requests</a></li>
                        <li><a class="slide-item" href="{{ route('resturantlist') }}">List Resturants</a></li>
                    </ul>
                </li>
            @endcan
            @can('showClinic')
                <li class="side-item side-item-category">Clinic</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ route('dashboard') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Clinic</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('cliniclist') }}">List Clinic</a></li>
                    </ul>
                </li>
            @endcan
            @can('showCategory')
                <li class="side-item side-item-category">Category</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ route('categorylist') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                        </svg><span class="side-menu__label">Category</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('categorylist') }}">Category Resturant List</a></li>
                        <li><a class="slide-item" href="{{ route('categorycliniclist') }}">Category Clinic List</a></li>
                    </ul>
                </li>
            @endcan
            @can('showProduct')
                <li class="side-item side-item-category">Products</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ route('productlist') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                        </svg><span class="side-menu__label">Products</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('showProduct')
                            <li><a class="slide-item" href="{{ route('productlist') }}">Products List</a></li>
                        @endcan
                        @can('showAddon')
                            <li><a class="slide-item" href="{{ route('addtionlist') }}">Addtion List</a></li>
                        @endcan
                        @can('showSize')
                            <li><a class="slide-item" href="{{ route('sizelist') }}">Size List</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('updateAboutUS')
                <li class="side-item side-item-category">Content LandingPge && App Aboutus</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href=""><svg xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24">
                            <g>
                                <rect fill="none" />
                            </g>
                            <g>
                                <g />
                                <g>
                                    <path
                                        d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                    <path
                                        d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                        opacity=".3" />
                                    <g>
                                        <path
                                            d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                                        <path
                                            d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                                    </g>
                                    <path
                                        d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                                </g>
                            </g>
                        </svg><span class="side-menu__label">Content About US Page</span>
                    </a>
                    <ul class="slide-menu">
                        @can('updateAboutUS')
                            <li><a class="slide-item" href="{{ route('aboutus') }}">About US</a></li>
                        @endcan
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href=""><svg xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24">
                            <g>
                                <rect fill="none" />
                            </g>
                            <g>
                                <g />
                                <g>
                                    <path
                                        d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                    <path
                                        d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                        opacity=".3" />
                                    <g>
                                        <path
                                            d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                                        <path
                                            d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                                    </g>
                                    <path
                                        d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                                </g>
                            </g>
                        </svg><span class="side-menu__label">Landing Page</span>
                    </a>
                    <ul class="slide-menu">
                        @can('updateAboutUS')
                            <li><a class="slide-item" href="{{ route('generalinfo') }}">General information</a></li>
                            <li><a class="slide-item" href="{{ route('partone') }}">Home Food Page Part One</a></li>
                            <li><a class="slide-item" href="{{ route('partoneclinic') }}">Home Clinic Page Part One</a></li>
                            <li><a class="slide-item" href="{{ route('parttwo') }}">Home Food Page Part Two</a></li>
                            <li><a class="slide-item" href="{{ route('parttwoclinic') }}">Home Clinic Page Part Two</a></li>
                            <li><a class="slide-item" href="{{ route('cardfood') }}">Home Page Card Food</a></li>
                            <li><a class="slide-item" href="{{ route('cardclinic') }}">Home Page Card Clinic</a></li>
                            <li><a class="slide-item" href="{{ route('partenerpartone') }}">Partener Us Page Partone</a></li>
                            <li><a class="slide-item" href="{{ route('resonlist') }}">Why cooperate with us ?</a></li>
                            <li><a class="slide-item" href="{{ route('resonsteplist') }}">How work together ?</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('showPromoCode')
            <li class="side-item side-item-category">Promo Code</li>
                <li class="slide">
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('promocodelist') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">Add Promo Code</span>
                    </a>
                </li>
            @endcan

            @can('showClinicPromoCode')
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('promocodelistclinic') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">Add Promo Code Clinic</span>
                    </a>
                </li>
            @endcan
            @can('showAllOrder')
                <li class="side-item side-item-category">All Orders</li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('listorderall') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">List All Orders</span>
                    </a>
                </li>
            @endcan
            @can('trackorder')
                <li class="side-item side-item-category">Track Orders</li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('ordertracklist') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">List Orders for Track</span>
                    </a>
                </li>
            @endcan
            @can('listReservation')
                <li class="side-item side-item-category">Reservation</li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('reservation') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">List Reservation</span>
                    </a>
                </li>
            @endcan
            @can('listTransaction')
                <li class="side-item side-item-category">List Transaction</li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('transactionlist') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">List Transaction</span>
                    </a>
                </li>
            @endcan
            @can('showUser')
                <li class="side-item side-item-category">Users</li>
            @endcan
            @can('showUser')|| @can('showRole')
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                                <path
                                    d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                            </svg><span class="side-menu__label">Users</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            @can('showUser')
                                <li><a class="slide-item" href="{{ route('userslist') }}">Users List</a></li>
                                <li><a class="slide-item" href="{{ route('adminlist') }}">Admin List</a></li>
                            @endcan
                            @can('showRole')
                                <li><a class="slide-item" href="{{ route('rolelist') }}">Roles</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            @endcan
            @can('showContactUS')
                <li class="side-item side-item-category">ContactUs</li>
                <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href=""><svg xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24">
                        <g>
                            <rect fill="none" />
                        </g>
                        <g>
                            <g />
                            <g>
                                <path
                                    d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                <path
                                    d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                    opacity=".3" />
                                <g>
                                    <path
                                        d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                                    <path
                                        d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                                </g>
                                <path
                                    d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                            </g>
                        </g>
                    </svg><span class="side-menu__label">ContactUs</span>
                </a>
                <ul class="slide-menu">
                    @can('showContactUS')
                        <li><a class="slide-item" href="{{ route('listcontactus') }}">Contact US for Resturant</a></li>
                    @endcan
                    @can('showContactUS')
                        <li><a class="slide-item" href="{{ route('listcliniccontactus') }}">Contact US for Clinic</a></li>
                    @endcan
                </ul>
                </li>
            @endcan


            <li class="side-item side-item-category">Setting profile</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                        <path
                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                    </svg><span class="side-menu__label">Profile</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('logout') }}">logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
