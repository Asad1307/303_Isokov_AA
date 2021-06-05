<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление записи в расписании мастера</title>
</head>


<body>
    <form method="post" enctype="application/x-www-form-urlencoded" action="help_delete_schedule.php">

        <?php
            $id_w = $_GET['id_w'];
            $busyness_id = $_GET['busyness_id'];
        ?>

        <input type="hidden" name="id_w" value=<?=$id_w?>>
        <input type="hidden" name="busyness_id" value=<?=$busyness_id?>>

        <legend>Вы действительно хотите удалить данную запись в расписании мастера из базы?</legend>
        <p><button>Удалить запись</button></p>

    </form>

    <form method="post" enctype="application/x-www-form-urlencoded" action="schedule.php">
    <p><button>Вернуться к расписанию выбранного мастера</button></p>

    </form>

    <form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
    <p><button>Вернуться к главному меню</button></p>

    </form>

</body>
</html> 