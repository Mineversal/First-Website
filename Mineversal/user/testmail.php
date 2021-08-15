<?php

include_once("config.php");

if (!$kon -> query("SELECT * FROM habit JOIN user ON user.id = habit.id_user")) {
  echo("Error description: " . $kon -> error);
}

if ($result = mysqli_query($kon, "SELECT habit.nama_habbit, user.email, habit.catatan, habit.catatan_besok FROM habit JOIN user ON user.id = habit.id_user")) {
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        
        $to = $row["email"]; 
        $from = 'admin@mineversal.com'; 
        $fromName = 'Mineversal';
        $namaHabit = $row["nama_habbit"];
        $catatan = $row["catatan"];
        $catatanBesok = $row["catatan_besok"];
         
        $subject = "Habit Tracker"; 
         
        $htmlContent = ' 
            <html> 
            <head> 
                <title>Habit Tracker Reminder</title> 
            </head> 
            <body>
                <img src="https://tugas.mineversal.com/user/assets/img/logo.png" height="42">
                <h4>Halo! Kami ingin mengingatkan untuk tetap semangat dalam habit nya ya!</h4>
                <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                    <tr> 
                        <th>Habit Name:</th><td> '. $namaHabit .'</td> 
                    </tr> 
                    <tr style="background-color: #e0e0e0;"> 
                        <th>Catatan:</th><td>'. $catatan .'</td> 
                    </tr> 
                    <tr> 
                        <th>Catatan Besok:</th><td>'. $catatanBesok .'</td> 
                    </tr> 
                    <tr style="background-color: #e0e0e0;"> 
                        <th>Website:</th><td><a href="https://tugas.mineversal.com">Mineversal</a></td> 
                    </tr> 
                </table> 
            </body> 
            </html>'; 
         
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
         
        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        $headers .= 'Cc: -' . "\r\n"; 
        $headers .= 'Bcc: -' . "\r\n"; 
         
        // Send email 
        mail($to, $subject, $htmlContent, $headers);
        echo 'email sent.';
        }
    }
}

/*$from = "aldy10ball@mineversal.com";
$to = "aldy10ball@gmail.com";
$subject = "Checking PHP email";
$message = "PHP mail works just fine";
$headers = "From" . $from;
mail($to, $subject, $message);
echo "The email message was sent";*/

?>