<?php
include 'Koneksi_oracle.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap">
 <title>Daftar Mahasiswa</title>
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
                <a class="nav-link " aria-current="page" href="absensi.php">Presensi</a>
              </li>
              
              <li class="nav-item ms-3">
                <a class="nav-link active" href="list_mhsw.php">Daftar Mahasiswa</a>
              </li>
              <li class="nav-item ms-3">
                <a class="nav-link" href="matkul.php">Daftar Mata Kuliah</a>
              </li>
            </ul>
          </div>
        </div>
  </nav>
    <div class="container" style="margin-top: 40px; ">
        <div class="card" style="margin-bottom: 10px; ">
            <div class="card-body">
                <center>
                    <h1 style="margin-bottom: 25px;">Daftar Mahasiswa</h1>
                   
                </center>
        <table class="table ">
            <thead style="background-color:rgb(252, 182, 193); color:black;">
            <tr><th scope="col" style="text-align: center">NRP</th>
            <th scope="col" style="text-align: center">Nama</th>
            <th scope="col" style="text-align: center">Kelas</th>
            
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = ociparse($conn, "SELECT * FROM ABSN");
            oci_execute($sql);
            while (ocifetch($sql)) { ?><tr>
            <th scope="row" style="text-align: center"><?php echo ociresult($sql, "NRP") ?></th>
            <td style="text-align: center"><?php echo ociresult($sql, "NAMA") ?></td>
            <td style="text-align: center"><?php echo ociresult($sql, "KELAS") ?></td>
            
            </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </div>
 </div>
