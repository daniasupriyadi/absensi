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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap">
    <title>Update</title>
</head>
<body style="font-family: Poppins, sans-serif;">
     <div class="container" style="margin-top: 40px; ">
        <div class="card" style="margin-bottom: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <center>
                <h1 style="margin-bottom: 25px; margin-top: 40px; ">Update Data</h1>
           
            </center>
            <div class="card-body">
               <div class="row">
                    <div class="col-4">
                        <div class="card"  ">
                            <div class="card-body">
                                <form method="post" action="edit.php" name="kirim">
                                    <div class="form-group" style="margin-bottom: 20px; ">
                                        <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                                        <input type="number" class="form-control" id="InputNRP" name="NRP" placeholder="Enter NRP" required>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px; ">
                                        <label for="ExInputNAMA" style="margin-bottom: 10px;">NAMA</label>
                                        <input type="text" class="form-control" id="InputNAMA" name="NAMA" placeholder="Enter NAMA">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px; ">
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
                                    </div>
                                    <button type="submit"  class="button" style="margin-bottom: 10px; margin-left: 15px; width:92%; background-color:rgb(252, 182, 193);" name="submit" id="submit">Update</button>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                                <thead style="background-color: rgb(252, 182, 193); color:black;">
                                <tr>
                                    <th scope="col" style="text-align: center">NRP</th>
                                    <th scope="col" style="text-align: center">NAMA</th>
                                    <th scope="col" style="text-align: center">MATKUL</th>
                                    <th scope="col" style="text-align: center">TGL PRES</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $sql = ociparse($conn, "SELECT * FROM ABSN");
                            oci_execute($sql);
                            while (ocifetch($sql)) { ?>
                            <tr>
                                <th scope="row" style="text-align: center"><?php echo ociresult($sql, "NRP") ?></th>
                                <td style="text-align: center"><?php echo ociresult($sql, "NAMA") ?></td>
                                <td style="text-align: center"><?php echo ociresult($sql, "MATKUL") ?></td>
                                <td style="text-align: center"><?php echo ociresult($sql, "PRES") ?></td>
                              
                            </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $NAMA = $_POST['NAMA'];
                    $MATKUL = $_POST['MATKUL'];
                    $NRP = $_POST['NRP'];
                    $sql = ociparse($conn, "update ABSN set NAMA='$NAMA', MATKUL = '$MATKUL' where NRP='$NRP'");
                    ociexecute($sql);
                if ($NRP != "") { ?>
                <script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Yess',
                    text: 'Success to Update Data',
                    }).then(function() {window.location = "absensi.php";
                    });
                </script>
                <?php } else { ?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                }).then(function() {
                    window.location = "edit.php";
                    });
                </script>
                <?php
            }
        }            
    ?>
</body>
</html>
