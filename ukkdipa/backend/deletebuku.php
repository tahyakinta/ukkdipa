<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eperpus";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan parameter id ada dalam URL
if(isset($_GET['id'])) {
    // Ambil ID buku yang akan dihapus dari parameter URL
    $id_buku = $_GET['id'];
    
    // Nonaktifkan pengecekan foreign key sementara
    $conn->query("SET FOREIGN_KEY_CHECKS = 0");

    // Hapus relasi antara buku dan koleksi
    $sql_relasi = "DELETE FROM koleksi WHERE bukuid = ?";
    $stmt_relasi = $conn->prepare($sql_relasi);
    $stmt_relasi->bind_param("i", $id_buku);
    $stmt_relasi->execute();

    // Hapus buku
    $sql_buku = "DELETE FROM buku WHERE id = ?";
    $stmt_buku = $conn->prepare($sql_buku);
    $stmt_buku->bind_param("i", $id_buku);
    $stmt_buku->execute();

    // Aktifkan kembali pengecekan foreign key
    $conn->query("SET FOREIGN_KEY_CHECKS = 1");

    // Tutup statement
    $stmt_relasi->close();
    $stmt_buku->close();

    // Redirect kembali ke halaman daftar buku
    echo "<p>Buku berhasil dihapus!</p>";
    header("Location: ../dashboardadmin/buku/daftarbuku.php");
    exit();
} else {
    // Jika parameter id tidak ditemukan dalam URL
    echo "ID buku tidak ditemukan dalam permintaan.";
}

// Tutup koneksi
$conn->close();
?>
