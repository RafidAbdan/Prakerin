<?php
require'connect.php';
$data = mysqli_query($konek, "SELECT produk FROM tb_penjualan GROUP BY produk ");
$penjualan =mysqli_query($konek,"SELECT SUM(jumlah) AS sold FROM tb_penjualan GROUP BY produk");
$tabel = query("SELECT * FROM tb_penjualan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./asset/style.css">
    <!-- icon box -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-store-alt nav_logo-icon' ></i>
                    <span class="nav_logo-name">Telkom <br>Elektronik</span> 
                </a>
                <div class="nav_list"> 
                    <a href="index.php" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="stock.php" class="nav_link"> 
                        <i class='bx bx-cabinet nav_icon'></i>
                        <span class="nav_name">Stock</span> 
                    </a>  
                    <a href="order.php" class="nav_link"> 
                        <i class='bx bx-basket nav_icon'></i> 
                        <span class="nav_name">Ordering</span> 
                    </a>
                    
                </div>
            </div> 
        </nav>
    </div>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- custom js style -->
    <script src="./asset/style.js"></script>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Dashboard</h4><br>
        <h5>Hi, Welcome!!</h5>
        <br><br>
        <h2 class="judul2">Sales Chart</h2>
        <div class="chartdashboard">
            <div class="chartbox">
                <canvas id="lineChart" ></canvas>
            </div>
            <div class="tb-chart">
                <h4 class="judul1">Sales Data</h4>
            <table class="tabel-dashboard" >
                <tr>
                    <th class="th-dashboard">No</th>
                    <th class="th-dashboard">Date</th>
                    <th class="th-dashboard">Product</th>
                    <th class="th-dashboard">Total</th>
                </tr>
                <?php $i = 1;?>
                <?php foreach($tabel as $row):?>
                <tr>
                    <td class="td-dashoard"><?= $i++; ?></td>
                    <td class="td-dashoard"><?= $row['tanggal'];?></td>
                    <td class="td-dashoard"><?= $row['produk'];?></td>
                    <td class="td-dashoard"><?= $row['jumlah'];?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <div class="piechartbox">
                <canvas id="pieChart"></canvas>
            </div>
            </div>
        </div>
        
    
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    <!--Container Main end-->

    <!-- Chart section -->
      <script src="asset/chart.min.js"></script>
      <!-- Dashboard -->
      <!-- line chart  -->
      <script>
        //setup
        const data = {
            labels:[<?php while($row = mysqli_fetch_array($data))
                {echo '"'.$row['produk'].'",';}?>],
          datasets: [
            {
              label: "Sales Data",
              data : [<?php while($row = mysqli_fetch_array($penjualan))
                {echo '"'.$row['sold'].'",';}?>],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 4,
            },
          ],
        };
        //config
        const config = {
            type: "line",
            data,
            options: {
              scales: {
                y: {
               beginAtZero: true,
                },
              },
            },
        };
        //render init block
        const lineChart = new Chart(
            document.getElementById("lineChart"),
            config
        );

        //pie chart
        //config
        const config2 = {
            type: "pie",
            data,
        };
        //render init block
        const pieChart = new Chart(
            document.getElementById("pieChart"),
            config2
        );
      </script>
</body>
</html>