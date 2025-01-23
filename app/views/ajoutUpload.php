<div class="formulaire">
    <h1>Ajouter une nouvelle habitation</h1>

    <form action="/ajouter" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="type">Type d'habitation:</label>
            <select name="type_id" id="type" required>
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type['id'] ?>"><?= $type['nom'] ?> </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nb_chambres">Nombre de chambres:</label>
            <input type="number" id="nb_chambres" name="nb_chambres" min="1" required>
        </div>

        <div class="form-group">
            <label for="loyer_jour">Loyer par jour (€):</label>
            <input type="number" id="loyer_jour" name="loyer_jour" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="quartier">Quartier:</label>
            <input type="text" id="quartier" name="quartier" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="photos">Photos:</label>
            <input id="photos" name="photos[]" type="file" multiple required>
        </div>

        <button type="submit">Ajouter l'habitation</button>
    </form>
</div>