<?php 

view("partials/head.php",["page_title" => $page_title ]);  
view("partials/nav.php"); ?>
<?php view("partials/header.php" , ["page_title" => $page_title]); ?>
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 

<h2>   Hello in Home page </h2>

</main>
<?php
view("partials/footer.php");
?>
