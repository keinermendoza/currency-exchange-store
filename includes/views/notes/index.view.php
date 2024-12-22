<?php require base_path("views/partials/head.partial.php"); ?>
<?php require base_path("views/partials/nav.partial.php"); ?>
    <?php require base_path("views/partials/banner.partial.php"); ?>
 
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a class="mb-4 block underline underline-offset-2 text-blue-400" href="/notes/create">
            Create New Note
        </a>
        <ul>

            <?php foreach ($notes as $note) : ?>
            <li>
                <a class="underline underline-offset-2 text-blue-400" href="/note/<?= $note['id'] ?>">
                    <?= $note['title'] ?>
                </a>
            </li>    
            <?php endforeach ?>
                
            </ul>
        </div>
    </main>
    <?php require base_path("views/partials/footer.partial.php"); ?>

