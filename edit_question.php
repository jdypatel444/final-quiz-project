<?php
include "include/config.php";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM `questions` WHERE id=$id");
    $row = mysqli_fetch_array($record);
	// echo '<pre>';
	// print_r($row);
	// exit;
}
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
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">	
			<section class="content-header">
				<h1>
						Update Question
				   <small>Preview</small>
				</h1>
				<ol class="breadcrumb">
				   <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				   <li class="active">Update Question</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
					   <!-- general form elements -->
						<div class="box box-primary " id="view-item">
							<div class="box-header with-border">
								<h3 class="box-title"> Update Question</h3>
							</div>
							<div class="box-body">
                            <form role="form" method="POST" enctype="multipart/form-data" id="form1">
								<div class="box-body">
								<div class="form-group col-md-4">
                                <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>">
									<label for="topic_name">Topic Name</label>
									<select class="form-control" id="topic_id" name="topic_id">
                                        <option value=""> ----Select Topic Name---- </option>
                                        <?php
                                            $resultb = mysqli_query($conn, "SELECT * FROM `topics` WHERE isdeleted='0'");
                                            while ($row_b = mysqli_fetch_array($resultb)) {
                                                echo '<option value='.$row_b['id'].' '.($row['topic_id'] == $row_b['id'] ? 'selected' : 'noselected').'>'.$row_b['topic_name'].' </option>';
                                            }
                                        ?>
                                    </select>
								</div>
                                <div class="form-group col-md-4">

								<label for="level_type">Level Type</label>
									<select class="form-control" id="level_id" name="level_id" data-error="Select  Level Type" >
									<option value="0"> ----Select Level Type---- </option>
                                    <?php
										$resultb = mysqli_query($conn,"SELECT * from `levels` WHERE isdeleted='0'");
										while($row_b = mysqli_fetch_array($resultb)){
											echo '<option value='.$row_b['id'].' '.($row['level_id'] == $row_b['id'] ? 'selected' : 'noselected').'>'.$row_b['level_type'].' </option>';
										}
									?>
									</select>
								</div><br>
								<div class="form-group col-md-4">
									<label>Question</label>
                                    <textarea type="text" id="edit_question"  class="form-control" name="question"><?php echo $row['question'];?></textarea>
								</div>

								<div class="form-group col-md-4">
									<label>Op1</label>
                                    <input type="text" id="edit_op1"  class="form-control" name="op1" autocomplete="off" value="<?php echo $row['op1'];?>" required/>
								</div>

                                <div class="form-group col-md-4">
									<label>Op2</label>
                                    <input type="text" id="edit_op2"  class="form-control" name="op2" autocomplete="off" value="<?php echo $row['op2'];?>" required/>
								</div>

                                <div class="form-group col-md-4">
									<label>Op3</label>
                                    <input type="text" id="edit_op3"  class="form-control" name="op3" autocomplete="off" value="<?php echo $row['op3'];?>" required/>
								</div>

                                <div class="form-group col-md-4">
									<label>Op4</label>
                                    <input type="text" id="edit_op4"  class="form-control" name="op4" autocomplete="off" value="<?php echo $row['op4'];?>" required/>
								</div>
                                <div class="form-group col-md-4">
                                    <label>Answer</label>
                                    <select class="form-control" id="answer" name="answer">
                                        <option value="">----Choose Correct Answer----</option>
                                        <option value="Op1" <?php echo ($row['answer'] == 'Op1') ? 'selected' : ''; ?>>Op1</option>
                                        <option value="Op2" <?php echo ($row['answer'] == 'Op2') ? 'selected' : ''; ?>>Op2</option>
                                        <option value="Op3" <?php echo ($row['answer'] == 'Op3') ? 'selected' : ''; ?>>Op3</option>
                                        <option value="Op4" <?php echo ($row['answer'] == 'Op4') ? 'selected' : ''; ?>>Op4</option>
                                    </select>
                                </div>
							</div>
							<div class="box-footer">
								<center>
								<input type="button" style="width:25%;" class="btn btn-success btn-lg" name="edit" id="edit" value="Update" autocomplete="off" data-role="edit"/> 
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
		$(document).on('click','#edit',function(){
		form_data = new FormData();

	    var id= $("#id").val();
	    var topic_id= $("#topic_id option:selected").val();
	    var level_id= $("#level_id option:selected").val();
		var question=$("#edit_question").val();
		var op1=$("#edit_op1").val();
		var op2=$("#edit_op2").val();
		var op3=$("#edit_op3").val();
		var op4=$("#edit_op4").val();
		var answer=$("#answer").val();
	
		form_data.append("id",id);
		form_data.append("topic_id",topic_id);
		form_data.append("level_id",level_id);
		form_data.append("question",question);
		form_data.append("op1",op1);
		form_data.append("op2",op2);
		form_data.append("op3",op3);
		form_data.append("op4",op4);
		form_data.append("answer",answer);
		form_data.append("action_type",'edit');
		
		$.ajax({					
			type: "POST",					
			data : form_data,
			url: "save_questions.php",					
			processData: false,
			contentType: false,
			success: function(){
				alert('Question successfully updated'); 
				window.location.href = 'show_question_record.php';
			}					
			});	
				
	});
</script>