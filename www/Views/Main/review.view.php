<h2 class="fixed top-0 right-0 m-4 text-white">Welcome <?= $name; ?> </h2>

<div class="container mx-auto px-6 py-10">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
            <img src="../../public/assets/img/films/<?= $film->getImage() ?>" alt="<?= $film->getTitle() ?>" class="mx-auto">
            <h1 class="text-center text-xl font-bold mt-4"><?= $film->getTitle() ?></h1>
            <p class="text-center text-gray-500">Year: <?= $film->getYear() ?></p>
            <p class="text-center text-gray-500">Length: <?= $film->getLength() ?></p>
            <p class="text-center text-gray-500">Category: <?= $film->getCategory() ?></p>
            <p class="text-center text-gray-500">Average Note: <?= $averageNote ?></p>
        </div>
        <div class="w-full md:w-1/2 lg:w-2/3 xl:w-3/4">
            <h2 class="text-xl font-bold mb-4">Comments</h2>
            <?php foreach ($comments as $comment): ?>
                <?php
                $user = $comment->getUserInfo();
                ?>
                <div class="bg-gray-100 px-4 py-2 mb-2">
                    <p class="text-gray-800"><?= $comment->getContent() ?></p>
                    <p class="text-gray-500 font-bold">Posted by <?= $user->getFirstname() ?> on <?= $comment->getDateInserted() ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
