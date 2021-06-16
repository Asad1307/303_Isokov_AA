<?php

require_once '../Models/ScheduleModel.php';

class ScheduleRepository
{

    public function getById($id): array
    {
        $query =
            "
select w.id as master_id,
       m.mon_start,
       m.mon_end,
       m.tue_start,
       m.tue_end,
       m.wed_start,
       m.wed_end,
       m.thu_start,
       m.thu_end,
       m.fri_start,
       m.fri_end,
       m.sat_start,
       m.sat_end,
       m.sun_start,
       m.sun_end
from schedule as m
         join workers as w on m.id = w.id
         where w.id = :id
         ";
        return R::getAll($query, [$id]);
    }

    public function addSchedule($schedule): void
    {
        $newSchedule = R::dispense('schedule');
        $newSchedule->id = $schedule->id;
        $newSchedule->mon_start = $schedule->mon_start;
        $newSchedule->mon_end = $schedule->mon_end;
        $newSchedule->tue_start = $schedule->tue_start;
        $newSchedule->tue_end = $schedule->tue_end;
        $newSchedule->wed_start = $schedule->wed_start;
        $newSchedule->wed_end = $schedule->wed_end;
        $newSchedule->thu_start = $schedule->thu_start;
        $newSchedule->thu_end = $schedule->thu_end;
        $newSchedule->fri_start = $schedule->fri_start;
        $newSchedule->fri_end = $schedule->fri_end;
        $newSchedule->sat_start = $schedule->sat_start;
        $newSchedule->sat_end = $schedule->sat_end;
        $newSchedule->sun_start = $schedule->sun_start;
        $newSchedule->sun_end = $schedule->sun_end;
        R::store($newSchedule);

    }

    public function updateSchedule($schedule): void
    {
        $newSchedule = R::load('schedule', $schedule['id']);
        $newSchedule->mon_start = $schedule['mon_start'];
        $newSchedule->mon_end = $schedule['mon_end'];
        $newSchedule->tue_start = $schedule['tue_start'];
        $newSchedule->tue_end = $schedule['tue_end'];
        $newSchedule->wed_start = $schedule['wed_start'];
        $newSchedule->wed_end = $schedule['wed_end'];
        $newSchedule->thu_start = $schedule['thu_start'];
        $newSchedule->thu_end = $schedule['thu_end'];
        $newSchedule->fri_start = $schedule['fri_start'];
        $newSchedule->fri_end = $schedule['fri_end'];
        $newSchedule->sat_start = $schedule['sat_start'];
        $newSchedule->sat_end = $schedule['sat_end'];
        $newSchedule->sun_start = $schedule['sun_start'];
        $newSchedule->sun_end = $schedule['sun_end'];
        R::store($newSchedule);

    }

}