<?php 

require "partials/head.php"; 
require "partials/nav.php"; 
?>
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 

<h2>   Hello in Notes page </h2>

<h3>Your Notes : </h3>



<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

    <?php foreach($notes as $note): ?>
        <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <a href="/note?id=<?= $note['id'] ?>">
            <?= $note['content'] ?>
            </a>
    </li>
     
       <?php endforeach ; ?>
</ul>




</main>
<?php
require "partials/footer.php";
?>
