<?php

class Userstory1 extends Controller
{
    private $userstory1Model;

    public function __construct()
    {
        $this->userstory1Model = $this->model('Userstories1');
    }

    public function index()
    {
        $result = $this->userstory1Model->getPersoon();
       
        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->Voornaam</td>
                         <td>$value->Tussenvoegsel</td>
                         <td>$value->Achternaam</td>
                         <td>$value->Datum</td>
                         <td>$value->AantalVolwassenen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->Nummer</td>
                         <td><a href='" . URLROOT . "userstory1/update/$value->Id'>update</a></td>
                      </tr>";
        }

        $data = [
            'title' => "User Story 1",
            'rows' => $rows
        ];
        $this->view('userstory1/index', $data);
    }

    public function update($id = NULL){
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

             $result = $this->userstory1Model->updateBaan($_POST);

             if ($result) {
                echo "Het toevoegen is niet gelukt";
                header("Refresh:3; URL=" . URLROOT . "userstory1/index");
            } else {
                echo "het toevoegen is gelukt";
                header("Refresh:3; URL=" . URLROOT . "userstory1/index");
            }
         }else {
             $row = $this->userstory1Model->getSingleBaan($id);
             $data = [
                 'title' => 'Update een baan',
                 'row' => $row
             ];
            $this->view("userstory1/update", $data);
            }
             
    }
}