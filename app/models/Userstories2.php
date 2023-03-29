<?php

class Userstories2
{
    private $db;

    public function __construct()
    {   
        $this->db = new Database; 
    }
    public function getPersoon()
    {
        $this->db->query("SELECT 
                             Persoon.Id 
	                        ,Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,Datum
                            ,AantalUren
                            ,Begintijd
                            ,Eindtijd
                            ,AantalVolwassenen
                            ,AantalKinderen
                          FROM Persoon
                            INNER JOIN Reservering
                                    ON Reservering.PersoonId = Persoon.Id
                            INNER JOIN Baan
                                    ON Reservering.BaanId = Baan.Id
                            WHERE Persoon.Id = 1");
        $result = $this->db->resultSet();
        return $result;
    }   

}

?>