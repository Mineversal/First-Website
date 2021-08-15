<?php

session_start();
if (!isset($_SESSION["user"])) {
?>
    <script language="JavaScript">
        alert('Maaf ya, silahkan register lalu login terlebih dahulu sebelum menggunakan fitur pada situs Mineversal');
        document.location='https://tugas.mineversal.com';
    </script>
<?php
}
?>