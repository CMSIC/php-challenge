<?php
include __DIR__ . "/../adminHeader.view.php";
?>
<div id="movie-add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <?php $this->partial("movieForm", $movieForm, $formErrors) ?>
</div>
<div class=" flex" id="userTableDiv">
    <table id="userTable" class=" w-5/6 mx-auto">
        <thead>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Role</th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getFirstname() . " " . $user->getLastname() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td>
                    <?php

                    switch ($user->getStatus()) {
                        case 0:
                            echo "Unconfirmed";
                            break;
                        case 1:
                            echo "User";
                            break;
                        case 2:
                            echo "Admin";
                            break;
                    }

                    ?>
                </td>
                <td class="text-center"><button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Supprimer</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="flex hidden" id="filmTableDiv">
    <table id="filmTable" class=" w-2/3 mx-auto " style="">
        <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Année</th>
            <th class="text-center">Durée</th>
            <th class="text-center">Catégorie</th>
            <th class="text-center">Ajouter un film</th>
        </tr>
        </thead>
        <tbody class="">
        <!-- Vos lignes iront ici -->
        <?php foreach ($films as $film): ?>
            <tr>
                <td><?= $film->getTitle() ?></td>
                <td><?= $film->getYear() ?></td>
                <td><?= $film->getLength() ?></td>
                <td><?= $film->getCategory() ?></td>
                <td class="text-center"><button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Supprimer</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script type="application/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let userTableDiv = document.getElementById('userTableDiv');
        let filmTableDiv = document.getElementById('filmTableDiv');

        let usersButton = document.getElementById('showUsers');
        let filmsButton = document.getElementById('showFilms');

        usersButton.addEventListener('click', function() {
            filmTableDiv.classList.add('hidden');
            userTableDiv.classList.remove('hidden');

            // Hide films button and show users button
            filmsButton.classList.remove('hidden');
            usersButton.classList.add('hidden');
        });

        filmsButton.addEventListener('click', function() {
            userTableDiv.classList.add('hidden');
            filmTableDiv.classList.remove('hidden');

            // Hide users button and show films button
            usersButton.classList.remove('hidden');
            filmsButton.classList.add('hidden');
        });
    });

    $(document).ready(function() {
        $('#userTable').DataTable();
        $('#filmTable').DataTable();
    });

</script>


