<?php
session_start();

if(!isset($_SESSION["user_id"]) ) {
  header("Location: ../login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>User Dashboard</title>
    <style>
        body {
    background-image: url('../assets/background.png');
    background-size: cover;
    background-position: center;
    margin: 0; /* Menetapkan margin menjadi 0 */
    padding: 0; /* Menetapkan padding menjadi 0 */
    height: 100vh;
}

        .navbar-brand {
            position: absolute;
            top: 0;
            left: 0;
            margin: 10px; /* Add margin to adjust positioning */
        }

        .dropdown {
            position: absolute;
            top: 25px;
            right: 0;
        }

        .dropdown-menu {
            margin-top: 10px;
        }
        .btn-custom {
            color: #000;
            border: 3px solid #ccc;
            border-radius: 15px; /* Sudut tombol yang melengkung */
            padding: 20px 50px; /* Panjang dan lebar tombol yang sama */
            margin-bottom: 20px;
            cursor: pointer;
            font-weight: bold; /* Membuat teks di dalam tombol menjadi tebal */
        }

        .btn-custom:hover {
            background-color: #e6e6e6;
        }

        .btn-generate { background-color: #f2f2f2; }
        .btn-tambah { background-color: #737373; }
        .btn-peminjaman { background-color: #f2f2f2; }
        .btn-pengembalian { background-color: #737373; }
        .btn-akun { background-color: #f2f2f2; }
        .btn-daftar { background-color: #737373; }
        

        @media screen and (max-width: 600px) {
            .d-flex flex-wrap gap-2 cardImg a img {
                width: 200px;
            }
        }
    </style>
</head>
<body>
    <a class="navbar-brand">
        <img src="../assets/lgoo.png" alt="logo" width="150px">
    </a>
    
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/memberlogo.png" alt="memberLogo" width="40px">
        </button>
        <ul class="dropdown-menu position-absolute mt-2 p-2">
        <li>
            <a class="dropdown-item text-center" href="#">
            <img src="../assets/memberlogo.png" alt="adminLogo" width="30px">
            </a>
          </li>
          <div class="alert alert-success" role="alert">Selamat datang - <span class="fw-bold text-capitalize"><?php echo $_SESSION['username']; ?></span> di Dashboard EPerpus</div>
          <hr>         
          <li>
            <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signout.php">Sign Out <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
        </ul>
    </div>

    <div class="mt-5 p-4">
         <?php
         // Mendapatkan tanggal dan waktu saat ini
         $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
         // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
         $day = date('l');
         // Mendapatkan tanggal dalam format 1 hingga 31
         $dayOfMonth = date('d');
         // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
         $month = date('F');
         // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
         $year = date('Y');
         ?>

        <div class="mt-5 p-4">
    <h1 class="mt-5 fw-bold">Dashboard <span class="fs-4 text-secondary"></span></h1>
    <div class="mt-4 p-3">
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <div class="button">
                <button onclick="location.href='buku/daftarbuku.php';" class="btn-custom btn-generate">Daftar Buku</button>
            </div>
            <div class="button">
                <button onclick="location.href='buku/detailpeminjaman.php';" class="btn-custom btn-tambah">Peminjaman</button>
            </div>
            <div class="button">
                <button onclick="location.href='buku/koleksibuku.php';" class="btn-custom btn-peminjaman">Koleksi</button>
            </div>           
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
