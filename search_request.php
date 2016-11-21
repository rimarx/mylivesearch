<?php
require_once 'db_connect.php';

$answer = '';

//обработка запроса: либо с ссылки живого поиска, либо с формы
if(isset($_REQUEST["search_request_city_id"]) && $_REQUEST["search_request_city_id"] != ' '){
	$search_var = (int)$_REQUEST["search_request_city_id"];
	$quer_str = "SELECT `city_name`, `country_name` FROM `cities`, `countries`  WHERE `city_id` = ? AND  `cities`.`country_id` = `countries`.`country_id`";
}
if(isset($_REQUEST["search_request_form"]) && $_REQUEST["search_request_form"] != ' '){
	$search_var = trim(strip_tags(stripcslashes(htmlspecialchars($_REQUEST["search_request_form"]))));
	$quer_str = "SELECT `city_name`, `country_name` FROM `cities`, `countries`  WHERE `city_name` = ? AND  `cities`.`country_id` = `countries`.`country_id`";
}
if(isset($quer_str)){
	$stmt = $pdo->prepare($quer_str);

	$stmt->execute(array($search_var));

	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if(!empty($result)){
		$answer = '<p>'.$result['city_name'].'('.$result['country_name'].')</p>';
	}
	else if(isset($result) && empty($result)){
		$answer = 'Нет соответсвий';
	}
}