<?php include "connect.php"; ?>  

<?php
 if($_SERVER["REQUEST_METHOD"]=='POST'){ 
    session_start();
    //Check if score is set 

    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }

    if(isset($_POST['submit'])){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];

        echo $number.'<br>'.$selected_choice;
        $next = $number+1;
        /*
        * Get Total questions 
        */
        $query="SELECT * FROM questions";
        //Get Result 
        $result=$conn->query($query) or die("Can't Execut This Query".$conn->error.__LINE__);
        $Total=$result->num_rows;
        /*
        * Get Correct Choice 
        */
        $query ="SELECT * FROM choices 
                WHERE ques_num = $number AND is_correct = 1 ";
        //Get Result 
        $result = $conn->query($query) or die("Can't Execut MySql Query ".$conn->error.__LINE__);
        //Get Row 
        $row = $result->fetch_assoc();
        //Set Correct Choice
        $correct_choice = $row['id'];
        //Compare
        if($correct_choice == $selected_choice ){
            //Answer is Correct 
            $_SESSION['score']++;
        }

        //if this last question 
        if($number==$Total){
            header("Location: final.php");
            exit();
            
        }else{
            header("Location: question.php?n=".$next);
        }

    }

    }else{
        header("location:index.php");
    }

?>