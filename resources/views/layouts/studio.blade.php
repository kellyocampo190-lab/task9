<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Flor Arte</title>
    <link rel="stylesheet" href="{{ asset('vendor/admin-lte-3.2.0/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/studio.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <header class="main-header navbar navbar-expand navbar-white navbar-light">
        <button type="button" class="btn menu-toggle" data-widget="pushmenu" aria-controls="studio-sidebar" aria-label="Toggle studio menu">
            <span class="hamburger" aria-hidden="true"></span>
        </button>
        <time class="ml-auto" datetime="2026-11-07">Saturday, November 7, 2026</time>
    </header>

    <aside id="studio-sidebar" class="main-sidebar sidebar-dark-primary">
        <a class="brand-link" href="{{ route('overview') }}" aria-label="Flor Arte home">
            <span class="brand-monogram" aria-hidden="true">F</span>
            <span class="brand-text">Flor Arte</span>
        </a>
        <div class="sidebar">
            <nav class="mt-3" aria-label="Studio menu">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    @foreach (['overview' => 'Overview', 'orders' => 'Orders', 'pickups' => 'Pickups'] as $name => $label)
                        <li class="nav-item">
                            <a href="{{ route($name) }}" aria-label="{{ $label }}"
                               class="nav-link {{ request()->routeIs($name) ? 'active' : '' }}"
                               @if(request()->routeIs($name)) aria-current="page" @endif>
                                <span class="nav-icon studio-icon icon-{{ $name }}" aria-hidden="true"></span>
                                <p>{{ $label }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </aside>

    <main class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid"><h1>@yield('title')</h1></div>
        </div>
        <section class="content" aria-label="@yield('title')">
            <div class="container-fluid">@yield('content')</div>
        </section>
    </main>

    <footer class="main-footer">
        <strong>Giovanna Ocampo López</strong>
        <span>Web Application Design · Activity 11</span>
    </footer>
</div>
<script src="{{ asset('vendor/jquery-3.7.1/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-4.6.2/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/admin-lte-3.2.0/adminlte.min.js') }}"></script>
</body>
</html>
