<?php require base_path("views/partials/head.partial.php"); ?>
<?php require base_path("views/partials/nav.partial.php"); ?>
    <?php require base_path("views/partials/banner.partial.php"); ?>
 
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
    
        
    <form method="post" action="/note/<?= $note['id'] ?>" enctype="multipart/form-data">
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="id"  value="<?= $note['id'] ?>">

              <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
              <?php if(isset($errors["title"])) : ?>
                <p class="text-red-800 text-sm"><?= $errors["title"] ?></p>
              <?php endif ?>
              <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                  <input value="<?= old("title", $note["title"]) ?>" type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Amazing tools for create blog posts...">
                </div>
              </div>
            </div>
            
            <div class="sm:col-span-4">
              <?php if ($note["image"]) : ?>
                <img width="200" height="200" src="<?= $note["image"] ?>" alt="">
              <?php endif; ?>
              <label for="image" class="block text-sm/6 font-medium text-gray-900">image</label>
              <?php if(isset($errors["image"])) : ?>
                <p class="text-red-800 text-sm"><?= $errors["image"] ?></p>
              <?php endif ?>
              <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                  <input type="file" name="image" id="image" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Amazing tools for create blog posts...">
                </div>
              </div>
            </div>


            <div class="col-span-full">
              <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
              <?php if(isset($errors["body"])) : ?>
                <p class="text-red-800 text-sm"><?= $errors["body"] ?></div>
              <?php endif ?>
              <div class="mt-2">
                <textarea name="body" id="body" rows="3" 
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= old('body', $note['body']) ?></textarea>
              </div>
              <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences body yourself.</p>
            </div>
            
            <div class="flex items-center gap-2">

              <a href="/notes" class="rounded-md bg-slate-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600">Cancel</a>
              
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        
          </div>
        </div>

      </div>
    </form>

    </div>
    </main>

<?php require base_path("views/partials/footer.partial.php"); ?>


