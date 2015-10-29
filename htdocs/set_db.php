<?php
require_once '../init.php';

//$query = "select id from rubric;";
//$result = $pdo->query($query)->fetchAll();
//$rubrics = [];
//foreach ($result as $rubric) {
//	$rubrics[] = $rubric['id'];
//}






//$query = 'select id, street, building from building ORDER BY street, building';
//$result = $pdo->query($query)->fetchAll();
//$street = '';
//$building = '';
//foreach ($result as $one) {
//	$newBuidling = rand(1, 200);
//	if ($one['street'] == $street && $one['building'] == $building) {
//		$update = "update building set building = '$newBuidling' where id=$one[id]";
//		$pdo->query($update);
//	}
//	$building = $one['building'];
//	$street = $one['street'];
//}

//$query = 'select id from building';
//$result = $pdo->query($query)->fetchAll();
//for ($i = 1; $i < 100; $i++) {
//	$buildingId = $result[rand(0, count($result)-1)]['id'];
//	$query = "INSERT INTO firm SET name = 'Фирма $i', building = $buildingId";
//	$pdo->query($query);
//}

//for ($i = 198; $i < 297; $i++) {
//	$phone = rand(11111111, 99999999);
//	$query = "INSERT INTO firm_phones set firm_id=$i, phone='$phone'";
//	$pdo->query($query);
//	if (rand(1,2) == 2) {
//		$phone = rand(1111111, 9999999);
//		$query = "INSERT INTO firm_phones set firm_id=$i, phone='$phone'";
//		$pdo->query($query);
//	}
//}

//$query = 'select id from firm';
//$result = $pdo->query($query)->fetchAll();
//foreach ($result as $firm) {
//	$rubricId = rand(1, 14);
//	$query = 'insert into firm_rubrics set firm_id=' . $firm['id'] . ', rubric_id=' . $rubricId; 
//	$pdo->query($query);
//	if (rand(1,4) == 2) {
//		$secondRubricId = rand(1, 14);
//		if ($secondRubricId != $rubricId) {
//			$query = 'insert into firm_rubrics set firm_id=' . $firm['id'] . ', rubric_id=' . $secondRubricId; 
//			$pdo->query($query);
//		}
//	}
//}