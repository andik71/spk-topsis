<!-- navbar -->
<?php include 'template/header.php' ?>
<!-- Begin Page Content -->

<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $ram = $_POST['ram'];
    $ssd = $_POST['ssd'];
    $processor = $_POST['processor'];
    $ukuran_layar = $_POST['ukuran_layar'];
    $harga = $_POST['harga'];

    $query = $conn->query("SELECT * FROM kriteria");

    if ($query->num_rows > 0) {
        echo
        "<script>
            alert('bobot hanya boleh satu');
            window.location.href = 'kriteria.php';
            </script>";
    } else {
        $query = $conn->query("INSERT INTO kriteria(ram,ssd,processor,ukuran_layar,harga) VALUES('$ram','$ssd','$processor','$ukuran_layar','$harga')");

        if (!$query) {
            echo "<script>
            alert('data gagal disimpan');
            window.location.href = 'kriteria.php';
            </script>";
        } else {
            echo "<script>
            alert('data berhasil disimpan');
            window.location.href = 'kriteria.php';
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
                            <label for="inputPassword" class="col-sm-4 col-form-label">Ram</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="ram" placeholder="ram" required> -->
                                <select class="form-control" name="ram" required>
                                    <option selected>-- Pilih Kapasitas RAM --</option>
                                    <option value="1">2 GB</option>
                                    <option value="2">4 GB</option>
                                    <option value="3">6 GB</option>
                                    <option value="4">8 GB</option>
                                    <option value="5">12 GB</option>
                                    <option value="6">16 GB</option>
                                    <option value="7">32 GB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">SSD</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="ssd" placeholder="ssd" required> -->
                                <select class="form-control" name="ssd" required>
                                    <option selected>-- Pilih Kapasitas SSD --</option>
                                    <option value="1">250 GB</option>
                                    <option value="2">320 GB</option>
                                    <option value="3">500 GB</option>
                                    <option value="4">1 TB</option>
                                    <option value="5">2 TB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Processor</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="processor" placeholder="processor" required> -->
                                <select class="form-control" name="processor" required>
                                    <option selected>-- Pilih Processor Intel --</option>
                                    <option value="1">Pentium</option>
                                    <option value="2">Celeron</option>
                                    <option value="3">Core i3</option>
                                    <option value="4">Core i5</option>
                                    <option value="5">Core i7</option>
                                    <option value="6">Core i9</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Ukuran Layar</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="ukuran_layar" placeholder="ukuran layar" required> -->
                                <select class="form-control" name="ukuran_layar" required>
                                    <option selected>-- Pilih Ukuran Layar --</option>
                                    <option value="1">10 Inci</option>
                                    <option value="2">14 Inci</option>
                                    <option value="3">17 Inci</option>
                                    <option value="4">19 Inci</option>
                                    <option value="5">21 Inci</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="harga" placeholder="Harga.." required>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
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

                            $query = $conn->query("SELECT * FROM kriteria");

                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['ram']; ?></td>
                                        <td><?= $row['ssd']; ?></td>
                                        <td><?= $row['processor']; ?></td>
                                        <td><?= $row['ukuran_layar']; ?></td>
                                        <td>Rp.<?= number_format($row['harga'], 2.0); ?></td>
                                        <td>
                                            <a href="delete_kriteria.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('data ingin dihapus?')">Delete</a>
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