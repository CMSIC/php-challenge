<?php
    $users = (new App\Models\User)->getAll();
    //var_dump($users);
?>

<table id="myTable">
    <thead>
    <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
        <th class="text-center"></th>
        <!-- Add more columns as needed -->
    </tr>
    </thead>
    <tbody>
    <!-- Your rows will go here -->
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
            <!-- Add more columns as needed -->
        </tr>
    <?php endforeach; ?>
    </tbody>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</table>
