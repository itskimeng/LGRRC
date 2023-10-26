<?php 
include ('conn.php');

$newsId= $_POST["newsId"];
$title= $_POST["editTitle"];

$description= $_POST["editDesc"];
$oldDesc= $_POST["oldDesc"];


if ($description != '<div><br></div>') 
{
	$newDesc = $description;
}
else
{
	$newDesc = $oldDesc;
}

$newDesc = htmlentities($newDesc);	
$author= $_POST["editAuthor"];
$image_status= $_POST["imageStatus"];
$newsStatus= $_POST["newsStatus"];


$newDesc = str_replace("'", '&quot;', $newDesc);


$sqlUpdate = ' UPDATE `tbl_news` SET `title` = "'.$title.'", `description` = "'.$newDesc.'", `status` = "'.$newsStatus.'", `author` = "'.$author.'"  WHERE `id` = "'.$newsId.'"  ';
// $sql = ' UPDATE `tbl_news` SET `title` = "'.$title.'", `status` = "'.$newsStatus.'", `author` = "'.$author.'"  WHERE `id` = "'.$newsId.'" ';

$conn->query($sqlUpdate);

if ($image_status == 'new') 
{
	$sqlSelect = ' SELECT `imageName` FROM `tbl_news` WHERE `id` = "'.$newsId.'" ';
	$exec = $conn->query($sqlSelect);
	$res = $exec->fetch_assoc();
	unlink('../../images/news/'.$res['imageName']);


 	// $image_name= $_POST["image_name"];
	$image_name= basename($_FILES["file_updateProfile"]["name"]);
	echo "Success!";
	$last_id = $conn->insert_id; 

    if($_FILES["file_updateProfile"]["name"] != "")
    {
		$test=explode(".", $_FILES["file_updateProfile"]["name"]);
		$extension=end($test);
		$image = $newsId.'_'.$image_name.'.'.$extension;
		$location = '../../images/news/'.$image;
		move_uploaded_file($_FILES["file_updateProfile"]["tmp_name"], $location);

		echo $query = "UPDATE tbl_news SET imageName='$image' WHERE Id='$newsId'";
		mysqli_query($conn,$query);
	}
}


header('location: ../news.php');
 ?>