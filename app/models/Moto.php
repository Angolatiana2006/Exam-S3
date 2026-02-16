<?php

namespace app\models;

use app\config\Db;

class Moto
{
    public static function getById(int $id): ?array
    {
        $db = Db::getInstance();

        $row = $db->fetchRow(
            "SELECT * FROM moto WHERE id = ?",
            [$id]
        );

        return $row ? $row->getData() : null;
    }

    public static function getPourcentageByDate(int $moto_id, string $date): ?float
    {
        $db = Db::getInstance();

        $row = $db->fetchRow(
            "SELECT pourcentage
             FROM moto_pourcentage
             WHERE moto_id = ?
               AND date_debut <= ?
               AND (date_fin IS NULL OR date_fin >= ?)
             ORDER BY date_debut DESC
             LIMIT 1",
            [$moto_id, $date, $date]
        );

        return $row ? $row->getData()['pourcentage'] : null;
    }

    public static function getAll(): array
    {
        $db = Db::getInstance();

        $rows = $db->fetchAll("SELECT * FROM moto");

        return array_map(fn($row) => $row->getData(), $rows);
    }
}
