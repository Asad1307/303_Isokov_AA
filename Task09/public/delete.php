<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление данных о мастере</title>
</head>


<body>
    <form method="post" enctype="application/x-www-form-urlencoded" action="help_delete.php">

        <?php
            $w_id = $_GET['id'];
        ?>

        <input type="hidden" name="w_id" value=<?=$w_id?>>

        <legend>Вы действительно хотите удалить запись о данном мастере из базы?</legend>
        <p><button>Удалить запись</button></p>

    </form>

    <form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
    <p><button>Вернуться к главному меню</button></p>

    </form>

</body>
</html> 