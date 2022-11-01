<?php
include "Koneksi_oracle.php";
$MATKUL = $_GET['MATKUL'];
$sql = ociparse($conn, "DELETE ABSN WHERE MATKUL='$MATKUL'");
ociexecute($sql);
header("location: absensi.php");
