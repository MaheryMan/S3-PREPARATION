<h1>Liste des Habitations</h1>
    <table>
        <thead>
            <tr>
                <th>Photo</th>
                <th>Type ID</th>
                <th>Nombre de Chambres</th>
                <th>Loyer par Jour</th>
                <th>Quartier</th>
                <th>Actions</th> <!-- New column -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($habitations as $habitation): ?>
                <tr>
                    <td>
                        <?php if (!empty($habitation['url_photo'])): ?>
                            <img src="<?php echo htmlspecialchars($habitation['url_photo']);?>" width="100">
                        <?php else: ?>
                            Pas de photo
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($habitation['type_id']); ?></td>
                    <td><?php echo htmlspecialchars($habitation['nb_chambres']); ?></td>
                    <td><?php echo htmlspecialchars($habitation['loyer_jour']); ?></td>
                    <td><?php echo htmlspecialchars($habitation['quartier']); ?></td>
                    <td>
    <div class="button-group">
        <form action="/modifier" method="POST" style="display: inline-block; margin-right: 5px;">
            <input type="hidden" name="habitation_id" value="<?php echo htmlspecialchars($habitation['id']); ?>">
            <button type="submit" class="modify-btn">Modifier</button>
        </form>
        <form action="/supprimer" method="POST" style="display: inline-block;">
            <input type="hidden" name="habitation_id" value="<?php echo htmlspecialchars($habitation['id']); ?>">
            <button type="submit" class="delete-btn">Supprimer</button>
        </form>
            </div>
        </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <style>
.button-group {
    display: flex;
    gap: 10px;
}

.delete-btn, .modify-btn {
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    color: white;
}

.delete-btn {
    background-color: #ff4444;
}

.modify-btn {
    background-color: #2196F3;
}

.delete-btn:hover {
    background-color: #cc0000;
}

.modify-btn:hover {
    background-color: #0b7dda;
}
</style>