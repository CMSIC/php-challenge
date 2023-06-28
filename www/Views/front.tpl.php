<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Front</title>
    <meta name="description" content="ceci est un super site">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body>
    <main class="w-screen h-screen bg-gray-800">
        <!-- inclure la vue -->
        <?php include $this->view;?>
    </main>
</body>
</html>