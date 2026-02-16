<?php
namespace app\models;

use app\config\Db;

class Carburant
{
    
    public static function getCurrent(): ?array
    {
        $db = Db::getInstance();
        $row = $db->fetchRow("SELECT * FROM carburant WHERE date_fin IS NULL LIMIT 1");
        return $row ? $row->getData() : null;
    }

    
    public static function setPrix(float $prix, string $date)
{
    $db = Db::getInstance();

    $current = self::getCurrent();

    if ($current) {
        
        $stmt = $db->prepare("UPDATE carburant SET prix_par_litre = ?, date_debut = ? WHERE id = ?");
        $stmt->execute([$prix, $date, $current['id']]);
    } else {
        
        $stmt = $db->prepare("INSERT INTO carburant (prix_par_litre, date_debut) VALUES (?, ?)");
        $stmt->execute([$prix, $date]);
    }
}

}
