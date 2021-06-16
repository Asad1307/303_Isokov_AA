<?php

require_once '../config.php';

class PdoFactory
{
    public static function createPDO(): PDO
    {
        return new PDO(
            'sqlite:../data/' . DB_NAME,
            '',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}