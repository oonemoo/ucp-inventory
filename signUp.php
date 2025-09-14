<?php
 include 'template/header.php';

?>

<style>
     body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; 
            height: 100vh; 
            width: 100%; 
            background-image: url('asset/img/ucp.png');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; 
        }
        form {
            padding: 20px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(244, 244, 244, 0.9);
            border-radius: 16px;
            box-shadow: 0 0px 0px rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(1px);
            color: rgb(13, 19, 23); 
            box-shadow: 0px 0px 15px 2px black;
        }
</style>

</head>

<body>
    <form action="">
        <div class="d-flex flex-column mb-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-email">First Name</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Last Name</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email Address</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

         <!-- Sign Up button-->
        <button type="button" class="btn btn-danger">Sign Up</button>
        <div id="emailHelp" class="form-text">Already have an account? <a href="index.php">Sign In</a> </div>
    
    </form>
</body>
</html>