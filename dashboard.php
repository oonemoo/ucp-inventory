<?php include 'sidebar.php' ?>

    <!-- CSS Style -->
     <style>
        .maincontent {
            display: flex;
        }
     </style>

    <!-- Main content-->
    <div class="maincontent">
            <h5>Admin</h5>
        
            <!-- Doughnut Chart Graph and its Canvas -->
            <div class="grid-container">
                    <section class="grid-item">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </section>

                <!-- Chart JS CDN -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Doughnut Chart Script -->
                <script>
                    const data = {
                    labels: [
                        'High Item Stock',
                        'Low Item Stock',
                        'Total Supplier',
                        'Monthly Sales'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
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
                    /* ctx = the canvas context you just grabbed. The 2D space where Chart.js will draw*/
                    const myChart = new Chart(ctx, config);
                    /* myChart = the Chart.js instance you just created. The chart itself created from ctx + config */

                </script>

            <!-- Quick Action -->
            <section class="grid-item">
                <h5>Quick Actions</h5>
            </section>
            
            <!-- Recent Activity -->
            <section class="grid-item">
                <h5>Stock Level</h5>
            </section>

                <!-- -->
            <section class="grid-item">

            </section>

        </div>
    </div>

</body>

</html>