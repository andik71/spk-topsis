<!-- header -->
<?php include 'template/header.php' ?>
<!-- navbar -->
<?php include 'template/header.php' ?>
<!-- Begin Page Content -->
<?php
include 'koneksi.php';
if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $merek = $_POST['merek'];

    $query = $conn->query("UPDATE alternative SET merek= '$merek' WHERE id='$id'");

    if (!$query) {
        echo "<script>
            alert('data gagal diubah')
            window.location.href = 'alternative.php';
            </script>";
    } else {
        echo "<script>
            alert('data berhasil diubah')
            window.location.href = 'alternative.php';
            </script>";
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input alternative</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?php
                        $id = $_GET['id'];

                        $query = $conn->query("SELECT * FROM alternative1 WHERE id='$id'");
                        if ($query->num_rows > 0) {
                            $row = $query->fetch_assoc();
                        ?>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Merek Laptop</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="merek" placeholder="merek" value="<?= $row['merek']; ?>" required>
                                </div>
                            </div>
                        <?php } ?>
                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.conatiner-fluid -->
<!-- footer -->
<?php include 'template/footer.php' ?>