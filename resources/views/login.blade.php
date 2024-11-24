<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Login & Signup Form | CodingNepal</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="/style/login.css">
    
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="images/logo.jpg" alt="logo">
                <h2>CodingNepal</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Prestasi</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <a href="/admin" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit">Log In</button>
                </form>
            </div>
        </div>

    </div>
    <script>
        // Login
        const navbarMenu = document.querySelector(".navbar .links");
        const hamburgerBtn = document.querySelector(".hamburger-btn");
        const hideMenuBtn = navbarMenu.querySelector(".close-btn");
        const showPopupBtn = document.querySelector(".login-btn");
        const formPopup = document.querySelector(".form-popup");
        const hidePopupBtn = formPopup.querySelector(".close-btn");
        const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

        // Show mobile menu
        hamburgerBtn.addEventListener("click", () => {
            navbarMenu.classList.toggle("show-menu");
        });

        // Hide mobile menu
        hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());

        // Show login popup
        showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
        });

        // Hide login popup
        hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

        // Show or hide signup form
        signupLoginLink.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
            });
        });
    </script>
</body>
</html>