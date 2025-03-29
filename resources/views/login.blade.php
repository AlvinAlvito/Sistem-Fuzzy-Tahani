<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas Plus Al Ulum - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/style/login.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="/images/logo.png" alt="logo">
                <h2>Mas Plus Al Ulum</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Prestasi</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <button class="login-btn"><i class="uil uil-signin"></i> Masuk </button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded"><i class="uil uil-multiply"></i></span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Selamat Datang</h2>
                <p>Silakan masukkan akun Anda untuk melanjutkan.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    @if(session('error'))
                        <p class="error-message">{{ session('error') }}</p>
                    @endif
                    <button type="submit"><i class="uil uil-signin"></i> Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const showPopupBtn = document.querySelector(".login-btn");
        const formPopup = document.querySelector(".form-popup");
        const hidePopupBtn = formPopup.querySelector(".close-btn");

        showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
        });

        hidePopupBtn.addEventListener("click", () => showPopupBtn.click());
    </script>
</body>
</html>
