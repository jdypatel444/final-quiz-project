<?php

include "include/config.php";
session_start();
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'add')
	{
        // Retrieve form data
		$topic_id = $_POST['topic_id'];
		$level_id = $_POST['level_id'];
		$question = $_POST['question'];
		$op1 = $_POST['op1'];
        $op2 = $_POST['op2'];
		$op3 = $_POST['op3'];
        $op4 = $_POST['op4'];
		$answer = $_POST['answer'];

		// Insert query
		$insert = "INSERT INTO `questions`(`topic_id`, `level_id`, `question`, `op1`, `op2`, `op3`, `op4`, `answer`, `created_at`, `updated_at`) 
				   VALUES (
				   '$topic_id',
				   '$level_id',
				   '$question',
				   '$op1',
				   '$op2',
				   '$op3',
				   '$op4',
				   '$answer',
				   NOW(),
				   NOW()
				   )";

        // Execute the query
		if (mysqli_query($conn, $insert)) {
            echo json_encode(array("statusCode" => 200, "message" => "Question Added Successfully"));
		} else {
            echo json_encode(array("statusCode" => 500, "message" => "Something went wrong"));
        }

        // Close the database connection
		mysqli_close($conn);
	}
    else if($_POST['action_type'] == 'edit')
	{
		$id= $_POST['id'];
		$topic_id = $_POST['topic_id'];
		$level_id = $_POST['level_id'];	
		$question = $_POST['question'];	
		$op1 = $_POST['op1'];
		$op2 = $_POST['op2'];
		$op3 = $_POST['op3'];
        $op4 = $_POST['op4'];
		$answer = $_POST['answer'];	
		
		$update="UPDATE `questions` SET 
		`topic_id` = '$topic_id',
		`level_id`='$level_id',
		`question`='$question',
		`op1`='$op1',
		`op2`='$op2',
		`op3`='$op3',
        `op4`='$op4',
		`answer`='$answer'
	    WHERE `id`='$id'";
		$result_of_update=mysqli_query($conn,$update);	
		echo json_encode($result_of_update);
	}	 
}
exit;
	
?>