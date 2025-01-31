<?php 

view("partials/head.php",["page_title" => $page_title ]);  
view("partials/nav.php"); ?>
<main class="mx-auto my-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col justify-center items-center"> 

<div class="w-full max-w-xs">
  <form method="POST" action="/register" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
  <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
      username
      </label>
      <input = class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="username">
      <?= isset($errors['username']) ? ' <p class="text-red-500 text-xs italic">'. $errors['username'].' </p>' : '' ?> 
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        email
      </label>
      <input = class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="example@gmail.com">
      <?= isset($errors['email']) ? ' <p class="text-red-500 text-xs italic">'. $errors['email'].' </p>' : '' ?> 
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password"  type="password" placeholder="******************">
      <?= isset($errors['password']) ? ' <p class="text-red-500 text-xs italic">'. $errors['password'].' </p>' : '' ?> 
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">
        confirm Password
      </label>
      <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" name="confirm_password" type="password" placeholder="******************">
      <?= isset($errors['confirm']) ? ' <p class="text-red-500 text-xs italic">'. $errors['confirm'].' </p>' : '' ?> 
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Register
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/login">
        Alrady have account 
      </a>
    </div>
  </form>
 
</div>

</main>
<?php
view("partials/footer.php");
?>
