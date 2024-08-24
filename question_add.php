<?php
include "include/config.php";

?>
<!DOCTYPE html>
<html>
<head>
  <?php
    include 'include/head.php';
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php
    include 'include/header.php';
 ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
    include 'include/sidebar.php';
 ?>
<?php
 $job_serial="SELECT * FROM `sauda_master` ORDER BY `sid` DESC";
					$job_res = mysqli_query($conn, $job_serial);
					if (mysqli_num_rows($job_res) > 0) {
						$job_r = mysqli_fetch_array($job_res);
						
						$tfr_no_plus=$job_r["purchase_sauda_code"];
						$explodes=explode("-",$tfr_no_plus);
						$last_number=$explodes[1];
						$plus_report_no= intval($last_number) + 1;
						$final_perfoma_no= sprintf('%04d', $plus_report_no);
						
						$final_pur_code= "PSAUDACODE-".$final_perfoma_no;
						
						
					}else{
						$final_pur_code= "PSAUDACODE-0001";
					}
?>
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">	
			<section class="content-header">
				<h1>
						Add Question
				   <small>Preview</small>
				</h1>
				<ol class="breadcrumb">
				   <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				   <li class="active">Add Question</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
					   <!-- general form elements -->
						<div class="box box-primary " id="view-item">
							<div class="box-header with-border">
								<h3 class="box-title"> Add Question</h3>
							</div>
							<div class="box-body">
							   <form method="POST" action="#" id="add" enctype="multipart/form-data">
								<div class="box-body">
								<div class="form-group col-md-4">
									<label for="fyname">Topics</label>
									<select class="form-control" id="topic_id" name="topic_id">
									<option> ----Select Your Topic---- </option>
									<?php
										include "include/config.php";
										$resultb = mysqli_query($conn,"SELECT * from `topics` WHERE isdeleted='0'");
										while($row_b = mysqli_fetch_array($resultb)){
											echo '<option value='.$row_b['id'].' '.'>'.$row_b['topic_name'].' </option>';
										}
									?>
									</select>
								</div>

                                <div class="form-group col-md-4">
									<label for="fyname">Levels</label>
									<select class="form-control" id="level_id" name="level_id">
									<option> ----Select Level Type---- </option>
									<?php
										include "include/config.php";
										$resultb = mysqli_query($conn,"SELECT * from `levels` WHERE isdeleted='0'");
										while($row_b = mysqli_fetch_array($resultb)){
											echo '<option value='.$row_b['id'].' '.'>'.$row_b['level_type'].' </option>';
										}
									?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Question</label>
                                    <textarea type="text" id="question"  class="form-control" name="question" required></textarea>
                    			</div>
                                <br>
                                <div class="form-group col-md-4">
									<label>Op1</label>
                                    <input type="text" id="op1"  class="form-control" name="op1" required></input>
                    			</div>
                                <div class="form-group col-md-4">
									<label>Op2</label>
                                    <input type="text" id="op2"  class="form-control" name="op2" required></input>
                    			</div>
                                <div class="form-group col-md-4">
									<label>Op3</label>
                                    <input type="text" id="op3"  class="form-control" name="op3" required></input>
                    			</div>
                                <div class="form-group col-md-4">
									<label>Op4</label>
                                    <input type="text" id="op4"  class="form-control" name="op4" required></input>
                    			</div>
                                <div class="form-group col-md-4">
									<label>Answer</label>
                                    <select class="form-control" id="answer" name="answer">
									<option> ----Choose Correct Answer---- </option>
                                    <option value="Op1">Op1</option>
                                    <option value="Op2">Op2</option>
                                    <option value="Op3">Op3</option>
                                    <option value="Op4">Op4</option>
                    			</div>
							</div>
							<div class="box-footer">
								<center>
								<input type="button" style="width:25%;" class="btn btn-success btn-lg" name="add_question" id="add_question" value="Add" autocomplete="off" data-role="add_question" >
								</center>
							</div>
						</form>
						  </div>    <!-- /.box -->
						</div>  <!-- box primary -->
					</div>
				</div>
			</section>
		</div>
	</div>
    <!-- Content Header (Page header) -->
  
  
    <!-- /.content -->
 </div>
  <!-- /.content-wrapper -->


<!-- ./wrapper -->

<?php
  include 'include/script.php';
?>
</body>
</html>

<script>

	$(document).on('click','#add_question',function(){	
		form_data = new FormData();
		//form_data.append("file", document.getElementById('g_img').files[0]);
		var aa ="";
		var topic_id= $("#topic_id").val();
		var level_id= $("#level_id").val();
		var question=$("#question").val();
		var op1=$("#op1").val();
		var op2=$("#op2").val();
		var op3=$("#op3").val();
		var op4=$("#op4").val();
		var answer=$("#answer").val();

		if(topic_id=="")	{
			aa+="CHOOSE YOUR TOPIC..\n";
		}
        if(level_id=="")	{
			aa+="CHOOSE YOUR LEVEL TYPE..\n";
		}
		if(question=="")	{
			aa+="ENTER QUESTION..\n";
		}
        if(op1=="")	{
			aa+="ENTER OP1..\n";
		}
        if(op2=="")	{
			aa+="ENTER OP2..\n";
		}
        if(op3=="")	{
			aa+="ENTER OP3..\n";
		}
        if(op4=="")	{
			aa+="ENTER OP4..\n";
		}
		if(answer=="")	{
			aa+="CHOOSE YOUR CORRECT ANSWER..\n";
		}
	
		if(aa!=""){
			alert(aa);	
		}
		else{
			form_data.append("topic_id",topic_id);
			form_data.append("level_id",level_id);
			form_data.append("question",question);
			form_data.append("op1",op1);
			form_data.append("op2",op2);
			form_data.append("op3",op3);
			form_data.append("op4",op4);
			form_data.append("answer",answer);		
			form_data.append("action_type",'add');

			$.ajax({					
				type: "POST",					
				url: "save_questions.php",
				data: form_data,
				processData: false,
				contentType: false,
				success: function(response) {
                    const data = JSON.parse(response);
                    if(data.statusCode === 200) {
                        alert(data.message);
                        window.location.href = 'show_question_record.php';
                    } else {
                        alert(data.message);
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }		
			});
		}

});	

function ClearFields(){
        topic_id.value="";
		level_id.value="";
		question.value="";
		op1.value="";
		op2.value="";
		op3.value="";
		op4.value="";
		answer.value="";

	}



</script>