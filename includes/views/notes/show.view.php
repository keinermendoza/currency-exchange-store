<?php require base_path("views/partials/head.partial.php"); ?>
<?php require base_path("views/partials/nav.partial.php"); ?>
    <?php require base_path("views/partials/banner.partial.php"); ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a class="underline underline-offset-2 text-blue-400" href="/notes">Come Back</a>
            <p> Created by <small>@<?= $user['username'] ?></small></p>
            <img width="200" height="200" src="/<?= $note['image'] ?>" alt="imagen">
            <h2><?= $note['title'] ?></h2>
            <p><?= $note['body'] ?></p>
            <p><?= $note['created'] ?></p>

            <div class="flex gap-2 items-center mt-3" >
                <a href="/note/edit/<?= $note['id'] ?>" class="transition-transform duration-200 px-3 py-1 rounded-md border border-2 border-yellow-700 bg-yellow-300">Edit</a>
                <form action="/note/<?= $note['id'] ?>" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button  class="hover:scale-105 transition-transform duration-200 px-3 py-1 rounded-md border border-2 border-red-700 bg-red-300" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </main>

    <?php require base_path("views/partials/footer.partial.php"); ?>
