<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$id_b = $_POST['busyness_id'];

$query = "UPDATE 'busyness' SET is_actual='нет' WHERE busyness.id=:id_b".";";
$statement = $pdo->prepare($query);
$statement->bindValue(':id_b',$id_b,PDO::PARAM_INT);
$statement->execute();

?>

<!DOCTYPE html>
<html lang="en">


<body>

<a href="schedule.php?id_w=<?= $_POST['id_w'] ?>">Вернуться к расписанию выбранного мастера</a>

    <form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
        <p><button>Вернуться к главному меню</button></p>
    </form>

</body>

</html>