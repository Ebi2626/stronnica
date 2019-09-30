
<form class="fullBucket" action="step2.php" method="post">
    <h2 class="fullBucket__title">Twoje zakupy</h2>
    <table class="fullBucket__table">
        <thead>
        <tr class="fullBucket__row">
            <th>Produkt</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th>Wartość</th>
            <th> </th>
        </tr>
</thead>
<tbody>
        <tr class="fullBucket__row">
            <td>Podstawy Programowania Obiektowego</td>
            <td>29,99</td>
            <td>1</td>
            <td>29,99</td>
            <td class="delete">Usuń</td>
        </tr>
</tbody>
            <tfoot>
            <tr class="fullBucket__summary">
    <th class="left deleteAll" id="deleteAll">Usuń wszystkie</th>
</tr>
                <tr class="fullBucket__summary">
                    <th class="left">Koszt dostawy:</th><td id="deliver">15zł</td><td>1</td><td id="deliver2">15zł</td>
</tr>
<tr class="fullBucket__summary">
<th class="left">Kwota do zapłaty:</th><td id="result">44,99</td>
</tr>
</tfoot>
</table>
<input type="submit" class="button" name="step2" id="step2" value="Dalej" />
</form>