<?php

namespace app\models;

use app\config\Db;

class Course
{
    public static function getById(int $id): ?array
    {
        $db = Db::getInstance();

        $row = $db->fetchRow(
            "SELECT * FROM course WHERE id = ?",
            [$id]
        );

        return $row ? $row->getData() : null;
    }

    public static function getAllWithAffectation(): array
    {
        $db = Db::getInstance();

        $rows = $db->fetchAll(
            "SELECT co.*, a.date,
                    c.nom AS conducteur_nom,
                    m.matricule AS moto_matricule
             FROM course co
             JOIN affectation a ON co.affectation_id = a.id
             JOIN conducteur c ON a.conducteur_id = c.id
             JOIN moto m ON a.moto_id = m.id
             ORDER BY a.date DESC, co.heure_debut ASC"
        );

        return array_map(fn($row) => $row->getData(), $rows);
    }

    public static function insert(array $data): void
    {
        $db = Db::getInstance();

        $db->runQuery(
            "INSERT INTO course
             (affectation_id, heure_debut, heure_fin, km, montant_paye, lieu_depart, lieu_arrivee)
             VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $data['affectation_id'],
                $data['heure_debut'],
                $data['heure_fin'],
                $data['km'],
                $data['montant_paye'],
                $data['lieu_depart'],
                $data['lieu_arrivee']
            ]
        );
    }

    public static function update(int $id, array $data): void
    {
        $db = Db::getInstance();

        $db->runQuery(
            "UPDATE course SET
                affectation_id = ?,
                heure_debut = ?,
                heure_fin = ?,
                km = ?,
                montant_paye = ?,
                lieu_depart = ?,
                lieu_arrivee = ?
             WHERE id = ?",
            [
                $data['affectation_id'],
                $data['heure_debut'],
                $data['heure_fin'],
                $data['km'],
                $data['montant_paye'],
                $data['lieu_depart'],
                $data['lieu_arrivee'],
                $id
            ]
        );
    }

    public static function validate(int $id): void
    {
        $db = Db::getInstance();

        $db->runQuery(
            "UPDATE course SET valide = 1 WHERE id = ?",
            [$id]
        );
    }

    public static function deleteAll()
{
    $db = \app\config\Db::getInstance();
    $db->exec("DELETE FROM course");
}

}
