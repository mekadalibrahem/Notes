<?php 

view("partials/head.php",["page_title" => $page_title ]);  
view("partials/nav.php"); ?>
<?php view("partials/header.php" , ["page_title" => $page_title])?>



<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 
<form action="/note/edit" method="POST">
  <?= setRequestMethod("PATCH")?>
  <input type="hidden" name="note_id" value="<?= $note['id'] ?? '' ?>">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    <div class="col-span-full">
            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Note content</label>
            <div class="mt-2">
                <textarea id="content" name="content" rows="3" class="block sm:w-full md:w-1/2 w1/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['content'] ?? '' ?></textarea>
            </div>
            <!-- show error if found any error -->
            <?php if(!empty($errors) ):?>
                <?php foreach($errors as $error):?>
                    <p class="mt-3 text-sm leading-6 text-red-600"><?= $error ?></p>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    
    
    </div>
  </div>

    <div class="p-3 m-2 flex gap-x-6 " >
    <div class="mt-6 flex items-center justify-start">
  <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Edit</button>
    
  </div>
  <div class="mt-6 flex items-center justify-start ">
  <a href="/notes" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cansel</a>

  </div>
    </div>
</form>



<?php

view("partials/footer.php");
?>
