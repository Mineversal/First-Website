<?php 
//fungsi
function http_request($url){

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);

    curl_close($ch);


    return $output;

}

$data = http_request("https://api.kawalcorona.com/indonesia/provinsi/");

$data =json_decode($data, true);

// echo "<prev>";
//     print_r($data);
// echo "<prev>";

$jumlah = count($data);

$nomor = 1;

for($i =0; $i < $jumlah; $i++){
    $hasil= $data[$i]['attributes'];
?>
    <tr>
        <td><?=$nomor++?></td>
        <td><?=$hasil['Provinsi']?></td>
        <td><?=$hasil['Kasus_Posi']?></td>
        <td><?=$hasil['Kasus_Semb']?></td>
        <td><?=$hasil['Kasus_Meni']?></td>
    </tr>
<?php
    }
?>