<?php
header("Content-type:application/json");
if (isset($_GET['dataCheckbox'])) { // jika mendapatkan checkbox
    // silahkan olah data php disini

    // pengembaian data berupa json
    echo json_encode(array(
        "success" => 1,
        "data" => 'data yang dikirim : ' . $_GET['dataCheckbox']
    ));
} else {  // jika tidak
    echo json_encode(array(
        "success" => 0,
        "data" => "data tidak ada"
    ));
}
