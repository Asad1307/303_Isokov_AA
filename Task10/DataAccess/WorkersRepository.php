<?php

require_once '../Models/WorkerViewModel.php';
require_once '../Models/WorkerModel.php';

class WorkersRepository
{
    /**
     * @return WorkerViewModel []
     */
    public function getAll(): array
    {
        $query = "
select
    w.id,
    w.first_name as firstName,
    w.last_name as lastName,
    w.patronymic,
    s.title as specialty
from workers as w
join specialties as s on w.speciality_id = s.id
order by lastName
         ";
        return R::getAll($query);
    }

    public function addWorker(WorkerModel $worker): void
    {
        $newWorker = R::dispense('workers');
        $newWorker->first_name = $worker->first_name;
        $newWorker->last_name = $worker->last_name;
        $newWorker->patronymic = $worker->patronymic;
        $newWorker->date_of_birth = $worker->date_of_birth;
        $newWorker->speciality_id = $worker->speciality_id;
        $newWorker->earning_in_percents = $worker->earning_in_percents;
        $newWorker->employee_status_id = $worker->employee_status_id;
        R::store($newWorker);

    }

    public function getWorker(int $id)
    {
        $query = "
select
    id,
    first_name,
    last_name,
    patronymic,
    date_of_birth,
    speciality_id,
    earning_in_percents,
    employee_status_id
from workers
where id = ?;
         ";
        return R::getAll($query, [$id]);

    }

    public function removeWorkerById(int $id)
    {
        $worker = R::load('workers', $id);
        R::trash( $worker );
    }

    public function updateWorker(array $worker): void
    {
        $newWorker = R::load('workers', $worker['id']);
        $newWorker->first_name = $worker['first_name'];
        $newWorker->last_name = $worker['last_name'];
        $newWorker->patronymic = $worker['patronymic'];
        $newWorker->date_of_birth = $worker['date_of_birth'];
        $newWorker->speciality_id = $worker['speciality_id'];
        $newWorker->earning_in_percents = $worker['earning_in_percents'];
        $newWorker->employee_status_id = $worker['employee_status_id'];
        R::store($newWorker);
    }

}