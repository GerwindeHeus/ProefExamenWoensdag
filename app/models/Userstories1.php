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
                             Baan.Id as Id
	                        ,Voornaam
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

    public function getSingleBaan($id = NULL)
    {
        $this->db->query("SELECT 
                             Baan.Id as Id
	                        ,Voornaam
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
                             Reservering.BaanId = Baan.Id

                         WHERE Baan.Id = :id");
        
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateBaan($post)
     {
     //CALL update_baan(1, 2);
        $this->db->query("UPDATE baan SET Nummer = :nummer WHERE Id = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':nummer', $post['nummer']);
        $this->db->execute();
    }

}

?>