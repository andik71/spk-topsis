<?php include 'template/header.php'; ?>
<?php include 'template/navbar.php'; ?>
<?php include 'koneksi.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai Matriks</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">Merek</th>
                                <th scope="col" colspan="5">Kriteria</th>
                            </tr>
                            <tr>
                                <th scope="col">C1</th>
                                <th scope="col">C2</th>
                                <th scope="col">C3</th>
                                <th scope="col">C4</th>
                                <th scope="col">C5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $nilaimatriks = $conn->query("SELECT * FROM penilaian");
                            if ($nilaimatriks->num_rows > 0) {
                                while ($row = $nilaimatriks->fetch_assoc()) {

                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['merek']; ?></td>
                                        <td><?= $row['ram']; ?></td>
                                        <td><?= $row['ssd']; ?></td>
                                        <td><?= $row['processor']; ?></td>
                                        <td><?= $row['ukuran_layar']; ?></td>
                                        <td><?= $row['harga']; ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Matriks Ternormalisasi</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">Merek</th>
                                <th scope="col" colspan="5">Kriteria</th>
                            </tr>
                            <tr>
                                <th scope="col">C1</th>
                                <th scope="col">C2</th>
                                <th scope="col">C3</th>
                                <th scope="col">C4</th>
                                <th scope="col">C5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $pembagi1 = null;
                            $pembagi2 = null;
                            $pembagi3 = null;
                            $pembagi4 = null;
                            $pembagi5 = null;
                            //ram
                            $resultRam = $conn->query("SELECT ram FROM penilaian");
                            if ($resultRam->num_rows > 0) {
                                $hasil = null;
                                while ($ram = $resultRam->fetch_row()) {
                                    $hasil += pow($ram[0], 2);
                                }
                                $pembagi1 = round(sqrt($hasil), 3);
                            }
                            //ssd
                            $resultSSD = $conn->query("SELECT ssd FROM penilaian");
                            if ($resultSSD->num_rows > 0) {
                                $hasil = null;
                                while ($ssd = $resultSSD->fetch_row()) {
                                    $hasil += pow($ssd[0], 2);
                                }
                                $pembagi2 = round(sqrt($hasil), 3);
                            }
                            //processor
                            $resultProcessor = $conn->query("SELECT processor FROM penilaian");
                            if ($resultProcessor->num_rows > 0) {
                                $hasil = null;
                                while ($processor = $resultProcessor->fetch_row()) {
                                    $hasil += pow($processor[0], 2);
                                }
                                $pembagi3 = round(sqrt($hasil), 3);
                            }
                            //Ukuran Layar
                            $resultULayar = $conn->query("SELECT ukuran_layar FROM penilaian");
                            if ($resultULayar->num_rows > 0) {
                                $hasil = null;
                                while ($ULayar = $resultULayar->fetch_row()) {
                                    $hasil += pow($ULayar[0], 2);
                                }
                                $pembagi4 = round(sqrt($hasil), 3);
                            }
                            //ram
                            $resultHarga = $conn->query("SELECT harga FROM penilaian");
                            if ($resultHarga->num_rows > 0) {
                                $hasil = null;
                                while ($harga = $resultHarga->fetch_row()) {
                                    $hasil += pow($harga[0], 2);
                                }
                                $pembagi5 = round(sqrt($hasil), 3);
                            }

                            //penilaian

                            $resultPenilaian = $conn->query("SELECT * FROM penilaian");
                            if ($resultPenilaian->num_rows > 0) {
                                while ($penilaian = $resultPenilaian->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $penilaian['merek']; ?></td>
                                        <td><?= $penilaian['ram'] / $pembagi1 ?></td>
                                        <td><?= $penilaian['ssd'] / $pembagi2 ?></td>
                                        <td><?= $penilaian['processor'] / $pembagi3 ?></td>
                                        <td><?= $penilaian['ukuran_layar'] / $pembagi4 ?></td>
                                        <td><?= $penilaian['harga'] / $pembagi5 ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai Bobot Ternormalisasi</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">Merek</th>
                                <th scope="col" colspan="5">Kriteria</th>
                            </tr>
                            <tr>
                                <th scope="col">C1</th>
                                <th scope="col">C2</th>
                                <th scope="col">C3</th>
                                <th scope="col">C4</th>
                                <th scope="col">C5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $c1 = null;
                            $c2 = null;
                            $c3 = null;
                            $c4 = null;
                            $c5 = null;
                            $resultKriteria = $conn->query("SELECT * FROM kriteria");

                            if ($resultKriteria->num_rows > 0) {
                                $kriteria = $resultKriteria->fetch_assoc();
                                $c1 = $kriteria['ram'];
                                $c2 = $kriteria['ssd'];
                                $c3 = $kriteria['processor'];
                                $c4 = $kriteria['ukuran_layar'];
                                $c5 = $kriteria['harga'];
                            }
                            //kosongkan tabel matriks terbobot

                            $truncateMatriksTerbobot = $conn->query("TRUNCATE TABLE matriks_terbobot");

                            $resultPenilaian = $conn->query("SELECT * FROM penilaian");
                            if ($resultPenilaian->num_rows > 0) {
                                while ($penilaian = $resultPenilaian->fetch_assoc()) {
                                    $matriksC1 = ($penilaian['ram'] / $pembagi1) * $c1;
                                    $matriksC2 = ($penilaian['ssd'] / $pembagi2) * $c2;
                                    // MAINTENANCE ============================
                                    $matriksC3 = ($penilaian['processor'] / $pembagi3) * $c3;
                                    $matriksC4 = ($penilaian['ukuran_layar'] / $pembagi4) * $c4;
                                    $matriksC5 = ($penilaian['harga'] / $pembagi5) * $c5;
                                    $merek = $penilaian['merek'];
                                    //insert tabel matriks terbobot
                                    $insertMatriks = $conn->query("INSERT INTO matriks_terbobot (merek,c1,c2,c3,c4,c5)
                            VALUES ('$merek','$matriksC1','$matriksC2','$matriksC3','$matriksC4','$matriksC5') ");
                                }
                            }

                            $resultMatriksTerbobot = $conn->query("SELECT * FROM matriks_terbobot");
                            if ($resultMatriksTerbobot->num_rows > 0) {
                                while ($row = $resultMatriksTerbobot->fetch_assoc()) {

                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['merek']; ?></td>
                                        <td><?= $row['c1'] ?></td>
                                        <td><?= $row['c2'] ?></td>
                                        <td><?= $row['c3'] ?></td>
                                        <td><?= $row['c4'] ?></td>
                                        <td><?= $row['c5'] ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Matriks ideal Positif (Max)</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">C1</th>
                                <th scope="col">C2</th>
                                <th scope="col">C3</th>
                                <th scope="col">C4</th>
                                <th scope="col">C5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $PositifY1 = null;
                            $PositifY2 = null;
                            $PositifY3 = null;
                            $PositifY4 = null;
                            $PositifY5 = null;
                            $PositifC1 = $conn->query("SELECT max(c1) FROM matriks_terbobot");
                            if ($PositifC1->num_rows > 0) {
                                $row = $PositifC1->fetch_row();
                                $PositifY1 = $row[0];
                            }
                            $PositifC2 = $conn->query("SELECT max(c2) FROM matriks_terbobot");
                            if ($PositifC2->num_rows > 0) {
                                $row = $PositifC2->fetch_row();
                                $PositifY2 = $row[0];
                            }
                            $PositifC3 = $conn->query("SELECT max(c3) FROM matriks_terbobot");
                            if ($PositifC3->num_rows > 0) {
                                $row = $PositifC3->fetch_row();
                                $PositifY3 = $row[0];
                            }
                            $PositifC4 = $conn->query("SELECT max(c4) FROM matriks_terbobot");
                            if ($PositifC4->num_rows > 0) {
                                $row = $PositifC4->fetch_row();
                                $PositifY4 = $row[0];
                            }
                            $PositifC5 = $conn->query("SELECT min(c5) FROM matriks_terbobot");
                            if ($PositifC5->num_rows > 0) {
                                $row = $PositifC5->fetch_row();
                                $PositifY5 = $row[0];
                            }

                            ?>
                            <tr>
                                <td><?= $PositifY1; ?></td>
                                <td><?= $PositifY2; ?></td>
                                <td><?= $PositifY3; ?></td>
                                <td><?= $PositifY4; ?></td>
                                <td><?= $PositifY5; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-6 font-weight-bold text-primary">Matriks ideal Negatif (Min)</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">C1</th>
                        <th scope="col">C2</th>
                        <th scope="col">C3</th>
                        <th scope="col">C4</th>
                        <th scope="col">C5</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $NegatifY1 = null;
                    $NegatifY2 = null;
                    $NegatifY3 = null;
                    $NegatifY4 = null;
                    $NegatifY5 = null;

                    $NegatifC1 = $conn->query("SELECT min(c1)FROM matriks_terbobot");
                    if ($NegatifC1->num_rows > 0) {
                        $row = $NegatifC1->fetch_row();
                        $NegatifY1 = $row[0];
                    }

                    $NegatifC2 = $conn->query("SELECT min(c2)FROM matriks_terbobot");
                    if ($NegatifC2->num_rows > 0) {
                        $row = $NegatifC2->fetch_row();
                        $NegatifY2 = $row[0];
                    }

                    $NegatifC3 = $conn->query("SELECT min(c3)FROM matriks_terbobot");
                    if ($NegatifC3->num_rows > 0) {
                        $row = $NegatifC3->fetch_row();
                        $NegatifY3 = $row[0];
                    }

                    $NegatifC4 = $conn->query("SELECT min(c4)FROM matriks_terbobot");
                    if ($NegatifC4->num_rows > 0) {
                        $row = $NegatifC4->fetch_row();
                        $NegatifY4 = $row[0];
                    }

                    $NegatifC5 = $conn->query("SELECT max(c5)FROM matriks_terbobot");
                    if ($NegatifC5->num_rows > 0) {
                        $row = $NegatifC5->fetch_row();
                        $NegatifY5 = $row[0];
                    }

                    ?>
                    <tr>
                        <td><?= $NegatifY1; ?></td>
                        <td><?= $NegatifY2; ?></td>
                        <td><?= $NegatifY3; ?></td>
                        <td><?= $NegatifY4; ?></td>
                        <td><?= $NegatifY5; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-6 font-weight-bold text-primary">jarak solusi ideal positif (D<sup>+</sup>)</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Merek</th>
                        <th scope="col">D<sup>+</sup></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $resultMatriksTerbobot = $conn->query("SELECT * FROM matriks_terbobot");
                    if ($resultMatriksTerbobot->num_rows > 0) {
                        while ($row = $resultMatriksTerbobot->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['merek']; ?></td>
                                <td>
                                    <?=
                                    sqrt(pow($row['c1'] - $PositifY1, 2) + pow($row['c2'] - $PositifY2, 2) + pow($row['c3'] - $PositifY3, 2) + pow($row['c4'] -
                                        $PositifY4, 2) + pow($PositifY5 - $row['c5'], 2))   ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-6 font-weight-bold text-primary">jarak solusi ideal Negatif (D<sup>-</sup>)</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Merek</th>
                        <th scope="col">D<sup>-</sup></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $resultMatriksTerbobot = $conn->query("SELECT * FROM matriks_terbobot");
                    if ($resultMatriksTerbobot->num_rows > 0) {
                        while ($row = $resultMatriksTerbobot->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['merek']; ?></td>
                                <td>
                                    <?=
                                    sqrt(pow($row['c1'] - $NegatifY1, 2) + pow($row['c2'] - $NegatifY2, 2) + pow($row['c3'] - $NegatifY3, 2) + pow($row['c4'] -
                                        $NegatifY4, 2) + pow($NegatifY5 - $row['c5'], 2))   ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-6 font-weight-bold text-primary">Nilai Preferensi</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Nilai Preferensi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $truncatePreferensi = $conn->query("TRUNCATE TABLE preferensi");

                    $resultMatriksTerbobots = $conn->query("SELECT * FROM matriks_terbobot");
                    if ($resultMatriksTerbobots->num_rows > 0) {
                        while ($row = $resultMatriksTerbobots->fetch_assoc()) {
                            //
                            $nilaiPreferensi = sqrt(pow($row['c1'] - $NegatifY1, 2) + pow($row['c2'] - $NegatifY2, 2) + pow($row['c3'] - $NegatifY3, 2) + pow($row['c4'] - $NegatifY4, 2) + pow($NegatifY5 - $row['c5'], 2)) / (sqrt(pow($row['c1'] - $NegatifY1, 2) + pow($row['c2'] - $NegatifY2, 2) + pow($row['c3'] - $NegatifY3, 2) + pow($row['c4'] - $NegatifY4, 2) + pow($NegatifY5 - $row['c5'], 2)) + sqrt(pow($row['c1'] - $PositifY1, 2) + pow($row['c2'] - $PositifY2, 2) + pow($row['c3'] - $PositifY3, 2) + pow($row['c4'] - $PositifY4, 2) + pow($PositifY5 - $row['c5'], 2)));
                            $merek = $row['merek'];

                            $insertPrefrensi = $conn->query("INSERT INTO preferensi (merek,nilai_preferensi) VALUES ('$merek','$nilaiPreferensi') ");
                        }
                    }
                    $resultPreferensi = $conn->query("SELECT * FROM preferensi");

                    if ($resultPreferensi->num_rows > 0) {
                        while ($row = $resultPreferensi->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['merek']; ?></td>
                                <td><?= $row['nilai_preferensi']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-6 font-weight-bold text-primary">Perangkingan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $resultPreferensi = $conn->query("SELECT * FROM preferensi ORDER BY nilai_preferensi DESC");
                    if ($resultPreferensi->num_rows > 0) {
                        while ($row = $resultPreferensi->fetch_assoc()) {

                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['merek']; ?></td>
                                <td><?= $row['nilai_preferensi']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include 'template/footer.php'; ?>