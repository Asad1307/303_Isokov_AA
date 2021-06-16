<?php


class ServicesRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getServices(): array
    {
        $statement = $this->connection->query(
            "
select distinct s.id as id, s.title as service , c.title as title
from services s
         join car_categories c on s.car_category_id = c.id
         "
        );

        return $statement->fetchAll();
    }
}