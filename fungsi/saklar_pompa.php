<?php
include '../fungsi/koneksi.php';
header("Content-type:application/json");
if (isset($_GET['idsensor']) && isset($_GET['status_sensor'])) { // jika mendapatkan checkbox
    // silahkan olah data php disini
    $idsensor = $_GET['idsensor'];
    $status_sensor = $_GET['status_sensor'];

    $statussensor = $status_sensor == 'true' ? 'on' : 'off';

    if (mysqli_query($koneksi, "UPDATE sensor SET status_sensor='$statussensor' WHERE idsensor='$idsensor' ")) {
        $stt = 'sukses';
    } else {
        $stt = 'gagal';
    }
    // pengembaian data berupa json
    echo json_encode(array(
        "success" => 1,
        "data" => $stt
    ));
} else {  // jika tidak
    echo json_encode(array(
        "success" => 0,
        "data" => "data tidak ada"
    ));
}
