<?php 
include("init.php");
include($tbl."header.php");
?>

<?php
    if(isset($_POST['submit'])){
        //Get Post Variables
        $ques_num  = $_POST['ques_num' ];
        //echo $ques_num;die();
        $ques_text = $_POST['ques_text'];
        //Choices Array 
        $choises = array();
        $choises[1]=$_POST['choice1'];
        $choises[2]=$_POST['choice2'];
        $choises[3]=$_POST['choice3'];
        $choises[4]=$_POST['choice4'];
        $choises[5]=$_POST['choice5'];
        $correct_answer=$_POST['correct_choice'];
      
       //Question query 
       $query = "INSERT INTO questions (ques_num, text)
                VALUES('$ques_num','$ques_text')";
       //result 
       $row_insert =  $conn->query($query) or die("Can't Execut Sql Query".$conn->error.__LINE__);           

        if($row_insert){
            foreach($choises as $choice=>$value) {
              if($value !=''){
                if($correct_answer == $choice){
                    $is_correct=1;
                }else{
                    $is_correct=0;
                }
                //Choice query 
                $query = "INSERT INTO choices (ques_num, is_correct, text)
                           VALUES ('$ques_num','$is_correct','$value') ";
                //Run Query 
                $insert_row = $conn->query($query) or die("Error TO Execut Query".$conn->error.__LINE__);
                //Validate insert 
                if($insert_row){
                    continue;
                }else{
                    die("Error to insert question to database".$conn->error.__LINE__);
                }
              }
            }
        }
        $msg = "Question Hass been add succesflly";
       /*
        header("location:add.php");
        exit();
        */
    }
/*
* Getting total question  
*/
$query = "SELECT * FROM questions";
//Get The Results 

$ques  = $conn->query($query)or die("can't select questions".$conn->error.__LINE__);
$total = $ques->num_rows;
$next  = $total+1;

?>

    <main class="add"> 
    <div class="container"> 
        <h2 class="text-center"> Add Question  </h2>
        <?php 
            if(isset($msg)){
                echo"<p class='alert alert-success'>".$msg."</p>";
            }

         ?>
        <form class="add form-group" action="add.php" method="POST"> 
            <p> 
                <label> Question number </label>
                <input class="form-control input-group-sm" value="<?php echo $next; ?>" type="number" name="ques_num"> 
           </p>
           <p>
                <label> Question Text</label>
                <input class="form-control input-group-sm" type="text" name="ques_text"> 
           </p>
           <p>    
                <label>Choice #1 </label>
                <input class="form-control input-group-sm" type="text" name="choice1"> 
            </p>
            <p>
                <label>Choice #2 </label>
                <input class="form-control input-group-sm" type="text" name="choice2">
            </p>

            <p>
                <label>Choice #3 </label>
                <input class="form-control input-group-sm" type="text" name="choice3">
            </p>

            <p> 
                <label>Choice #4 </label>
                <input class="form-control input-group-sm" type="text" name="choice4">
            </p>

             <p> 
                <label>Choice #5 </label>
                <input class="form-control input-group-sm" type="text" name="choice5">
            </p>

             <p> 
                <label>Correct Choice Number</label>
                <input class="form-control input-group-sm" type="number" name="correct_choice">
            </p>

            <p>
                <input class="btn btn-success" type="submit" name="submit" value="ADD   ">
                <input class="btn btn-danger"  type="reset" name="clear" value="Delete">
            </p>    

        </form>
    </div>
    </main>




<?php 

include($tbl."footer.php");

?>