<?php
declare(strict_types=1);

require_once 'EventViewModel.php';
require_once 'IdViewModel.php';

class Events
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

     /**
     * @return EventViewModel []
     */ 
    public function getAll(): array
    {
        $statement = $this->connection->query(
            "
            SELECT DISTINCT `id_w` AS id, `surname` AS surname, `name` AS name, `patronymic` AS patronymic,
            orders.service_execution_time AS serviceExecutionTime, services.name_of_service AS nameOfService, services_car_categories.price AS price
            FROM workers, orders, services, services_car_categories, orders_services_car_categories
            WHERE (orders_services_car_categories.services_car_categories_id=services_car_categories.id
            AND orders.worker_id = workers.id_w AND orders_services_car_categories.orders_id=orders.id
            AND services_car_categories.service_id = services.id)
            ORDER BY surname, serviceExecutionTime
            "
        );

        return $statement->fetchAll(PDO::FETCH_CLASS, EventViewModel::class);
    }

    /**
     * @param int $workerId
     * @return EventViewModel []
     */
    public function getByWorker(int $workerId): array
    {
        $statement = $this->connection->prepare(
            "
            SELECT DISTINCT `id_w` AS id, `surname` AS surname, `name` AS name, `patronymic` AS patronymic,
            orders.service_execution_time AS serviceExecutionTime, services.name_of_service AS nameOfService, services_car_categories.price AS price
            FROM workers, orders, services, services_car_categories, orders_services_car_categories
            WHERE (orders_services_car_categories.services_car_categories_id=services_car_categories.id
            AND orders.worker_id = workers.id_w AND orders_services_car_categories.orders_id=orders.id
            AND services_car_categories.service_id = services.id AND id_w=?)
            ORDER BY surname, serviceExecutionTime
            "
        );

        $statement->execute([$workerId]);

        return $statement->fetchAll(PDO::FETCH_CLASS, EventViewModel::class);
    }

    public function getWorkersIds(): array
    {
        return $this->connection->query(
            "
            SELECT DISTINCT id_w FROM workers 
            "
        )
        ->fetchAll(PDO::FETCH_CLASS, IdViewModel::class);
    }
}