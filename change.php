<?php 
	require 'connect.php';

	//ambil data di URL
	$id = $_GET["id"];

	//query stock berdasarkan id
	$ubah = query("SELECT * FROM tb_barang WHERE id_barang = $id")[0]; 
	
	// cek apakah sudah memencet tombol submit
	if (isset($_POST['submit'])) {
		

		//cek apakah data berhasil diubah?
		if (ubah($_POST) > 0 ) {
			echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'stock.php';
				</script>
			";
		} else{
			echo "
				<script>
					alert('data gagal diubah!');
					document.location.href = 'change.php';
				</script>
			";
		}
		
	}
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
    <link rel="stylesheet" href="./asset/change.css">
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
        <br>
        <br><br>
        <h2 class="judul2">Change Data</h2>
        <div class="container">
	    <div class="form">
            <form action="" method="post">
                <div class="title">Complete the form</div>
                <div class="subtitle">be careful in filling in the data!!</div>
                <input type="hidden" name="id" value="<?= $ubah["id_barang"]; ?>">
                <div class="input-container ic1">
                    <input id="nama_barang" class="input" type="text" placeholder=" " name="nama_barang" value="<?= $ubah["nama_barang"]; ?>" />
                    <div class="cut"></div>
                    <label for="nama_barang" class="placeholder">Name of goods</label>
                </div>
                <div class="input-container ic2">
                    <input id="jenis_barang" class="input" type="text" placeholder=" " name="jenis_barang" value="<?= $ubah["jenis_barang"]; ?>"/>
                    <div class="cut"></div>
                    <label for="jenis_barang" class="placeholder">Type of goods</label>
                </div>
                <div class="input-container ic2">
                    <input id="harga_barang" class="input" type="text" placeholder=" " name="harga_barang" value="<?= $ubah["harga_barang"]; ?>"/>
                    <div class="cut cut-short"></div>
                    <label for="harga_barang" class="placeholder">Price of goods</label>
                </div>
                <div class="input-container ic2">
                    <input id="stok" class="input" type="text" placeholder=" " name="stok" value="<?= $ubah["stok_barang"]; ?>"/>
                    <div class="cut cut-short"></div>
                    <label for="stok" class="placeholder">Stock</label>
                </div>
                <button type="submit" class="submit"name="submit">submit</button>
            </form>
      
        </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    <!--Container Main end-->
</body>
</html>