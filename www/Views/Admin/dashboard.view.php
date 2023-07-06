<?php
    $users = (new App\Models\User)->getAll();
    //var_dump($users);
?>

<table id="myTable">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th></th>
        <!-- Add more columns as needed -->
    </tr>
    </thead>
    <tbody>
    <!-- Your rows will go here -->
    <?php foreach ($users as $user): ?>
        <tr>
            <td class="text-center"><?= $user->getFirstname() . " " . $user->getLastname() ?></td>
            <td class="text-center"><?= $user->getEmail() ?></td>
            <td class="text-center">
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
            <td class="text-center">supprimer</td>
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
