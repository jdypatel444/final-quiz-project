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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Question List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Show Question List</li>
      </ol>
    </section>		
    
    <section class="content">
		      <div class="row">
		        <div class="col-xs-12">
					<div class="box box-primary">
						<a href="question_add.php" class="btn btn-success">Add Question</a>
		            <div class="box-header">
						<h3 class="box-title pull-left">Show Question List</h3>
		            </div>
						
				
		            <!-- /.box-header -->

		            <!------------- Table Data ------------------>
		            <div class="box-body" id="display_data">
                    <div class="table-responsive">
			<table id="example1" class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Action</th>
						<th>Topic Name</th>
						<th>Level Type</th>
						<th>Question</th>
						<th>Op1</th>
						<th>Op2</th>
                        <th>Op3</th>
						<th>Op4</th>
                        <th>Answer</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$select = "SELECT * FROM `questions` WHERE isdeleted='0' ORDER BY id DESC LIMIT 100 ";
					$result_of_select = mysqli_query($conn,$select);
					
					while($r = mysqli_fetch_array($result_of_select))
					{

						$topic_name = "SELECT * FROM `topics` WHERE `id`=".$r['topic_id'];
						$result_of_topic_name = mysqli_query($conn,$topic_name);
						$get_topic_name = mysqli_fetch_assoc($result_of_topic_name);

                        $level_type = "SELECT * FROM `levels` WHERE `id`=".$r['level_id'];
						$result_of_level_type = mysqli_query($conn,$level_type);
						$get_level_type = mysqli_fetch_assoc($result_of_level_type);
					
					?>
					<tr id="<?php echo $r['id']; ?>">
						<td align="center">
							<a href="edit_question.php?edit=<?php echo $r['id']; ?>" class="fa fa-edit"
							data-role="update"></a> &nbsp &nbsp
							<a href="delete_question.php?delete=<?php echo $r['id']; ?>" onclick=" return confirm('Are You Sure to Delete...?')" class="fa fa-remove" data-id="<?php echo $r['id']; ?>"
							data-role="delete"></a>
						</td>
						<td data-target="topic_id"><?php echo $get_topic_name['topic_name'];?></td>
						<td data-target="level_id"><?php echo $get_level_type['level_type'];?></td>
                        <td data-target="question"><?php echo $r['question']; ?></td>
						<td data-target="op1"><?php echo $r['op1']; ?></td>
						<td data-target="op2"><?php echo $r['op2']; ?></td>
						<td data-target="op3"><?php echo $r['op3']; ?></td>
						<td data-target="op4"><?php echo $r['op4']; ?></td>
                        <td data-target="answer"><?php echo $r['answer'];?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		            </div>
		            <!----------------- / ----------------------->

		          </div>
		        </div>
		      </div>


  </div>
		    </section>
  <!-- /.content-wrapper -->
<?php
    include 'include/footer.php';
?>
</div>
<!-- ./wrapper -->

<?php
  include 'include/script.php';
?>
</body>
</html>

						
<script type="text/javascript">
	$(document).ready(function() {
    $('#example1').DataTable( {
		dom: 'Bfrtip',
        buttons: [	
           'excel','pdf'
        ]
    } );
} );
</script>