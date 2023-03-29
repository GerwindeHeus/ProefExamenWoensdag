<h3><?= $data['title'] ?></h3>

<h3><?= $data['record'] ?></h3>

<div class="dropdown">
    <button class="dropbtn">Dropdown</button>
    <div class="dropdown-content">
        <a href="<?= URLROOT; ?>userstory2/overzicht1">2023-03-29</a>
        <a href="<?= URLROOT; ?>userstory2/overzicht2">2023-03-29</a>
    </div>
</div>
<table border='5'>
    <thead>
        <th>Naam</th>
        <th>Datum</th>
        <th>AantalUren</th>
        <th>Begintijd</th>
        <th>Eindtijd</th>
        <th>AantalVolwassenen</th>
        <th>AantalKinderen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>persoon/addPersoon">
    <input type="button" value="Bestelling toevoegen">
</a>