<?php 
$conn=mysqli_connect("localhost","root","","eperpus"); 
session_start();

if(!isset($_SESSION["user_id"]) ) {
  header("Location: ../../login.php");
  exit;
}
function queryReadData($dataKategori) {
  global $conn;
  $result = mysqli_query($conn, $dataKategori);
  $items = [];
  while($item = mysqli_fetch_assoc($result)) {
    $items[] = $item;
  }     
  return $items;
}
$kategori = queryReadData("SELECT * FROM kategoribuku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css">
    <title>Tambah Barang || Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            background-color: grey;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-cyan {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-kembali {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-cyan:hover, .btn-cyan:focus {
            background-color: #117a8b;
            border-color: #117a8b;
        }
        .btn-kembali:hover, .btn-kembali:focus {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../assets/logoadmin.png" alt="memberLogo" width="40px">
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-2 p-2">
                    <li>
                        <a class="dropdown-item text-center" href="#">
                            <img src="../../assets/logoadmin.png" alt="adminLogo" width="30px">
                        </a>
                    </li>
                    <li>
                        <?php if(isset($_SESSION['user']['username'])): ?>
                            <a class="dropdown-item text-center text-secondary" href="#">
                                <span class="text-capitalize"><?php echo $_SESSION['user']['username']; ?></span>
                            </a>
                        <?php endif; ?>
                    </li>
                    <hr>         
                    <li>
                        <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="../signout.php">
                            Sign Out <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card p-4">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="kategori.php" class="btn btn-primary btn-lg btn-cyan">Kategori</a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="../dashboardpetugas.php" class="btn btn-secondary btn-lg btn-kembali">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <h1 class="text-center fw-bold mb-4">Form Tambah Buku</h1>
            <form action="../../backend/tambahbuku.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Cover Buku</label>
                    <input class="form-control" type="file" name="gambar" id="formFileMultiple" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" required>
                        <option selected disabled>Choose...</option>
                        <?php foreach ($kategori as $item) : ?>
                            <option><?= $item["nama_kategori"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="date" class="form-control" name="tahun-terbit" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" style="height: 100px"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-warning text-light">Reset</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
