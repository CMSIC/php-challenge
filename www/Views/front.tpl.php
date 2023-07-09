<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Front</title>
    <meta name="description" content="ceci est un super site">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <main class="w-screen h-screen bg-gray-800">
        <!-- inclure la vue -->
        <?php include $this->view;?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>
</html>