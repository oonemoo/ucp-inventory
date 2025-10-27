<?php include 'template/header.php'; ?>
</head>

<body>

    <div class="container">
        <form>
            
            <div class="logo">
                <img src="asset/img/UC.png" alt="logo">
            </div>

            
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-email"></label>
                <div class="input-group">
                    <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="username">
                </div>
            </div>

            
           <div class="mb-3">
                <label for="passwordInput" class="form-label"></label>
                <div class="input-group">
                    <input type="password" class="form-control" id="passwordInput" placeholder="password"> 
                </div>
            </div>

            
            <button type="button" class="btn btn-danger">Sign In</button>
            <div class="form-text slink"><a href="#">Forgot password?</a></div>

            <div class="form-text slink">Don't have an account? <a href="signUp.php">Sign Up</a></div>
        </form>
    </div>

    
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
