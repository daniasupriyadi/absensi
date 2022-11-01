<?php
include 'Koneksi_oracle.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap">
    <title>Presensi</title>
</head>
<body style="font-family: Poppins, sans-serif;">
<!---Navbar--->
<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #ffb3b3 " >
        <div class="container-fluid">
          <a class="navbar-brand ms-3" href="#">Absensii Perkuliahan</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="absensi.php">Presensi</a>
              </li>
              
              <li class="nav-item ms-3">
                <a class="nav-link" href="list_mhsw.php">Daftar Mahasiswa</a>
              </li>
              <li class="nav-item ms-3">
                <a class="nav-link" href="matkul.php">Daftar Mata Kuliah</a>
              </li>
            </ul>
          </div>
        </div>
  </nav>

    <div class="col">
       <div class="container" style="margin-top: 45px; width:90%;">
            <div class="card" style="margin-bottom: 10px; ;">
            <center>
                <h1 style="margin-bottom: 15px; margin-top: 25px; ">Daftar Presensi</h1>
          
            </center>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4" style="margin-right: 10px; ">
                            <div class="card" style="margin-bottom: 10px; ">
                                <div class="card-body">
                                    <form method="post" action="absensi.php" name="presensi">
                                    <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                                            <input type="number" class="form-control" id="InputNRP" name="NRP" placeholder="Enter NRP" required>
                                        </div>
                                         <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNAMA" style="margin-bottom: 10px;">NAMA</label>
                                            <input type="text" class="form-control" id="InputNAMA" name="NAMA" placeholder="Enter NAMA" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputMATKUL" style="margin-bottom: 10px;">MATKUL</label>
                                            <select class="form-select" id="InputMATKUL" name="MATKUL" required>
                                            <option selected>PILIH MATKUL</option>
                                            <option value="Basis Data Lanjut">Basis Data Lanjut</option>
                                            <option value="Agama">Agama</option>
                                            <option value="Matematika">Matematika</option>
                                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                                            <option value="Konsep Jaringan">Konsep Jaringan</option>
                                        </select>

                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px; ">
                                        <label for="ExInputPRES" style="margin-bottom: 10px;">tgl presensi</label>
                                        <input type="date" class="form-control" id="InputPRES" name="PRES" placeholder="Enter PRES" required>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputKELAS" style="margin-bottom: 10px;">KELAS</label>
                                            <select class="form-select" id="InputKELAS" name="KELAS" required>
                                            <option selected>PILIH KELAS</option>
                                            <option value="D3A">D3 IT A</option>
                                            <option value="DEB">D3 IT B</option>
                                            <option value="D4A">D4 IT A</option>
                                            <option value="D4B">D4 IT B</option>
                                        </select>

                                    </div>
                                    </div>
                            <button type="submit" class="button" style="margin-bottom: 10px; margin-left: 15px; width:92%; background-color: rgb(252, 182, 193);" name="presensi" id="presensi">Presensi</button>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <table class="table table-bordered table-striped">
                            <thead style="background-color: rgb(252, 182, 193); color:black;">
                            <tr>
                                <th scope="col" style="text-align: center">NRP</th>
                                <th scope="col" style="text-align: center">Nama Mahasiswa</th>
                                <th scope="col" style="text-align: center">Mata Kuliah</th>
                                <th scope="col" style="text-align: center">Tgl presensi</th>
                                <th scope="col" style="text-align: center">Kelas</th>
                                <th scope="col" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php
                            $sql = ociparse($conn, "SELECT * FROM ABSN ORDER BY PRES");
                            oci_execute($sql);
                            while (ocifetch($sql)) { ?>
                            <tr>
                                <th scope="row" style="text-align: center"><?php echo ociresult($sql, "NRP") ?></th>
                                <td style="text-align: center"><?php echo ociresult($sql, "NAMA") ?></td>
                                <td style="text-align: center"><?php echo ociresult($sql, "MATKUL") ?></td>
                                <td style="text-align: center"><?php echo ociresult($sql, "PRES") ?></td>
                                <td style="text-align: center"><?php echo ociresult($sql, "KELAS") ?></td>
                                <td>
                                <a class= " btn btn-primary" href="edit.php" > Update</a>
                                <a href="delete.php?MATKUL=<?= ociresult($sql, 'MATKUL'); ?>" class="btn btn-danger">Delete</a>
                            </td>

                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                </div>
                <?php
                if (isset($_POST['presensi'])) {
                    $NRP = $_POST['NRP'];
                    $NAMA = $_POST['NAMA'];
                    $MATKUL = $_POST['MATKUL'];
                    $PRES = $_POST['PRES'];
                    $KELAS = $_POST['KELAS'];

                    $sql = ociparse($conn, "insert into ABSN values ('$NRP','$NAMA','$MATKUL', TO_DATE('$PRES','YYYY/MM/DD'),'$KELAS')");
                    ociexecute($sql);
                    if (!empty($sq)) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        }).then(function() {
                            window.location = 
                            "absensi.php";
                        });
                    </script>
                    
<!-- 
                if ($NRP != "" && $NAME != "") {  -->
                <?php }  else { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Yess',
                            text: 'Success to Update Data',
                        }).then(function() {
                            window.location = 
                            "absensi.php";
                        });
                    </script>
                <?php
                }
                }?>
            </div>
        </div>
    </div>
</body>
</html>
