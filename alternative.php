<!-- navbar -->
<?php include 'template/header.php' ?>
<!-- Begin Page Content -->
<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $merek = $_POST['merek'];

    $query = $conn->query("INSERT INTO alternative(merek) VALUES ('$merek')");

    if (!$query) {
        echo "<script>
            alert('data gagal disimpan')
            window.location.href = 'alternative.php';
            </script>";
    } else {
        echo "<script>
            alert('data berhasil disimpan')
            window.location.href = 'alternative.php';
            </script>";
    }
}
?>
<div class="container-fluid" class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input alternative</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="inputText" class="col-sm-4 col-form-label">Merek Laptop</label>
                        <div class="col-sm-8">
                            <!-- <input type="text" class="form-control" name="merek" placeholder="merek" required> -->
                            <select id="inputText" class="form-control" name="merek" required>
                                <option selected>-- Pilih Laptop --</option>
                                <option value="Lenovo">Lenovo</option>
                                <option value="Acer">Acer</option>
                                <option value="Asus">Asus</option>
                                <option value="HP">HP</option>
                                <option value="Dell">Dell</option>
                                <option value="Macbook">Macbook</option>
                                <option value="Toshiba">Toshiba</option>
                                <option value="Sony">Sony</option>
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
                <h6 class="m-0 font-weight-bold text-primary">Data Alternative</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $query = $conn->query("SELECT * FROM alternative");

                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['merek']; ?></td>
                                    <td>
                                        <a href="edit_alternative.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="delete_alternative.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('data ingin dihapus')">Delete</a>
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
<div>
    <!-- /.conatiner-fluid -->
    <!-- footer -->
    <?php include 'template/footer.php' ?>
</div>