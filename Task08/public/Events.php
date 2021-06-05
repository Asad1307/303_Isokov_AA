<?php
declare(strict_types=1);

require_once 'WorkersViewModel.php';
require_once 'ServiceViewModel.php';
require_once 'WorkersServiceViewModel.php';
require_once 'ServicesCarCategoriesViewModel.php';
require_once 'WorkersBusynessViewModel.php';

class Events
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

     /**
     * @return ServiceViewModel []
     */ 
    public function getNameServices(): array
    {
        $statement = $this->connection->query(
            "SELECT DISTINCT services.id AS idService, name_of_service AS nameOfService FROM 'services'"
        );

        return $statement->fetchAll(PDO::FETCH_CLASS, ServiceViewModel::class);
    }


    /**
     * @param string $idService
     * @return WorkersServiceViewModel []
     */
    public function getWorkersByService(string $idService): array
    {
        $statement = $this->connection->prepare(
            "
            SELECT DISTINCT id_w, surname, name, patronymic
            FROM workers, workers_services, services
            WHERE (services.id = workers_services.service_id
            AND workers_services.worker_id = workers.id_w
            AND services.id=?)
            "
        );

        $statement->execute([$idService]);

        return $statement->fetchAll(PDO::FETCH_CLASS, WorkersServiceViewModel::class);
    }


    /**
     * @param string $idService
     * @param string $idCarCategory
     * @return ServiceViewModel []
     */
    public function getServiceInfoByServiceId(string $idService, string $idCarCategory): array
    {
        $statement = $this->connection->prepare(
            "
            SELECT services_car_categories.id AS servicesCarCategoriesId,
            services_car_categories.duration_in_hours AS durationInHours,
            services_car_categories.price AS price
            FROM services_car_categories
            WHERE (services_car_categories.service_id=? AND
            services_car_categories.car_category_id=?)
            "
        );

        $statement->execute([$idService, $idCarCategory]);

        return $statement->fetchAll(PDO::FETCH_CLASS, ServiceViewModel::class);

    }

    /**
     * @param string $idService
     * @return ServicesCarCategoriesViewModel []
     */
    public function getCarCategoryIdByServiceId(string $idService): array
    {
        $statement = $this->connection->prepare(
            "
            SELECT DISTINCT services_car_categories.id AS idServicesCarCategories,
            duration_in_hours AS durationInHours, car_categories.description AS carCategoryDescription,
            services_car_categories.service_id AS serviceId, car_category_id AS carCategoryId
            FROM services_car_categories, car_categories
            WHERE (car_categories.id = services_car_categories.car_category_id
            AND services_car_categories.service_id=?)
            "
        );

        $statement->execute([$idService]);

        return $statement->fetchAll(PDO::FETCH_CLASS, ServicesCarCategoriesViewModel::class);

    }


    /**
     * @param string $idWorker
     * @return WorkersBusynessViewModel []
     */
    public function getBusynessforWorker(string $idWorker): array
    {
        $statement = $this->connection->prepare(
            "
            SELECT workers_busyness.worker_id AS id_w, workers_busyness.busyness_id AS idBusyness,
            busyness.data AS busynessData, busyness.work_hours_start AS workHoursStart,
            busyness.work_hours_end AS workHoursEnd, orders.service_execution_time AS serviceExecutionTime,
            services_car_categories.duration_in_hours AS durationInHours
            FROM busyness, workers_busyness, orders, services_car_categories, orders_services_car_categories
            WHERE (busyness.id = workers_busyness.busyness_id AND
            workers_busyness.worker_id = orders.worker_id AND
            orders_services_car_categories.orders_id = orders.id AND
            orders_services_car_categories.services_car_categories_id = services_car_categories.id AND
            workers_busyness.worker_id=?)
            "
        );

        $statement->execute([$idWorker]);

        return $statement->fetchAll(PDO::FETCH_CLASS, WorkersBusynessViewModel::class);

    }

    /**
     * @param string $idService
     * @return ServiceViewModel []
     */ 
    public function getNameServiceByIdService(string $idService): array
    {
        $statement = $this->connection->query(
            "
            SELECT name_of_service AS nameOfService FROM 'services'
            WHERE (services.id=?)
            "
        );

        $statement->execute([$idService]);

        return $statement->fetchAll(PDO::FETCH_CLASS, ServiceViewModel::class);
    }


    /**
     * @return WorkersViewModel []
     */ 
    public function getWorkers(): array
    {
        $statement = $this->connection->query(
            "
            SELECT DISTINCT id_w, surname, name, patronymic FROM 'workers'
            "
        );

        return $statement->fetchAll(PDO::FETCH_CLASS, WorkersViewModel::class);
    }
}