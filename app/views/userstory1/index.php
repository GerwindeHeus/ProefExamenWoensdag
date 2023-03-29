<h3><?= $data['title'] ?></h3>

<table border='5'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Datum</th>
        <th>Volwassenen</th>
        <th>Kinderen</th>
        <th>Baan</th>
        <th>update</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<br>