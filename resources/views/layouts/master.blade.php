<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4">
    @include('layouts.head')
</head>
<body class="main-body app sidebar-mini">
    <!-- Include main sidebar -->
    @include('layouts.main-sidebar')

    <!-- Main content -->
    <div class="main-content app-content">
        <!-- Include main header -->
        @include('layouts.main-header')

        <!-- Container -->
        <div class="container-fluid">
            <!-- Page header -->
            @yield('page-header')

            <!-- Content -->
            @yield('content')

            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Modals -->
            @include('layouts.models')

            <!-- Footer scripts -->
            @include('layouts.footer-scripts')

            <!-- Main footer -->
            <div class="main-footer ht-40">
                <div class="container-fluid pd-t-0-f ht-100p">
                    <span>Copyright © 2023 <a href="#">Insta Order Dashboard</a>. Developed by
                    <a href="https://www.allsafeeg.com/en">all safe</a>.</span>
                </div>
            </div>
        </div> <!-- End container -->
    </div> <!-- End main content -->
</body>
</html>

