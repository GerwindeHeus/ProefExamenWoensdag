<?= $data['title']; ?>
<form action="<?= URLROOT; ?>userstory1/update" method="POST">
    <table>
        <tbody>
            <tr>
                <td>
                    BaanNummer:
                </td>
                <td>
                    <input type="text" name="nummer" value="<?= $data['row']->Nummer; ?>">
                </td>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data['row']->Id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Verstuur">
                </td>
            </tr>
        </tbody>
    </table>
</form>