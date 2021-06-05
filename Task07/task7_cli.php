<?php

$pdo = new PDO('sqlite:service_station.db');

$queryStart = "SELECT `id_w`, `surname`, `name`, `patronymic` FROM workers";
$statement = $pdo->query($queryStart);
$rows = $statement->fetchAll();

echo "Мастера, находящиеся в базе:\n";
foreach ($rows as $row) {
    echo $row['id_w'] . ' ' . $row['surname'] . ' ' . $row['name'] .' '. $row['patronymic'] . "\n";
}
$statement->closeCursor();

echo "-------------------------------------\n";

$number = readline("Введите номер мастера: ");

$check = iconv_strlen($number);

$query = "SELECT `id_w`, `surname`, `name`, `patronymic`, orders.service_execution_time, services.name_of_service, services_car_categories.price FROM workers, orders, services, services_car_categories,orders_services_car_categories WHERE (orders_services_car_categories.services_car_categories_id=services_car_categories.id AND orders.worker_id = workers.id_w AND orders_services_car_categories.orders_id=orders.id AND services_car_categories.service_id = services.id) ORDER BY workers.surname, orders.service_execution_time";
$statement = $pdo->query($query);
$rows = $statement->fetchAll();

$dl1 = iconv_strlen('id_w');
$dl2 = iconv_strlen('surname');
$dl3 = iconv_strlen('name');
$dl4 = iconv_strlen('patronymic');
$dl5 = iconv_strlen('service_execution_time');
$dl6 = iconv_strlen('name_of_service');
$dl7 = iconv_strlen('price');


if ($check == 0) {

	//	Поиск максимальной длины ячейки таблицы
    foreach ($rows as $row) {
        if (iconv_strlen($row['id_w'])>$dl1){
            $dl1 = iconv_strlen($row['id_w']);
        }
		if (iconv_strlen($row['surname'])>$dl2){
            $dl2 = iconv_strlen($row['surname']);
        }
		if (iconv_strlen($row['name'])>$dl3){
            $dl3 = iconv_strlen($row['name']);
        }
		if (iconv_strlen($row['patronymic'])>$dl4){
            $dl4 = iconv_strlen($row['patronymic']);
        }
		if (iconv_strlen($row['service_execution_time'])>$dl5){
            $dl5 = iconv_strlen($row['service_execution_time']);
        }
		if (iconv_strlen($row['name_of_service'])>$dl6){
            $dl6 = iconv_strlen($row['name_of_service']);
        }
		if (iconv_strlen($row['price'])>$dl7){
            $dl7 = iconv_strlen($row['price']);
        }
    }

	
	echo mb_chr(9484,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9488,'UTF-8');
    echo "\n".mb_chr(9474,'UTF-8').'id_w'.str_repeat(mb_chr(32,'UTF-8'),$dl1-iconv_strlen('id_w')) . mb_chr(9474,'UTF-8') . 'surname'.str_repeat(mb_chr(32,'UTF-8'), $dl2-iconv_strlen('surname')) . mb_chr(9474,'UTF-8'). 'name'.str_repeat(mb_chr(32,'UTF-8'), $dl3-iconv_strlen('name')).mb_chr(9474,'UTF-8') . 'patronymic'.str_repeat(mb_chr(32,'UTF-8'), $dl4-iconv_strlen('patronymic')) .mb_chr(9474,'UTF-8') . 'service_execution_time'.str_repeat(mb_chr(32,'UTF-8'), $dl5-iconv_strlen('service_execution_time')) .mb_chr(9474,'UTF-8') . 'name_of_service'.str_repeat(mb_chr(32,'UTF-8'), $dl6-iconv_strlen('name_of_service')).mb_chr(9474,'UTF-8') . 'price'.str_repeat(mb_chr(32,'UTF-8'), $dl7-iconv_strlen('price')). mb_chr(9474,'UTF-8') ;
    echo "\n".mb_chr(9500,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9508,'UTF-8');


	foreach ($rows as $row) {
        echo "\n".mb_chr(9474,'UTF-8').$row['id_w'].str_repeat(mb_chr(32,'UTF-8'),$dl1-iconv_strlen($row['id_w'])) . mb_chr(9474,'UTF-8') . $row['surname'].str_repeat(mb_chr(32,'UTF-8'), $dl2-iconv_strlen($row['surname'])) . mb_chr(9474,'UTF-8'). $row['name'].str_repeat(mb_chr(32,'UTF-8'), $dl3-iconv_strlen($row['name'])).mb_chr(9474,'UTF-8') . $row['patronymic'].str_repeat(mb_chr(32,'UTF-8'), $dl4-iconv_strlen($row['patronymic'])) .mb_chr(9474,'UTF-8') . $row['service_execution_time'].str_repeat(mb_chr(32,'UTF-8'), $dl5-iconv_strlen($row['service_execution_time'])) .mb_chr(9474,'UTF-8') . $row['name_of_service'].str_repeat(mb_chr(32,'UTF-8'), $dl6-iconv_strlen($row['name_of_service'])).mb_chr(9474,'UTF-8') . $row['price'].str_repeat(mb_chr(32,'UTF-8'), $dl7-iconv_strlen($row['price'])). mb_chr(9474,'UTF-8') ;
		echo "\n".mb_chr(9500,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9508,'UTF-8');
    }
	//	Очищаем содержимое последней строки
	echo "\r".str_repeat(" ",8+$dl1+$dl2+$dl3+$dl4+$dl5+$dl6+$dl7)."\r";
    echo mb_chr(9492,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9496,'UTF-8')."\n";

    echo "-------------------------------------\n";

}

