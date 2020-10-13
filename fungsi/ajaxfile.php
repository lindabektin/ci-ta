<?php
// die(print_r($_POST));
    include '../fungsi/koneksi.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$filter = $_POST['filter'];

## Custom Field value
// $searchByTgl = $_POST['searchByTgl'];
// $searchByAktifitas = $_POST['searchByAktifitas'];

## Search 
$searchQuery = " ";
// if($searchByTgl != ''){
//     $searchQuery .= " and (tgl like '%".$searchByTgl."%' ) ";
// }
// if($searchByAktifitas != ''){
//     $searchQuery .= " and (aktivitas='".$searchByAktifitas."') ";
// }
if($searchValue != ''){
    $searchQuery .= " and (tgl like '%".$searchValue."%' or 
        waktu like '%".$searchValue."%' or 
        aktivitas like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
/*$sel = mysqli_query($koneksi,"select count(*) as allcount from aktivitas");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($koneksi,"select count(*) as allcount from aktivitas WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from aktivitas WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($koneksi, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
            "tgl"=>$row['tgl'],
            "waktu"=>$row['waktu'],
            "aktivitas"=>$row['aktivitas']
        );
}*/
if ($filter == 'mingguan') {
    $qdata = "SELECT * from aktivitas where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 7
                DAY ) AND NOW( ) {$searchQuery} order by waktu desc  limit ".$row.",".$rowperpage; //tabel 7 hari terakhir

    $qfilter = "SELECT count(*) as count from aktivitas where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 7
                DAY ) AND NOW( ) {$searchQuery} order by waktu desc"; //tabel 7 hari terakhir
    $qtotal = "SELECT count(*) as count from aktivitas where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 7
                DAY ) AND NOW( ) order by waktu desc "; //tabel 7 hari terakhir
}else{
    $qdata = "SELECT * from aktivitas 
                where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 30 DAY ) AND NOW( ) {$searchQuery} 
                order by waktu desc limit ".$row.",".$rowperpage; //tabel 30 hari terakhir
    $qfilter = "SELECT count(*) as count from aktivitas 
                where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 30 DAY ) AND NOW( ) {$searchQuery} 
                order by waktu desc"; //tabel 30 hari terakhir

    $qtotal = "SELECT count(*) as count from aktivitas 
                where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 30 DAY ) AND NOW( ) 
                order by waktu desc "; //tabel 30 hari terakhir
}

$qtotal = mysqli_query($koneksi, $qtotal);
$records = mysqli_fetch_assoc($qtotal);
$totalRecords = $records['count'];

$qfilter = mysqli_query($koneksi, $qfilter);
$records = mysqli_fetch_assoc($qfilter);
$totalRecordwithFilter = $records['count'];

// $qdata = mysqli_query($koneksi, $qdata);
$empRecords = mysqli_query($koneksi, $qdata);
$data = array();
// die($qdata);

while ($row = mysqli_fetch_assoc($empRecords)) {
    // die(print_r($row));
    $data[] = array(
            "tgl"=>$row['tgl'],
            "waktu"=>$row['waktu'],
            "aktivitas"=>$row['aktivitas']
        );
}


## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
