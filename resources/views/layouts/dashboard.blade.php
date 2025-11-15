<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard - Smartnesa')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/aos/aos.css') }}">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        }

        .sidebar-header {
            padding: 30px 20px 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-header small {
            color: #6c757d;
            font-size: 13px;
        }

        .sidebar-header .user-name {
            font-size: 18px;
            font-weight: 700;
            color: #212529;
            margin-top: 5px;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #495057;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a i {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
        }

        .sidebar-menu a:hover {
            background: #f8f9fa;
            color: #4361ee;
        }

        .sidebar-menu a.active {
            background: #e7f0ff;
            color: #4361ee;
            border-left-color: #4361ee;
            font-weight: 600;
        }

        .main-content {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 0;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
       @include(get_sidebar())

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/aos/aos.js') }}"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

    @stack('scripts')
</body>
</html>
