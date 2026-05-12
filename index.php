<?php 
include 'config/database.php';
include 'includes/header.php';

// Ambil Statistik
$total_r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM m_ruangan"))['total'];
$total_b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM t_booking WHERE tanggal_rapat = CURDATE()"))['total'];
?>

<h1>Dashboard Peminjaman</h1>

<div class="stats-container">
    <div class="card">
        <h3>Total Ruangan</h3>
        <h2><?= $total_r ?></h2>
    </div>
    <div class="card">
        <h3>Booking Hari Ini</h3>
        <h2><?= $total_b ?></h2>
    </div>
    <div class="card">
        <h3>Status Sistem</h3>
        <h2 style="color: green;">Aktif</h2>
    </div>
</div>

<h3>Daftar Peminjaman Ruang</h3>
<table>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Ruangan</th>
        <th>Peminjam</th>
        <th>Agenda</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $query = "SELECT t_booking.*, m_ruangan.nama_ruangan, m_karyawan.nama_karyawan 
              FROM t_booking 
              JOIN m_ruangan ON t_booking.id_ruang = m_ruangan.id_ruangan
              JOIN m_karyawan ON t_booking.id_karyawan = m_karyawan.id_karyawan
              ORDER BY tanggal_rapat DESC";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['tanggal_rapat']}</td>
                <td>{$row['jam_mulai']} - {$row['jam_selesai']}</td>
                <td>{$row['nama_ruangan']}</td>
                <td>{$row['nama_karyawan']}</td>
                <td>{$row['agenda']}</td>
                <td>
                    <a href='booking/hapus.php?id={$row['id_booking']}' style='color:red;'>Hapus</a>
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>