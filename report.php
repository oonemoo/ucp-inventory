<?php include 'sidebar.php' ?>

    <!-- CSS style-->
    <style>
        .maincontent {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .box-container {
            box-shadow: 0 0 15px 2px whitesmoke;
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
        <h3>Reports</h3>
        <div class="box-container">
            <div class="grid-container grid-item">
                    <header>
                        
                    </header>

                    <section class="overview">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, eius ut at ratione aperiam qui accusamus sapiente magnam, rerum totam sunt quis non, natus tempora vel itaque voluptates nam reprehenderit.</p>
                    </section>

                    <section class="monthly-performance">
                        <canvas id="myLineChart" width="400" height="200"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <!--Line Chart -->
                        <script>
                            const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
                            const data = {
                            labels: labels,
                            datasets: [{
                                label: 'My First Dataset',
                                data: [65, 59, 80, 81, 56, 55, 40],
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }]
                            };

                            const config = {
                            type: 'line',
                            data: data,
                            };

                            const ctx = document.getElementById('myLineChart').getContext('2d');
                            const myLineChart = new Chart(ctx, config);
                        </script>
            
                    </section>

                    <section>
                    
                    </section>
            </div>                    
        </div>
    </div>

</body>
</html>