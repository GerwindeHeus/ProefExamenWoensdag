<?php


class Userstory2 extends Controller
{
    private $userstory2Model;

    public function __construct()
    {
        $this->userstory2Model = $this->model('Userstories2');
    }

    public function index()
    {
        $result = $this->userstory2Model->getPersoon();
        $reservering = $this->userstory2Model->getPersoon();
       
        $rows = '';
        $record = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->Voornaam $value->Tussenvoegsel $value->Achternaam </td>
                         <td>$value->Datum</td>
                         <td>$value->AantalUren</td>
                         <td>$value->Begintijd</td>
                         <td>$value->Eindtijd</td>
                         <td>$value->AantalVolwassenen</td>
                         <td>$value->AantalKinderen</td>
                        </tr>";

            $record = "<tr>
                            <td>$value->Voornaam $value->Tussenvoegsel $value->Achternaam </td>
                        </tr>";
            }
        $data = [
            'title' => "User Story 2",
            'rows' => $rows,
            'record' => $record
        ];
        $this->view('userstory2/index', $data);
    }
}
        