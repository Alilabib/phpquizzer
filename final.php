<?php  
    session_start();
    include "init.php";
    include ($tbl."header.php");
    
  ?>  
  <main> 
    <div class="container">
        <h2 class="text-center">You Are Done ! </h2>
        <p> Congrats ! You Have Completed The test </p>
        <p> Final Score : <?php echo $_SESSION['score']; ?></p>
            <?php
            session_unset();
            session_destroy();
            ?>
        <a class="btn btn-warning" href="question.php?n=1">Take Again </a>
    </div>
  </main>


<?php 
    include ($tbl."footer.php");
?>  