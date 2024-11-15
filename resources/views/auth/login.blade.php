<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <script src="{{ asset('assets/js/login.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/images/smkn1cibinong.png') }}" alt="Logo SMK" />
        </div>

        <div class="form-container">
            <!-- Tab Navigation -->
            <div class="tab">
                <button class="tablinks active" onclick="openTab(event, 'Student')">Login Siswa</button>
                <button class="tablinks" onclick="openTab(event, 'Teacher')">Login Walas</button>
            </div>

            <!-- Form Starts Here -->
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <input type="hidden" id="user_type" name="user_type" value="student"> <!-- Initial hidden value set to student -->

                <!-- Student Login Tab -->
                <div id="Student" class="tabcontent" style="display: block;">
                    <h2>Login Siswa</h2>
                    @if (session('error'))
                        <h3>{{ session('error') }}</h3>
                    @endif

                    <div class="floating-label">
                        <input placeholder="NIS" type="text" name="nis" id="nis" autocomplete="off">
                        <label for="nis">NIS</label>
                    </div>

                    <div class="floating-label">
                        <input placeholder="Password" type="password" name="student_password" id="student_password" autocomplete="off">
                        <label for="student_password">Password</label>
                    </div>

                    <button type="submit">LOGIN</button>
                </div>

                <!-- Teacher (Walas) Login Tab -->
                <div id="Teacher" class="tabcontent" style="display: none;">
                    <h2>Login Walas</h2>
                    @if (session('error'))
                        <h3>{{ session('error') }}</h3>
                    @endif

                    <div class="floating-label">
                        <input placeholder="NIG" type="text" name="nig" id="nig" autocomplete="off">
                        <label for="nig">NIG</label>
                    </div>

                    <div class="floating-label">
                        <input placeholder="Password" type="password" name="teacher_password" id="teacher_password" autocomplete="off">
                        <label for="teacher_password">Password</label>
                    </div>

                    <button type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/assets/js/login.js') }}"></script>
</body>
</html>
