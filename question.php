<?php 
    include"init.php";
    include($tbl."header.php");
  ?>

<?php 

//Set question Number_format
 $number =(int)$_GET['n'];


/*
*Getting Number Of Total Questios 
*/

$query = "SELECT * FROM questions";

//Getting Result 

$results =$conn->query($query) or die (" Can't Execute This Query". $conn->error .__LINE__);
$Total  =$results->num_rows;



 /*
 *Getting Questions from Database 
 */

$query = "SELECT * FROM questions 
            WHERE ques_num = $number ";

 /*
 *
 * Get result 
 *
 */           

 $result = $conn->query($query) or die("Error To Excute query ".$conn->error.__LINE__);
 $question = $result->fetch_assoc();

/*
*Getting Questions from Database 
*/


 /*
 *Getting Choices of questions from Database 
 */

$query = "SELECT * FROM choices 
            WHERE ques_num = $number ";

 /*
 *
 * Get result 
 *
 */           

 $Choices = $conn->query($query) or die("Error To Excute query ".$conn->error.__LINE__);
 

/*
*Getting Questions from Database 
*/

 ?>



 <main> 
    <div class="container quiz"> 
        <div class="current text-center">
           <b> Question <?php echo $question['ques_num']; ?> Of <?php echo $Total; ?> : </b>
        </div>
        <p class="question"> 
          <b> <?php echo $question['text']; ?>   </b>      
        </p>
        <form  action="function.php" method="POST">
             <ul>
               <?php while($row = $Choices->fetch_assoc()){ ?>
                <li><input class="" type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?> </li>
                <?php } ?>
             </ul>    
             <input type="submit" name="submit" value="Continue">
             <input type="hidden" name="number" value="<?php echo $number; ?>">
        </form>
    </div>
</main>






 <?php 

    include($tbl."footer.php");
/* All Editing Resived for ali Labib */
 ?>