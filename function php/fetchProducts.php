<?php
require "conn.php";



$columns = array("filename","title","status","dateUploaded");
$query = "SELECT * FROM `tbl_knowledge_products` " ;


if(isset($_POST["search"]["value"])) {
 $query .= '

WHERE (filename LIKE "%'.$_POST["search"]["value"].'%"
Or title LIKE "%'.$_POST["search"]["value"].'%"
Or status LIKE "%'.$_POST["search"]["value"].'%"
Or dateUploaded LIKE "%'.$_POST["search"]["value"].'%")


 ';
}



if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
} else {
 $query .= 'ORDER BY id DESC ';
}





$query1 = '';

if($_POST["length"] != -1) {
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query.$query1);

$data = array();

while($row = mysqli_fetch_array($result)) {

$phpdate = strtotime( $row['dateUploaded'] );
$mysqldate = date( 'M d, Y', $phpdate );



 $sub_array = array();



 $sub_array[] = '<div id="td_address'.$row["id"].'" data-data1="'.$row["filename"].'"><a href="admin/function php/download.php?fileName='.$row['filename'].'">'.$row["filename"].'<a></div>';
 $sub_array[] = '<div id="td_mobile'.$row["id"].'" data-data2="'.$row["title"].'">'.$row["title"].'</div>';
 $sub_array[] = '<div id="td_birthday'.$row["id"].'" data-data3="'.$mysqldate.'" style="backgroud-color:red;">'.$mysqldate.'</div>';


 $sub_array[] .= '<center>
    <div class="cell-button-alignment">
    <div class="cell-button btn-group">
     <button style="width:60px;" type="button" id="td_btn_edit" data-id_edit="'.$row["filename"].'" class="btn btn-md btn-primary">
     <span class="fa fa-eye"></span></button>
     <button style="width:60px;" type="button" id="td_btn_delete" data-id_delete="'.$row["filename"].'" class="btn btn-md btn-danger">
     <span class="fa fa-download"></span></button>
     </div>
    
    </div>
    </center>';  



  
    


 $data[] = $sub_array;
}
function get_all_data($conn) {
require "conn.php";
$query = "SELECT * FROM `tbl_knowledge_products` " ;
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}


$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data,
 "status"    => ''
);

echo json_encode($output);





























//=======================================================================================


?>







