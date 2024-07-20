<?php 

require "partials/head.php"; 
require "partials/nav.php"; 
?>
<main class="max-w-screen-xl mx-auto p-4 " > 

<h2>   Hello in Notes page </h2>

<h3>Your Notes</h3>



<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <!-- <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">Profile</li>
    <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Settings</li>
    <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Messages</li>
    <li class="w-full px-4 py-2 rounded-b-lg">Download</li> -->
    <?php foreach($notes as $note): ?>
        <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <a href="/note?id=<?= $note['id'] ?>">
            <?= $note['content'] ?>
            </a>
    </li>
     
       <?php endforeach ; ?>
</ul>


<div class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    
   
</div>



</main>
<?php
require "partials/footer.php";
?>
