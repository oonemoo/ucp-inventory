<?php
 include 'template/header.php';

?>

<body>

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
    

    <div class="ucp-logo">
        <img src="asset/img/UC.png" style="width: 50px; height: 50px;">
        <h5>Universal College Inventory</h5>
    </div>


    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house navicon"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="inventory.php"><i class="fa-solid fa-boxes-stacked navicon"></i>Inventory Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="supplier.php"><i class="fa-solid fa-boxes-packing navicon"></i>Supplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="report.php"><i class="fa-solid fa-bug navicon"></i>Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-gear navicon"></i>Setting</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </li>
    </ul>
</div>

