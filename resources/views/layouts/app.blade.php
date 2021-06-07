<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
</head>

<body class="c-app">
    {{-- starts Sidebar --}}
    @include('partials.sidebar')
    {{-- End Sidebar --}}

{{-- Starts header --}}
<div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <svg class="c-icon c-icon-lg">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item">
                <a class="c-header-nav-link" href="{{ route('consultation') }}">{{ __('Get Consultation') }}</a>
            </li>
            <li class="c-header-nav-item d-md-down-none mx-2">
                <a class="c-header-nav-link" href="{{ route('welcome') }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                    </svg>
                </a>
            </li>
            <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <svg class="c-icon mr-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </header>
    {{-- end Header --}}

    <div class="c-body">
        <main class="c-main">
            @yield('content')
        </main>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- Popper.js first, then CoreUI JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@yield('scripts')
</body>
</html>
