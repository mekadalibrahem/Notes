<?php 

view("partials/head.php",[
  "page_title" => $page_title,
  
]); 
view("partials/nav.php",[
  "page_title" => $page_title,
]); 
?>
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 


<h3></h3>
<div>
  <div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Your Notes : </h3>
   
    <!-- <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p> -->
  </div>
  <div class="mt-6 border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
     <?php foreach($notes as $note) :?>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <a href="/note?id=<?=$note['id']?>" class="text-sm font-medium leading-6 text-gray-900"><?= $note['content'] ?></a>
      </div>


        <?php endforeach;?>
     
    </dl>
  </div>

 
</div>

<div class="ml-4 flex-shrink-0">
                <a href="/note/create" class="mt-2 font-medium text-indigo-600 hover:text-indigo-500">create new</a>
              </div>




</main>
<?php
view("partials/footer.php");
?>
