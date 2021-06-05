<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление данных о новом мастере</title>
</head>



<body>
    <form method="post" enctype="application/x-www-form-urlencoded" action="help_create.php">

        <legend style="color: red">Все поля, лежащие ниже, обязательны для заполнения!</legend>
        <fieldset>
        
            <legend> Личная информация о мастере </legend>
            <p><label>Фамилия: <input name="surname"></label></p>
            <p><label>Имя: <input name="name"></label></p>
            <p><label>Отчество: <input name="patronymic"></label></p>
            <p><label>Дата рождения: <input type="date" name="date_of_birth"></label></p>


        </fieldset>
        <fieldset>
            <legend> Рабочая информация о мастере </legend>
            <fieldset>
                <legend> Специализация </legend>


                <p><label> <input type="radio" name="specialization" value="Автомеханик"> Автомеханик </label></p>
                <p><label> <input type="radio" name="specialization" value="Автоэлектрик"> Автоэлектрик </label></p>
                <p><label> <input type="radio" name="specialization" value="Мастер кузовного ремонта"> Мастер кузовного ремонта </label></p>
                <p><label> <input type="radio" name="specialization" value="Автомаляр"> Автомаляр </label></p>
                <p><label> <input type="radio" name="specialization" value="Автожестянщик"> Автожестянщик </label></p>
            </fieldset>
            <fieldset>
                <legend> Работы, которые может выполнять мастер </legend>
                <p><label> <input type="checkbox" name="change_of_oil_in_ICE" value="yes"> Замена масла в ДВС </label></p>
                <p><label> <input type="checkbox" name="oil_filter_change" value="yes"> Замена масляного фильтра </label></p>
                <p><label> <input type="checkbox" name="fuel_filter_change" value="yes"> Замена топливного фильтра </label></p>
                <p><label> <input type="checkbox" name="brake_fluid_change" value="yes"> Замена тормозной жидкости </label></p>
                <p><label> <input type="checkbox" name="injector_flushing" value="yes"> Промывка инжектора </label></p>
                <p><label> <input type="checkbox" name="replacement_of_spark_plugs" value="yes"> Замена свечей зажигания </label></p>
                <p><label> <input type="checkbox" name="change_of_oil" value="yes"> Замена масла </label></p>
                <p><label> <input type="checkbox" name="engine_overhaul" value="yes"> Капитальный ремонт двигателя </label></p>
                <p><label> <input type="checkbox" name="belt_and_chain_replacement_in_valvetrain" value="yes"> Замена ремня и цепи ГРМ </label></p>
                <p><label> <input type="checkbox" name="radiator_replacement" value="yes"> Замена радиатора </label></p>
                <p><label> <input type="checkbox" name="turbine_replacement" value="yes"> Замена турбины </label></p>
                <p><label> <input type="checkbox" name="full_body_painting" value="yes"> Покраска кузова автомобиля (полная окраска одного элемента) </label></p>
                <p><label> <input type="checkbox" name="local_body_painting" value="yes"> Покраска кузова автомобиля (локальная окраска одного элемента) </label></p>
                <p><label> <input type="checkbox" name="bumper_repair" value="yes"> Ремонт бампера </label></p>
                <p><label> <input type="checkbox" name="vacuum_dent_removal" value="yes"> Вакуумное удаление вмятин без покраски </label></p>
                <p><label> <input type="checkbox" name="restoration_of_body_geometry" value="yes"> Восстановление геометрии кузова </label></p>
                <p><label> <input type="checkbox" name="clutch_replacement" value="yes"> Замена сцепления </label></p>
                <p><label> <input type="checkbox" name="shock_absorber_replacement" value="yes"> Замена амортизатора </label></p>
                <p><label> <input type="checkbox" name="camber_toe_diagnostics" value="yes"> Компьютерная диагностика развал-схождение 3D </label></p>
                <p><label> <input type="checkbox" name="wheel_balancing" value="yes"> Балансировка колёс </label></p>
                <p><label> <input type="checkbox" name="automatic_transmission_replacement" value="yes"> Замена АКПП </label></p>
                <p><label> <input type="checkbox" name="manual_transmission_repair" value="yes"> Ремонт МКПП </label></p>
                <p><label> <input type="checkbox" name="parking_sensors_installation" value="yes"> Установка парктроников </label></p>
                <p><label> <input type="checkbox" name="rear_view_cameras_installation" value="yes"> Установка камер заднего вида </label></p>
                <p><label> <input type="checkbox" name="car_soundproofing" value="yes"> Шумоизоляция автомобиля </label></p>
                <p><label> <input type="checkbox" name="car_wash" value="yes"> Автомойка </label></p>
                <p><label> <input type="checkbox" name="car_polishing" value="yes"> Полировка </label></p>
                <p><label> <input type="checkbox" name="car_dry_cleaning" value="yes"> Химчистка </label></p>
            </fieldset>
            <p><label>Процент выручки: <input type="number" min="1" max="99" name="percentage_of_revenue"></label></p>
            <fieldset>
                <legend> Статус </legend>
                <p><label> <input type="radio" name="status" value="является работником"> Является работником </label></p>
                <p><label> <input type="radio" name="status" value="не является работником"> Не является работником </label></p>
            </fieldset>
        </fieldset>
        <p><button>Отправить данные</button></p>
    </form>
</body>
</html> 