<?php
declare(strict_types=1);

require_once 'WorkersViewModel.php';
require_once 'BusynessViewModel.php';
require_once 'CompletedWorksViewModel.php';

class Events
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    /**
     * @return WorkersViewModel []
     */

    public function getWorkers(): array
    {
        $statement = $this->connection->query(
            "SELECT DISTINCT workers.id_w AS 'id_w', workers.status AS 'status', workers.surname AS 'surname', workers.name AS 'name', workers.patronymic AS 'patronymic', workers.specialization AS 'specialization' FROM 'workers' WHERE workers.status='является работником'"
        );

        return $statement->fetchAll(PDO::FETCH_CLASS, WorkersViewModel::class);
    }



    /**
     * @param string $idWorker
     * @return BusynessViewModel []
     */

    public function getBusynessByWorkerId(string $idWorker): array
    {
        $statement = $this->connection->prepare(
            "SELECT DISTINCT workers.id_w AS 'id_w', busyness.is_actual AS 'is_actual', workers_busyness.busyness_id AS 'busyness_id', busyness.data AS 'data', busyness.work_hours_start AS 'work_hours_start', busyness.work_hours_end AS 'work_hours_end' FROM 'workers','busyness','workers_busyness' WHERE workers.id_w=workers_busyness.worker_id AND workers_busyness.busyness_id=busyness.id AND is_actual='да' AND workers.id_w=?"
        );


        $statement->execute([$idWorker]);

        return $statement->fetchAll(PDO::FETCH_CLASS, BusynessViewModel::class);
    }

    
    /**
     * @param string $idWorker
     * @return CompletedWorksViewModel []
     */

    public function getCompletedWorksByWorkerId(string $idWorker): array
    {
        $statement = $this->connection->prepare(
            "SELECT DISTINCT workers.id_w As 'id_w', orders.status AS 'status', orders_services_car_categories.orders_id AS 'order_id', orders.service_execution_time AS 'service_execution_time', services_car_categories.service_id AS 'service_id', services.name_of_service AS 'name_of_service', services_car_categories.duration_in_hours AS 'duration_in_hours', services_car_categories.price AS 'price', services_car_categories.id AS 'services_car_categories_id' FROM 'workers', 'services', 'orders', 'services_car_categories', 'orders_services_car_categories' WHERE orders.worker_id=workers.id_w AND orders.id=orders_services_car_categories.orders_id AND services_car_categories.id=orders_services_car_categories.services_car_Categories_id AND services_car_categories.service_id=services.id AND orders.status='да' AND workers.id_w=?"
        );

        $statement->execute([$idWorker]);

        return $statement->fetchAll(PDO::FETCH_CLASS, CompletedWorksViewModel::class);
    }


}