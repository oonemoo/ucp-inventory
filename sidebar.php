<?php
 include 'template/header.php';

?>

<style>
    body {
        height: 100vh;
        width: 100%;
        background-image: url('asset/img/ucp.png');
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; 
    }
    .sidebar {
        height: 100vh;
        width: 15vw;
        background: rgba(229,63,68, 1);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: fixed;
        top: 0; 
        left: 0;
        color: white;
    }
    .sidebar ul li a {
        text-decoration: none;
        color: black; 
        padding: 0px;
        margin: 0px;
        color: white;
    }
    .sidebar ul li a:hover {
        transform: translate(0px, 5px); 
        transition: transform 0.3s ease;
    }
    .sidebar ul li {
        padding: 0px;
        margin: 0px;
        margin-left: 10px;
    }
    .icons ::before {
        color: black;
        padding: 0px;
        margin: 0px;
    }
    .maincontent {
        display: flex;
        flex-direction: row;
        flex: 2;
        width: 85vw;
        height: 100vh;
        margin-left: 15vw;      
    }
    .clickable-button {
        display: block;
        flex-direction: row;
        width: 10vw;
        height: 10vh;
        margin-top: 10px;
        padding: 10px;
    }
      .table-container {
        width: 100%;
        height: 100vh;
        padding: 20px;
        background: rgba(244, 244, 244, 0.9);
        border-radius: 16px;
        box-shadow: 0 0px 0px rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(1px);
        -webkit-backdrop-filter: blur(1px);
    }
    .sidebar ul li {
        margin: 10px 15px 10px 20px;
        font-size: 20px;
    }

    .navicon {
        margin-right: 5px;
    }
    .ucp-logo {
        display: flex;
        margin: 20px;

    }
    .ucp-logo h5 {
        margin-left: 15px;
    }
</style>

<body>

<!-- Sidebar -->
<div class="sidebar">

    <!-- Toggle Icon -->
      <!-- <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
      <div class="bg-dark p-4">
        <h5 class="text-body-emphasis h4">Collapsed content</h5>
        <span class="text-body-secondary">Toggleable via the navbar brand.</span>
      </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav> -->
    
    <!-- Sidebar Content -->
    <div class="ucp-logo">
        <img src="asset/img/UC.png" style="width: 50px; height: 50px;">
        <h5>Universal College Inventory</h5>
    </div>


    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-house navicon"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="inventory.ph"><i class="fa-solid fa-boxes-stacked navicon"></i>Inventory Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-boxes-packing navicon"></i>Supplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-bug navicon"></i>Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-gear navicon"></i>Setting</a>
        </li>
    </ul>
</div>

