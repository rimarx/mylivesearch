<?php
require_once 'db_connect.php';

$answer = '';

$search_data = trim(strip_tags(stripcslashes(htmlspecialchars($_REQUEST["live_search"]))));
$search_data = $search_data.'%';
$stmt = $pdo->prepare("SELECT `city_name`, `city_id` FROM `cities` WHERE `city_name` LIKE ?");

if($stmt->execute(array($search_data))){
	foreach($stmt as $row)
	{
	    $answer .= '<li><a href="?search_request_city_id='.$row['city_id'].'">'.$row['city_name'].'</a></li>';
	}
}
echo $answer === '' ? '<li>Нет соответсвий</li>' : $answer;
