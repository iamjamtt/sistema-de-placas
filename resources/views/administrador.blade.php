<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="light" data-sidenav-color="light" data-theme="light" data-sidenav-size="default" data-layout-position="fixed" class="menuitem-active" data-sidenav-user="true">

<head>
    <meta charset="utf-8">
    <title>Sistema de Placas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    {{-- <script src="{{ asset('assets/js/hyper-config.js') }}"></script> --}}

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style">

</head>

<body class="show" style="">
    <div class="wrapper">

        <div class="navbar-custom topnav-navbar">
            <div class="container-fluid detached-nav">

                <!-- Topbar Logo -->
                <div class="logo-topbar">
                    <!-- Logo light -->
                    <a href="index.html" class="logo-light">
                        <span class="logo-lg">
                            <img src="assets/images/logo.png" alt="logo" height="22">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="small logo" height="22">
                        </span>
                    </a>

                    <!-- Logo Dark -->
                    <a href="index.html" class="logo-dark">
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-dark-sm.png" alt="small logo" height="22">
                        </span>
                    </a>
                </div>

                <!-- Sidebar Menu Toggle Button -->
                <button class="button-toggle-menu">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- Horizontal Menu Toggle Button -->
                <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>

                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="dropdown notification-list d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Buscar ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="notification-list d-none d-md-inline-block">
                        <a class="nav-link" href="" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            </span>
                            <span>
                                <span class="account-user-name">Dominic Keller</span>
                                <span class="account-position">Founder</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">

                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Topbar Search Form -->
                <div class="app-search dropdown">
                    <form>
                        <div class="input-group">
                            <input type="search" class="form-control dropdown-toggle" placeholder="Buscar..." id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>

                    {{-- <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-notes font-16 me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-life-ring font-16 me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-cog font-16 me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="leftside-menu menuitem-active">

            <!-- Logo Light -->
            <a href="index.html" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="logo" height="22">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo" height="22">
                </span>
            </a>

            <!-- Logo Dark -->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-dark-sm.png" alt="small logo" height="22">
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button type="button" class="bg-transparent button-sm-hover p-0" data-bs-toggle="tooltip"
                data-bs-placement="right" aria-label="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </button>

            <!-- Sidebar -left -->
            <div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <!-- Leftbar User -->
                                    <div class="leftbar-user">
                                        <a href="pages-profile.html">
                                            <img src="assets/images/users/avatar-1.jpg" alt="user-image"
                                                height="42" class="rounded-circle shadow-sm">
                                            <span class="leftbar-user-name">Dominic Keller</span>
                                        </a>
                                    </div>

                                    <!--- Sidemenu -->
                                    <ul class="side-nav">

                                        <li class="side-nav-title side-nav-item">Navigation</li>

                                        <li class="side-nav-item menuitem-active">
                                            <a data-bs-toggle="collapse" href="#sidebarDashboards"
                                                aria-expanded="false" aria-controls="sidebarDashboards"
                                                class="side-nav-link">
                                                <i class="uil-home-alt"></i>
                                                <span class="badge bg-success float-end">5</span>
                                                <span> Dashboards </span>
                                            </a>
                                            <div class="collapse show" id="sidebarDashboards">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="dashboard-analytics.html">Analytics</a>
                                                    </li>
                                                    <li class="menuitem-active">
                                                        <a href="index.html" class="active">Ecommerce</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-projects.html">Projects</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-crm.html">CRM</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-wallet.html">E-Wallet</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="side-nav-title side-nav-item">Apps</li>

                                        <li class="side-nav-item">
                                            <a href="apps-calendar.html" class="side-nav-link">
                                                <i class="uil-calender"></i>
                                                <span> Calendar </span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">

                <div class="container-fluid">

                </div>

            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>2022 © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
