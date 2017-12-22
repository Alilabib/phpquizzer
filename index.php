<?php 
    include"init.php";
    include($tbl."header.php");
 ?>

<?php 
/*
*Getting Number Of Total Questios 
*/

$query = "SELECT * FROM questions";

//Getting Result 

$results =$conn->query($query) or die (" Can't Execute This Query". $conn->error .__LINE__);
$Total  =$results->num_rows;
 ?>



    <main>
        <div class="container">
            <h2> TEST Your PHP Knowledge </h2>
            <p> This is a multiple choice quiz to test your Knowledge of PHP </p>
            <ul>
                <li><b>Number of Questions :</b><?php echo " ". $Total       ?>        </li>
                <li><b>Type                :</b> Multiple Choice                        </li>
                <li><b>Estimated Time      :</b><?php echo $Total * .5 . "  "?> Minutes</li>
            </ul>
            <a class="btn btn-primary" href="question.php?n=1"> Start Quiz </a>
        </div>
    </main>




 <?php  
    include($tbl."footer.php");
 ?>