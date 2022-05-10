<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard &mdash; HELPDESK SYSTEM</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/school.svg') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <livewire:styles />

</head>

<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">HELPDESK SYSTEM</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">HLD</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MAIN MENU</li>
                        <li class="{{ setActive('/dashboard') }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @can('tickets.index')
                        <li class="{{ setActive('/tickets') }}">
                            <a class="nav-link" href="{{ route('tickets.index') }}">
                                <i class="fas fa-ticket-alt"></i>
                                <span>Ticket</span>
                            </a>
                        </li>
                        @endcan
                        
                        @can('news.index')
                        <li class="{{ setActive('/news') }}">
                            <a class="nav-link" href="{{ route('news.index') }}">
                                <i class="fas fa-newspaper"></i>
                                <span>News</span>
                            </a>
                        </li>
                        @endcan
                        
                        @can('projects.index')
                        <li class="{{ setActive('/projects') }}">
                            <a class="nav-link" href="{{ route('projects.index') }}">
                                <i class="fas fa-project-diagram"></i>
                                <span>Projects</span>
                            </a>
                        </li> 
                        @endcan

                        @can('customers.index')
                        <li class="{{ setActive('/customers') }}">
                            <a class="nav-link" href="{{ route('customers.index') }}">
                                <i class="fas fa-user-tie"></i>
                                <span>Customers</span>
                            </a>
                        </li> 
                        @endcan

                        @can('slas.index')
                        <li class="{{ setActive('/slas') }}">
                            <a class="nav-link" href="{{ route('slas.index') }}">
                                <i class="fas fa-file-medical-alt"></i>
                                <span>SLA</span>
                            </a>
                        </li> 
                        @endcan

                        @can('permissions.index')
                        <li class="menu-header">SETTING</li>
                        <li class="{{ setActive('/permissions') }}">
                            <a class="nav-link" href="{{route('permissions.index') }}">
                                <i class="fas fa-unlock-alt"></i>
                                <span>Permissions</span> 
                            </a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="{{ setActive('/roles') }}">
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <i class="fas fa-unlock"> </i> 
                                <span>Roles</span> 
                            </a>
                        </li>
                        @endcan
                        @can('users.index')
                        <li class="{{ setActive('/user') }}">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="fas fa-users"></i> 
                                <span>Users</span>
                            </a>
                        </li>
                        @endcan
                        @can('log_users.index')
                        <li class="{{ setActive('/user-log') }}">
                            <a class="nav-link" href="{{ route('userlog.index') }}">
                                <i class="fas fa-list"></i> 
                                <span>User Logs</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div> HELPDESK SYSTEM <div class="bullet"></div> All Rights
                    Reserved.
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    {{-- <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script> --}}

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        //active select2
        // $(document).ready(function () {
        //     $('select').select2({
        //         theme: 'bootstrap4',
        //         width: 'style',
        //     });
        // });

        //flash message
        @if(session()-> has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()-> has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
    </script>

    <livewire:scripts />
</body>
</html>