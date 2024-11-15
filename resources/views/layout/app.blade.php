<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/smkn1cibinong.png') }}" type="image/jpeg">
</head>
<body>
<header>
    <img class="header-image" src="{{ asset('assets/images/smkn1cibinong.png') }}" alt="SMK NICI Binong">
    <img class="banner" src="{{ asset('assets/images/smkhebat.jpg') }}" alt="SMK NICI Binong">
 
</header>



<div class="main-container">
    <aside class="sidebar">
        @if (session('user_type') === 'teacher')
            <ul>
                <li>
                    <a href="/teacher" class="{{ request()->is('teacher') || request()->is('teacher/edit') || request()->is('teacher/view/active') ? 'active' : '' }}">List Raport</a>
                </li>
                <li>
                    <a href="/teacher/create" class="{{ request()->is('teacher/create') ? 'active' : '' }}">Input Raport</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" style="display: inline; width: 100%;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        @elseif (session('user_type') === 'student')
            <ul>
                <li>
                    <a href="/student" class="{{ request()->is('student') ? 'active' : '' }}">Nilai Raport</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" style="display: inline; width: 100%;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        @else
            <p>Silakan login untuk mengakses sistem.</p>
        @endif
    </aside>

    <main class="content">
        <div class="main">
        <div class="welcome">
    <div class="pages">
        @if (request()->is('teacher') || request()->is('teacher/edit'))
            rekap nilai
        @elseif (request()->is('teacher/create'))
            Input Raport
        @elseif (request()->is('student'))
            Nilai Raport
        @else
         nilai siswa
        @endif
    </div>

    <div class="greet">Welcome, {{ session('username') }}</div>
</div>
            @yield('content')
        </div>
    </main>
</div>

<footer class="footer">
    <p>© 2024 E-RAPOR LSP. Created by <a href="" class="link-copy" target="_blank">lsp</a>. All rights reserved.</p>
</footer>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
