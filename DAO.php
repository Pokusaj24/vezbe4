<?php
require_once 'db.php';

class DAO {
    private $db;
    private $SELECT_BOLJI_OD = "SELECT id, ime, prezime, prosek FROM integralni4 WHERE prosek > ?";

    public function __construct() {
        $this->db = DB::createInstance();
    }

    public function boljiOD($prosek) {
        $statement = $this->db->prepare($this->SELECT_BOLJI_OD);
        $statement->bindValue(1, $prosek);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}
?>
