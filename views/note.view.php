<?php 

require "partials/head.php"; 
require "partials/nav.php"; 
?>
<main class="max-w-screen-xl mx-auto p-4 " > 

<h2>   Hello in Note page </h2>
<div> 
<h4> your Note is : </h4>
 <p> <?= $note['content'] ?> </p>


</div>
</main>
<?php
require "partials/footer.php";
?>
