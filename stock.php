<?php
require'./connect.php';
$data = mysqli_query($konek, "SELECT jenis_barang FROM tb_barang GROUP BY jenis_barang ");
$stok =mysqli_query($konek,"SELECT SUM(stok_barang) AS stok FROM tb_barang GROUP BY jenis_barang");
$tabel = query("SELECT* FROM tb_barang");
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
        <h4>Stock</h4><br>
        <h5 class="judul2">Stock  data</h5>
        <div class="chartbox">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-wrapper">
            <div class="stockchart1">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="stockchart2">
                <canvas id="pieChart"></canvas>
            </div>
        </div>     
        <div class="tb-stok">
            <h4 class="judul4">Stock Data</h4>
            <table class="tabel-dashboard" >
                <tr>
                    <th class="th-dashboard">No</th>
                    <th class="th-dashboard">Name of goods</th>
                    <th class="th-dashboard">Types of goods</th>
                    <th class="th-dashboard">price of goods</th>
                    <th class="th-dashboard">Stock</th>
                    <th class="th-dashboard">Action</th>
                </tr>
                <?php $i = 1;?>
                <?php foreach($tabel as $row):?>
                <tr>
                    <td class="td-dashoard"><?= $i++; ?></td>
                    <td class="td-dashoard"><?= $row['nama_barang'];?></td>
                    <td class="td-dashoard"><?= $row['jenis_barang'];?></td>
                    <td class="td-dashoard"><?= $row['harga_barang'];?></td>
                    <td class="td-dashoard"><?= $row['stok_barang'];?></td>
                    <td class="td-action"><a href="change.php?id=<?= $row["id_barang"]?>">Ubah<a>  | <a href="delete-data.php?id=<?= $row["id_barang"]?>">Hapus</a></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>   
    
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    <!--Container Main end-->

    <!-- Chart section -->
      <script src="asset/chart.min.js"></script>
      <!-- Ordering -->
      <!-- Bar chart  -->
      <script>
        //setup
        const data = {
            labels:[<?php while($row = mysqli_fetch_array($data))
                {echo '"'.$row['jenis_barang'].'",';}?>],
          datasets: [
            {
              label: "Stock chart",
              data : [<?php while($row = mysqli_fetch_array($stok))
                {echo '"'.$row['stok'].'",';}?>],
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
            type: "bar",
            data,
            options: {
              scales: {
                y: {
               beginAtZero: true,
                },
              },
            },
        };
        //config2
        const config2 = {
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
        //config3
        const config3 = {
            type: "pie",
            data,
        };
        //render init block
        const barChart = new Chart(
            document.getElementById("barChart"),
            config
        );
        //render init block 2
        const lineChart = new Chart(
            document.getElementById("lineChart"),
            config2
        );
        //render init block 3
        const pieChart = new Chart(
            document.getElementById("pieChart"),
            config3
        );
      </script>
</body>
</html>