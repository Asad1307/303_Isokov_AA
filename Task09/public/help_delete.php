<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$query = "UPDATE 'workers' SET 'status'="."'не является работником'"." WHERE id_w=".$_POST['w_id'].";";
$statement = $pdo->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<body>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к главному меню</button></p>
</form>

</body>

</html>