<?php 

view("partials/head.php",["page_title" => $page_title ]);  
view("partials/nav.php"); ?>
<?php view("partials/header.php" , ["page_title" => $page_title])?>
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 

<h2>   Hello in Note page </h2>
<div> 
<h4> your Note is : </h4>

    <?php if(isset($note)) : ?>
        <p> <?=$note['content'] ?? '' ?> </p>
    <form action="/note" method="POST">
        <?= setRequestMethod("DELETE") ?>
        <input type="hidden" name="id" value="<?= $note['id'] ?? '' ?>"/>
        <div class="mt-3 px-1 py-1 flex " >
        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        <a href="/note/edit?id=<?=$note['id'] ?? '' ?>" class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">Edit</a>  
  
        </div>    
    </form>
    <?php endif; ?>

</div>
</main>
<?php
view("partials/footer.php");
?>

