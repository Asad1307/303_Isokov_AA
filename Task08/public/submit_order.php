<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

// используем Московское время
date_default_timezone_set('Europe/Moscow');

$date = date('Y-m-d H:i', time());

if (strcasecmp($_POST['date_order'],"")!=0 and strcasecmp($_POST['time_order'],"")!=0 and strcasecmp($_POST['phone_number'],"")!=0 and strcasecmp($_POST['car_brand'],"")!=0 and strcasecmp($_POST['car_model'],"")!=0 and strcasecmp($_POST['id_worker'],"")!=0 and strcasecmp($_POST['id_service_car_category'],"")!=0){
    $query = "INSERT INTO 'orders'('time_of_record','service_execution_time','client_phone','status','car_brand','car_model','worker_id') VALUES ("."'".$date."','".$_POST['date_order']." ".$_POST['time_order']."','".$_POST['phone_number']."','да','".$_POST['car_brand']."','".$_POST['car_model']."',".(int)$_POST['id_worker'].");";
    $statement = $pdo->query($query);
    $last_row_id_order = $pdo->lastInsertID();
    $query = "INSERT INTO 'orders_services_car_categories'('orders_id','services_car_categories_id') VALUES (".$last_row_id_order.",".(int)$_POST['id_service_car_category'].");";
    $statement = $pdo->query($query);
}


?>

<!DOCTYPE html>
<html lang="en">

<body>
<form method="post" enctype="application/x-www-form-urlencoded" action="orders.php">

<p><button>Вернуться к вводу информации о заказе</button></p>
</form>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к выбору формы для ввода</button></p>
</form>

</body>

</html>