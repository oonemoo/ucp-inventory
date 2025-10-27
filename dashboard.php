<?php include 'sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="asset/css/dashboardstyle.css">
</head>
<body>

<div class="maincontent">

  <div class="box-container">
    <h5>Inventory Overview</h5>
    <canvas id="myChart"></canvas>
  </div>

  <div class="box-container">
    <h5>Quick Actions</h5>
    <div class="quick-actions">
      <button onclick="location.href='add_item.php'">
        <i class="fas fa-plus-circle"></i> Add New Item
      </button>
      <button onclick="location.href='add_supplier.php'">
        <i class="fas fa-user-plus"></i> Add New Supplier
      </button>
      <button onclick="location.href='sales_report.php'">
        <i class="fas fa-chart-line"></i> View Sales Report
      </button>
      <button onclick="location.href='low_stock.php'">
        <i class="fas fa-box-open"></i> Check Low Stock
      </button>
    </div>
  </div>

  <div class="box-container">
    <h5>Recent Activity</h5>

    <p>Showing recent user activity...</p>
  </div>

  <div class="box-container">
    <h5>Stock Level</h5>
    <p>Display stock levels or charts here.</p>
  </div>

</div>

<script>
  const data = {
    labels: ['High Item Stock', 'Low Item Stock', 'Total Supplier', 'Monthly Sales'],
    datasets: [{
      label: 'Inventory Overview',
      data: [200, 50, 100, 75],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(0,255,127)'
      ],
      hoverOffset: 4
    }]
  };

  const config = {
    type: 'doughnut',
    data: data,
  };

  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, config);
</script>

<script>
  $(document).ready(function () {
    $.ajax({
      url: 'log_activity.php',
      type: 'POST',
      data: {
        user_id: 1, 
        action: 'Visited Dashboard',
        page_url: window.location.href
      },
      success: function (response) {
        console.log('Activity logged');
      }
    });
  });
</script>

</body>
</html>
