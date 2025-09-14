<?php include 'sidebar.php' ?>

<style>
    .maincontent {
        display: flex;
        flex-direction: column; 
        padding: 20px; 
    }

    h5 {
        margin-bottom: 20px; 
    }

    .box-container {
        box-shadow: 0px 0px 15px 2px whitesmoke;
        backdrop-filter: blur(12px) saturate(180%);
        -webkit-backdrop-filter: blur(12px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.44);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);
        padding: 20px; 
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr; 
        gap: 20px; 
    }
</style>

<div class="maincontent">
    <h5>Admin</h5>
    <div class="grid-container">
        
        <div class="box-container grid-item">
            <canvas id="myChart" width="400" height="200"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                const myChart = new Chart(ctx, config);
            </script>
        </div>

        <div class="box-container grid-item">
            <h5>Quick Actions</h5>
        </div>
        
        <div class="box-container grid-item">
            <h5>Recent Activity</h5>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="js/activity.js"></script>
            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: 'log_activity.php',
                        type: 'POST',
                        data: {
                            user_id: 1, // Replace with dynamic user ID
                            action: 'Visited Dashboard',
                            page_url: window.location.href
                        },
                        success: function(response) {
                            console.log('Activity logged');
                        }
                    });
                });
            </script>
        </div>

        <div class="box-container grid-item">
            <h5>Stock Level</h5>
        </div>
    </div>
</div>

</body>
</html>