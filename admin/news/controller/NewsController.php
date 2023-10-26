<?php
require "function php/conn.php";

$sql = ' SELECT `id`, `title`, `description`, `imageName`, `status`, DATE_FORMAT(`dateUploaded`, "%M %d, %Y") AS dateUploaded, `author` FROM `tbl_news` ORDER BY `dateUploaded` DESC ';

$result = mysqli_query($conn, $sql);
$news = [];

while($row = mysqli_fetch_array($result)) {
	// $description = html_entity_decode($row['description']);
	$description = $row['description'];
	$news[] = [
		'id' => $row['id'],
		'title' => $row['title'],
		// 'description' => mb_strimwidth($description, 0, 250, '...'),
		'description' => $row['description'],
		'image' => "../images/news/". $row["imageName"],
		'status' => $row["status"],
		'dateuploaded' => $row["dateUploaded"],
		'author' => $row["author"]
	];
}
