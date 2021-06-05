<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление данных о графике работы мастера</title>
</head>

<body>
    <form method="post" enctype="application/x-www-form-urlencoded" action="help_create_schedule.php">

        <?php

            $id_w = $_GET['id_w'];

        ?>

        <input type="hidden" name="id_w" value=<?=$id_w?>>
        <legend style="color: red">Все поля, лежащие ниже, обязательны для заполнения!</legend>
        <fieldset>
            <legend> Ввод данных о графике работы мастера на день (8-часовой рабочий день) </legend>

            <p><label>Дата: <input type="date" name="date_busyness"></label></p>
            <p><label>Время начала рабочего дня: <input type="time" min="08:00" max="12:00" name="busyness_time_start"></label></p>
            <p><label>Время окончания рабочего дня: <input type="time" min="16:00" max="20:00" name="busyness_time_end"></label></p>

        </fieldset>
        
        <p><button>Отправить данные</button></p>
    </form>
</body>
</html> 