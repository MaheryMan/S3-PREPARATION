<div class="form-container">
    <h2>Modifier une habitation</h2>
    <form action="<?= BASE_URL ?>/modification" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="type">Type d'habitation:</label>
            <select name="type_id" id="type" required>
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type['id'] ?>" <?= ($habitation['type_id'] == $type['id']) ? 'selected' : '' ?>>
                        <?= $type['nom'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nb_chambres">Nombre de chambres:</label>
            <input type="number" id="nb_chambres" name="nb_chambres" min="1" required 
                value="<?php echo htmlspecialchars($habitation['nb_chambres']); ?>">
        </div>

        <div class="form-group">
            <label for="loyer_jour">Loyer par jour (€):</label>
            <input type="number" id="loyer_jour" name="loyer_jour" step="0.01" min="0" required
                value="<?php echo htmlspecialchars($habitation['loyer_jour']); ?>">
        </div>

        <div class="form-group">
            <label for="quartier">Quartier:</label>
            <input type="text" id="quartier" name="quartier" required
                value="<?php echo htmlspecialchars($habitation['quartier']); ?>">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($habitation['description']); ?></textarea>
        </div>

        <input type="hidden" name="habitation_id" value="<?php echo htmlspecialchars($habitation['id']); ?>">

        <div class="form-group">
            <label for="new_photos">Ajouter de nouvelles photos:</label>
            <input type="file" id="new_photos" name="photos[]" multiple accept="image/*">
        </div>

        <button type="submit" class="submit-button">Enregistrer les modifications</button>
    </form>
    <div class="form-group">
            <h3>Photos actuelles</h3>
            <div class="photos-grid">
                <?php foreach ($photos as $photo): ?>
                    <div class="photo-item">
                        <img src="<?= BASE_URL ?>/public/<?php echo htmlspecialchars($photo['url_photo']); ?>" alt="Photo habitation">
                        <form action="<?= BASE_URL ?>/supprimerPhoto" method="POST" class="delete-photo-form">
                            <input type="hidden" name="photo_id" value="<?php echo htmlspecialchars($photo['id']); ?>">
                            <input type="hidden" name="habitation_id" value="<?php echo htmlspecialchars($habitation['id']); ?>">
                        <button type="submit" class="delete-photo-btn">Supprimer</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</div>

<style>
.photos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.photo-item {
    position: relative;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
}

.photo-item img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 4px;
}

.delete-photo-form {
    margin-top: 10px;
    text-align: center;
}

.delete-photo-btn {
    background-color: #ff4444;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.delete-photo-btn:hover {
    background-color: #cc0000;
}

input[type="file"] {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 4px;
    width: 100%;
}
.submit-button {
    background-color:rgb(255, 71, 102);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.submit-button:hover {
    background-color:rgb(218, 11, 63);
}
</style>