<body>
    <div class="container">
        <!-- Barre latérale -->
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="/benefice">Benefice par vehicule</a></li>
                <li><a href="/chauffeurVehicule">Informations des assignations</a></li>
                <li><a href="/trajetRentable">Trajet Rentable</a></li>
                <li><a href="/vehiculeDisponible">Vehicule disponible</a></li>
                <li><a href="/salaire">Tout les salaires</a></li>
                <li><a href="/salaireDate">Salaire par date</a></li>
            </ul>
        </aside>
        <!-- Contenu principal -->
        <main class="content">
            <section>
                <h1 id="chauffeurs">Liste des Chauffeurs</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Téléphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chauffeurs as $chauffeur) { ?>
                            <tr>
                                <td><?php echo $chauffeur['nom']; ?></td>
                                <td><?php echo $chauffeur['tel']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>