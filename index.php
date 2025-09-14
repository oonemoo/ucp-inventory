<?php include 'template/header.php'; ?>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 100%;
        background-image: url('asset/img/ucp.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px; /* spacing between logo and form */
        padding: 20px;
        background-color: rgba(255, 255, 255, 0); /* transparent container background */
    }
    .logo img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
    form {
        padding: 20px;
        width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        background: rgba(244, 244, 244, 0.9);
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(1px);
        -webkit-backdrop-filter: blur(1px);
        color: rgb(13, 19, 23);
        box-shadow: 0px 0px 15px 2px black;
    }
    form .mb-3 {
        width: 100%;
    }
    form label {
        font-weight: bold;
    }

    button {
        width: 100%;
        height: 45px;
        margin-top: 10px;
        border-radius: 50px;
    }

    .slink {
        font-size: 0.9rem;
        text-align: center;
    }

    .slink a {
        text-decoration: none;
        color: #007bff;
    }

    .slink a:hover {
        text-decoration: underline;
    }
    span .fa-eye-slash {
        align-items: left;
    }
</style>

</head>

<body>
<!-- Form -->
    <div class="container">
        <form>
            <!-- Logo -->
            <div class="logo">
                <img src="asset/img/UC.png" alt="logo">
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-email"></label>
                <div class="input-group">
                    <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="username">
                </div>
            </div>

            <!-- Password -->
           <div class="mb-3">
                <label for="passwordInput" class="form-label"></label>
                <div class="input-group">
                    <input type="password" class="form-control" id="passwordInput" placeholder="password"> 
                </div>
            </div>

            <!-- Sign In button -->
            <button type="button" class="btn btn-danger">Sign In</button>
            <div class="form-text slink"><a href="#">Forgot password?</a></div>

            <div class="form-text slink">Don't have an account? <a href="signUp.php">Sign Up</a></div>
        </form>
    </div>

    <!-- Javascript Internal -->
    <script>
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('passwordInput');

        toggle.addEventListener('click', () => {
        const isPasswordHidden = password.getAttribute('type') === 'password';

        password.setAttribute('type', isPasswordHidden ? 'text' : 'password');
        toggle.classList.remove(isPasswordHidden ? 'fa-eye-slash' : 'fa-eye');
        toggle.classList.add(isPasswordHidden ? 'fa-eye' : 'fa-eye-slash');
        });
    </script>

</body>

</html>
