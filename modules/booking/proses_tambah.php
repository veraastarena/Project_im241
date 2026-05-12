<?php 
include '../config/database.php';
include '../includes/header.php'; 
?>

<h2>Form Tambah Peminjaman</h2>
<form action="proses_tambah.php" method="POST">
    <label>Tanggal Rapat:</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Jam Mulai:</label><br>
    <input type="time" name="jam_mulai" required><br><br>

    <label>Jam Selesai:</label><br>
    <input type="time" name="jam_selesai" required><br><br>

    <label>Pilih Ruangan:</label><br>
    <select name="id_ruang">
        <?php
        $r = mysqli_query($conn, "SELECT * FROM m_ruangan");
        while($dr = mysqli_fetch_assoc($r)) echo "<option value='{$dr['id_ruangan']}'>{$dr['nama_ruangan']}</option>";
        ?>
    </select><br><br>

    <label>Pilih Karyawan:</label><br>
    <select name="id_karyawan">
        <?php
        $k = mysqli_query($conn, "SELECT * FROM m_karyawan");
        while($dk = mysqli_fetch_assoc($k)) echo "<option value='{$dk['id_karyawan']}'>{$dk['nama_karyawan']}</option>";
        ?>
    </select><br><br>

    <label>Agenda:</label><br>
    <textarea name="agenda" required></textarea><br><br>

    <button type="submit" name="simpan">Simpan Booking</button>
</form>

<?php include '../includes/footer.php'; ?>