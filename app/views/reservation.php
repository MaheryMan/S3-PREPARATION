<!-- confirm_reservation.php -->
<h2>Confirmation de réservation</h2>
<p>L'habitation est disponible du <?= $startDate ?> au <?= $endDate ?>.</p>
<p>Voulez-vous confirmer la réservation ?</p>

<form action="/habitations/reserve" method="POST">
    <input type="hidden" name="habitationId" value="<?= $habitationId ?>" />
    <input type="hidden" name="startDate" value="<?= $startDate ?>" />
    <input type="hidden" name="endDate" value="<?= $endDate ?>" />
    <button type="submit">
        Confirmer la réservation
    </button>
    <a href="/habitations/book/<?= $habitationId ?>">Annuler</a>
</form>