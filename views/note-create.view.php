<?php 
require "./views/partials/head.php" ; 
require "./views/partials/nav.php";
?>



<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 
<form method="POST">
  <div class="space-y-6">
    <div class="border-b border-gray-900/10 pb-12">
    <div class="col-span-full">
          <label for="contnet" class="block text-sm font-medium leading-6 text-gray-900">Note Content</label>
          <div class="mt-2">
            <textarea id="contnet" name="contnet" rows="3" class="block  sm:w-full md:w-1/2 w-1/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
         
        </div>
    
    
    </div>
  </div>

  <div class="mt-6 flex items-center justify-start gap-x-6">
    
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>

</main>




<?php require "./views/partials/footer.php"  ?>
