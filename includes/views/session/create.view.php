<?php require base_path("views/partials/head.partial.php"); ?>
<?php require base_path("views/partials/nav.partial.php"); ?>
 
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Entrar al Panel de Control</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="" method="POST">
      <div>
        <?php if ($errors["email"] ?? false) : ?>
          <p class="text-red-900 text-sm"><?= $errors["email"] ?></p>
        <?php endif; ?>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Usuario</label>
        <div class="mt-2">
          <input type="text" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Contraseña</label>
        </div>
        <div class="mt-2">
        <?php if ($errors["password"] ?? false) : ?>
          <p class="text-red-900 text-sm"><?= $errors["password"] ?></p>
        <?php endif; ?>
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-green-800 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-800">Entrar</button>
      </div>
    </form>

  </div>
</div>




        </div>
    </main>
<?php require base_path("views/partials/footer.partial.php"); ?>
