
    <h1>Liste des Habitations</h1>
    <table>
        <thead>
            <tr>
                <th>Photo</th>
                <th>Type ID</th>
                <th>Nombre de Chambres</th>
                <th>Loyer par Jour</th>
                <th>Quartier</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
