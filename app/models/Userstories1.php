<?php

class Userstories1 
{
    private $db;

    public function __construct()
    {   
        $this->db = new Database; 
    }

    public function getPersoon()
    {
        $this->db->query("SELECT 
	                         Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,Datum
                            ,AantalVolwassenen
                            ,AantalKinderen
                            ,Nummer
                          FROM 
                             Persoon
                          INNER JOIN 
                             Reservering
		                  ON 
                             Reservering.PersoonId = Persoon.Id
                          INNER JOIN 
                             Baan
		                  ON 
                             Reservering.BaanId = Baan.Id;");
        $result = $this->db->resultSet();
        return $result;
    }

}

?>