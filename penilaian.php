<!-- navbar -->
<?php include 'template/header.php' ?>
<!-- Begin Page Content -->

<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $merek = $_POST['merek'];
    $ram = $_POST['ram'];
    $ssd = $_POST['ssd'];
    $processor = $_POST['processor'];
    $ukuran_layar = $_POST['ukuran_layar'];
    $harga = $_POST['harga'];

    $query = $conn->query("SELECT * FROM penilaian WHERE merek='$merek'");

    if ($query->num_rows > 0) {
        echo
        "<script>
            alert('merek sudah dinilai');
            window.location.href = 'penilaian.php';
            </script>";
    } else {
        $query = $conn->query("INSERT INTO penilaian(merek,ram,ssd,processor,ukuran_layar,harga) VALUES('$merek','$ram','$ssd','$processor','$ukuran_layar','$harga')");

        if (!$query) {
            echo "<script>
            alert('data gagal disimpan');
            window.location.href = 'penilaian.php';
            </script>";
        } else {
            echo "<script>
            alert('data berhasil disimpan');
            window.location.href = 'penilaian.php';
            </script>";
        }
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Bobot</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Merek</label>
                            <div class="col-sm-8">
                                <select name="merek" class="form-control">
                                    <?php
                                    $alternative = $conn->query("SELECT * FROM alternative");
                                    if ($alternative->num_rows > 0) {
                                        while ($row = $alternative->fetch_assoc()) {
                                    ?>
                                            <option value="<?= $row['merek']; ?>"><?= $row['merek'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ram</label>
                            <div class="col-sm-8">
                                <select name="ram" class="form-control">
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SSD</label>
                            <div class="col-sm-8">
                                <select name="ssd" class="form-control">
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Processor</label>
                            <div class="col-sm-8">
                                <select name="processor" class="form-control">
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ukuran Layar</label>
                            <div class="col-sm-8">
                                <select name="ukuran_layar" class="form-control">
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <select name="harga" class="form-control">
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penilaian</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Merek</th>
                                <th scope="col">Ram</th>
                                <th scope="col">SSD</th>
                                <th scope="col">Processor</th>
                                <th scope="col">Ukuran Layar</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $query = $conn->query("SELECT * FROM penilaian");

                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['merek']; ?></td>
                                        <td><?= $row['ram']; ?></td>
                                        <td><?= $row['ssd']; ?></td>
                                        <td><?= $row['processor']; ?></td>
                                        <td><?= $row['ukuran_layar']; ?></td>
                                        <td><?= $row['harga']; ?></td>
                                        <td>
                                            <a href="edit_penilaian.php?id=<?= $row['id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="delete_penilaian.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('data ingin dihapus?')">Delete</a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.conatiner-fluid -->
<!-- footer -->
<?php include 'template/footer.php' ?>