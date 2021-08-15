<?php

session_start();
if (!isset($_SESSION["admin"])) {
?>
    <script language="JavaScript">
        alert('Maaf Admin, Login ulang lagi ya :)');
        document.location='https://tugas.mineversal.com/admin';
    </script>
<?php
}
?>