<?php
declare(strict_types=1);

require_once '../Models/EventViewModel.php';
require_once '../Models/IdViewModel.php';

class EventsRepository
{
    public function getByWorker(int $workerId): array
    {
        $query = "
select distinct 
       w.id         as id,
       w.first_name as firstName,
       w.last_name  as lastName,
       w.patronymic as patronymic,
       e.ended_at   as endedAt,
       es.title     as status,
       s.title      as serviceName,
       s.price      as price

from events as e
         join workers as w on e.worker_id = w.id
         join services as s on e.service_id = s.id
         join event_statuses es on e.status_id = es.id
where w.id = ? 
";
        return R::getAll($query, [$workerId]);

    }

    public function getWorkersIds(): array
    {
        $query = "
select distinct id as worker_id
from workers 
";
        return R::getAll($query);

    }

}