else {
    foreach ($rows as $row) {
        if ($number == $row['id_w']){
            if (iconv_strlen($row['id_w'])>$dl1){
                $dl1 = iconv_strlen($row['id_w']);
            }
            if (iconv_strlen($row['surname'])>$dl2){
                $dl2 = iconv_strlen($row['surname']);
            }
            if (iconv_strlen($row['name'])>$dl3){
                $dl3 = iconv_strlen($row['name']);
            }
            if (iconv_strlen($row['patronymic'])>$dl4){
                $dl4 = iconv_strlen($row['patronymic']);
            }
            if (iconv_strlen($row['service_execution_time'])>$dl5){
                $dl5 = iconv_strlen($row['service_execution_time']);
            }
            if (iconv_strlen($row['name_of_service'])>$dl6){
                $dl6 = iconv_strlen($row['name_of_service']);
            }
            if (iconv_strlen($row['price'])>$dl7){
                $dl7 = iconv_strlen($row['price']);
            }
        }
    }

    echo mb_chr(9484,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9516,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9488,'UTF-8');

    $flagBool = FALSE;
    $count = 0;

    foreach ($rows as $row) {
        if ($number == $row['id_w']){
            $flagBool = TRUE;
            if ($count==0){
                echo "\n".mb_chr(9474,'UTF-8').'id_w'.str_repeat(mb_chr(32,'UTF-8'),$dl1-iconv_strlen('id_w')) . mb_chr(9474,'UTF-8') . 'surname'.str_repeat(mb_chr(32,'UTF-8'), $dl2-iconv_strlen('surname')) . mb_chr(9474,'UTF-8'). 'name'.str_repeat(mb_chr(32,'UTF-8'), $dl3-iconv_strlen('name')).mb_chr(9474,'UTF-8') . 'patronymic'.str_repeat(mb_chr(32,'UTF-8'), $dl4-iconv_strlen('patronymic')) .mb_chr(9474,'UTF-8') . 'service_execution_time'.str_repeat(mb_chr(32,'UTF-8'), $dl5-iconv_strlen('service_execution_time')) .mb_chr(9474,'UTF-8') . 'name_of_service'.str_repeat(mb_chr(32,'UTF-8'), $dl6-iconv_strlen('name_of_service')).mb_chr(9474,'UTF-8') . 'price'.str_repeat(mb_chr(32,'UTF-8'), $dl7-iconv_strlen('price')). mb_chr(9474,'UTF-8') ;
                echo "\n".mb_chr(9500,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9508,'UTF-8');

                echo "\n".mb_chr(9474,'UTF-8').$row['id_w'].str_repeat(mb_chr(32,'UTF-8'),$dl1-iconv_strlen($row['id_w'])) . mb_chr(9474,'UTF-8') . $row['surname'].str_repeat(mb_chr(32,'UTF-8'), $dl2-iconv_strlen($row['surname'])) . mb_chr(9474,'UTF-8'). $row['name'].str_repeat(mb_chr(32,'UTF-8'), $dl3-iconv_strlen($row['name'])).mb_chr(9474,'UTF-8') . $row['patronymic'].str_repeat(mb_chr(32,'UTF-8'), $dl4-iconv_strlen($row['patronymic'])) .mb_chr(9474,'UTF-8') . $row['service_execution_time'].str_repeat(mb_chr(32,'UTF-8'), $dl5-iconv_strlen($row['service_execution_time'])) .mb_chr(9474,'UTF-8') . $row['name_of_service'].str_repeat(mb_chr(32,'UTF-8'), $dl6-iconv_strlen($row['name_of_service'])).mb_chr(9474,'UTF-8') . $row['price'].str_repeat(mb_chr(32,'UTF-8'), $dl7-iconv_strlen($row['price'])). mb_chr(9474,'UTF-8') ;
                echo "\n".mb_chr(9500,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9508,'UTF-8');
            }
            else {
                echo "\n".mb_chr(9474,'UTF-8').$row['id_w'].str_repeat(mb_chr(32,'UTF-8'),$dl1-iconv_strlen($row['id_w'])) . mb_chr(9474,'UTF-8') . $row['surname'].str_repeat(mb_chr(32,'UTF-8'), $dl2-iconv_strlen($row['surname'])) . mb_chr(9474,'UTF-8'). $row['name'].str_repeat(mb_chr(32,'UTF-8'), $dl3-iconv_strlen($row['name'])).mb_chr(9474,'UTF-8') . $row['patronymic'].str_repeat(mb_chr(32,'UTF-8'), $dl4-iconv_strlen($row['patronymic'])) .mb_chr(9474,'UTF-8') . $row['service_execution_time'].str_repeat(mb_chr(32,'UTF-8'), $dl5-iconv_strlen($row['service_execution_time'])) .mb_chr(9474,'UTF-8') . $row['name_of_service'].str_repeat(mb_chr(32,'UTF-8'), $dl6-iconv_strlen($row['name_of_service'])).mb_chr(9474,'UTF-8') . $row['price'].str_repeat(mb_chr(32,'UTF-8'), $dl7-iconv_strlen($row['price'])). mb_chr(9474,'UTF-8') ;
                echo "\n".mb_chr(9500,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9532,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9508,'UTF-8');
            
            }
            $count++;
        }
    }

    if ($flagBool){

        echo "\r".str_repeat(" ",8+$dl1+$dl2+$dl3+$dl4+$dl5+$dl6+$dl7)."\r";
        echo mb_chr(9492,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl1).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl2).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl3).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl4).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl5).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl6).mb_chr(9524,'UTF-8').str_repeat(mb_chr(9472,'UTF-8'),$dl7).mb_chr(9496,'UTF-8')."\n";
    }
    else{
        echo "\r".str_repeat(" ",8+$dl1+$dl2+$dl3+$dl4+$dl5+$dl6+$dl7)."\r";
        echo "У мастера с номером ".$number." пока нет выполненных заявок."."\n";
    }

}


?>