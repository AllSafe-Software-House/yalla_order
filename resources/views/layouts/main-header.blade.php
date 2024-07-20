<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <div class="" data-toggle="sidebar">
                        <button class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header-left">
            <div class="nav nav-item navbar-nav-left ml-auto">
                <div class="nav-link">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="alert-count">@livewire('notifications-count')</span>
                        <i class='bx bx-bell'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">

                        <p class="text-danger m-3">Notifications</p>
                        @livewire('notifications')
                    </ul>
                </div>
            </div>
        </div>



    </div>
</div>

<!-- /main-header -->
