<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Back</title>
    <meta name="description" content="ceci est un super site">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body>
    <main class="w-screen h-screen text-white bg-gray-800 flex">
        <!-- inclure la vue -->
        <?php include $this->view;?>
    </main>
</body>
</html>