<?php
$conn = oci_connect("hr","hr","localhost:1521/orcl");
if (!$conn)
   echo "Koneksi ke DB Oracle Gagal";
?>