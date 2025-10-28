<?php include 'sidebar.php' ?>

    <link rel="stylesheet" href="asset/css/report.css">

    <div class="maincontent">
        <h3>Reports</h3>

            <div class="grid-container grid-item">
                    <header>
                        
                    </header>

                    <div class="box-container grid-item item-1">
                        <section class="overview">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, eius ut at ratione aperiam qui accusamus sapiente magnam, rerum totam sunt quis non, natus tempora vel itaque voluptates nam reprehenderit.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae explicabo commodi rerum pariatur quis omnis vitae, atque libero numquam voluptate nihil quo, voluptates quidem. Veritatis doloribus nam natus accusamus deleniti.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae explicabo commodi rerum pariatur quis omnis vitae, atque libero numquam voluptate nihil quo, voluptates quidem. Veritatis doloribus nam natus accusamus deleniti.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae explicabo commodi rerum pariatur quis omnis vitae, atque libero numquam voluptate nihil quo, voluptates quidem. Veritatis doloribus nam natus accusamus deleniti.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae explicabo commodi rerum pariatur quis omnis vitae, atque libero numquam voluptate nihil quo, voluptates quidem. Veritatis doloribus nam natus accusamus deleniti.</p>
                        </section>
                    </div>
  
                    <div class="box-container grid-item item-2">
                        <section class="low-stock-performance">
                                <canvas id="myBarChart" width="400" height="200"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <!--Bar Chart -->
                                <script>
                                    const label = ['PC', 'Keyboard', 'Mouse', 'Speaker', 'Headphone', 'HDMI', 'VGA'];
                                    const details = {
                                    labels: label,
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 205, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 159, 64)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)',
                                        'rgb(54, 162, 235)',
                                        'rgb(153, 102, 255)',
                                        'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                    }]
                                    };
                                    
                                    const form = {
                                    type: 'bar',
                                    data: details,
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    },
                                    };

                                    const cty = document.getElementById('myBarChart').getContext('2d');
                                    const myBarChart = new Chart(cty, form);
                                </script>  
                        </section>
                    </div>

                    <div class="box-container grid-item item-3">
                        <section class="list">

                        </section>
                    </div>
                    
                    <div class="box-container grid-item item-4">
                        <section class="monthly-performance">
                            <canvas id="myLineChart" width="400" height="200"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <!--Line Chart -->
                            <script>
                                const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
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

                    </div>
                    
                    <div class="box-container grid-item item-5"></div>
                </div>
            </div>                    
    </div>

</body>
</html>