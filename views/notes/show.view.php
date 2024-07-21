<?php 
view("partials/head.php",[
    "page_title" => $page_title,
    "config" => $config,
]); 
view("partials/nav.php",[
    "page_title" => $page_title,
]); 
?>
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 

<h2>   Hello in Note page </h2>
<div> 
<h4> your Note is : </h4>

    <p> <?=$note['content'] ?? '' ?> </p>
    


</div>
</main>
<?php
view("partials/footer.php");
?>

