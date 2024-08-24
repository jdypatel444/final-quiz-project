
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


 	<!-- Wrapper -->
 	<div class="Wrapper">
 		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<!-- Main Content -->
  			<section class="content-header">
		      <h1>
		       Topic Master
		        <small> view</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li><a href="#">Topic Master</a></li>
		      </ol>
		    </section>
		    <section class="content">
		      <div class="row">
		        <div class="col-xs-12">


		          <div class="box box-primary">
		            <div class="box-header">
		              <h3 class="box-title pull-left">Topic Master</h3>
		              <a href="#" class="box-title btn btn-primary btn-sm pull-right" data-role="add">Add</a>
		            </div>
		            <!-- /.box-header -->

		            <!------------- Table Data ------------------>
		            <div class="box-body" id="display_data">
		            	
		            </div>
		            <!----------------- / ----------------------->

		          </div>
		        </div>
		      </div>
		    </section>
	    </div>
	</div>


<!------------------------------------- Add Model ------------------------------------------->
<div id="ADDMODEL" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title pull-left">Add Topic Master</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<!-- general form elements -->
				<div class="card card-primary">
					
					<form action="POST" id="#" enctype="multipart/form-data">
						<!-- /.box-header -->
						<div class="box-body">
							
							<div class="form-group">
								<label>Topic Name</label>
								<input type="text" id="topic_name"  class="form-control" name="topic_name" placeholder="Enter Topic Name"   autocomplete="off" required/>
							</div>
												
							<div class="form-group">
								<center>
								<input type="button"  class="btn btn-lg btn-primary" name="add_topic" id="add_topic" value="Add" autocomplete="off" data-role="add_topic"/>
								</center>
							</div>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
			
		</div>
	</div>
</div>
<!------------------------------------ / ----------------------------------------------------->

<!------------------------------------- Update Model -------------------------------------------->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title pull-left">Update Topic Master</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				
				<!-- general form elements -->
				<div class="card card-primary">
					
					
					<form method="post" id="" enctype="multipart/form-data">
						<div class="card-body">

							<input type="hidden" name="edit_topic_id" id="edit_topic_id" data-target="edit_topic_id"/>

							<div class="form-group">
								<label>Topic Name</label>
								<input type="text" id="edit_topic_name"  class="form-control" name="edit_topic_name"   autocomplete="off" required/>
							</div>
						
							<div class="form-group">
								<center>
								<input type="button"  class="btn btn-lg btn-warning" name="update_topic" id="update_topic" value="Update" autocomplete="off" data-role="update_topic"/>
								</center>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-------------------------------------- /Update Model ------------------------------------->

<?php
  include 'include/script.php';
?>
</body>
</html>

<script>
		
	$(window).on('load',function() {
/*alert("hello");*/
		action_type="view";

		$.ajax({
			type: "POST",
			url: "save_topic_master.php",
			data: '&action_type='+action_type,
			success: function(data){

			$("#display_data").html(data);

		}
		});
	});

	$(document).ready(function() {

		$(document).on('click','a[data-role=add]',function(){

			$('#ADDMODEL').modal('toggle');

		});

		$(document).on('click','#add_topic',function(){

			form_data = new FormData();
	
			var topic_name = $("#topic_name").val();

				
			/*alert(dep_id);*/

			form_data.append("topic_name", topic_name);

			form_data.append("action_type", "add");

			var tt = "";

			if(topic_name=="" || topic_name==null)
			{
				tt +="ENTER TOPIC NAME\n";
			}
				
			if(tt=="")
			{
				$.ajax({
					type: "POST",
					url: "save_topic_master.php",
					data : form_data,
					processData: false,
					contentType: false,
					//beforeSend: function(){},

					success: function(){
					$('#ADDMODEL').modal('hide');
					ClearFields();
					alert("Topic Added Successfully");
					view_data();
					}
				});
			}

			else
			{
				alert(tt);
			}
		});

		$(document).on('click','a[data-role=update]',function()
		{
			var id= $(this).data('id');
			var topic_name = $('#'+id).children('td[data-target=topic_name]').text();

					
			$('#myModal').modal('toggle');

			$('#edit_topic_id').val(id);
			$('#edit_topic_name').val(topic_name);

		
		});


		$(document).on('click','#update_topic',function()
		{
			form_data = new FormData();

			var topic_id = $("#edit_topic_id").val();
			var topic_name = $("#edit_topic_name").val();

			form_data.append("topic_id", topic_id);
			form_data.append("topic_name", topic_name);

		    form_data.append("action_type", "edit");

			var tt = "";

			if(topic_name=="" || topic_name==null)
			{
				tt +="ENTER TOPIC NAME\n";
			}

			if(tt=="")
			{
				$.ajax({
					type: "POST",
					url: "save_topic_master.php",
					data : form_data,
					processData: false,
					contentType: false,
					beforeSend: function(){},

					success: function(){
					$('#myModal').modal('hide');
					ClearFields();
					view_data();
					}
				});
			}
			else
			{
				alert(tt);
			}
		});
		
		$(document).on('click','a[data-role=delete]',function(){

			var txt_id1=$(this).data('id');
		

			var action_type="delete";

				$.ajax({
				type: "POST",
				url: "save_topic_master.php",
				data: '&action_type='+action_type+'&txt_id1='+txt_id1,
				success: function(){
				alert("Topic Master Deleted SuccessFully");
				view_data();
				}
			});
		});

		function ClearFields()
		{
			topic_name.value="";				
		}

		function view_data()
		{
			action_type="view";

			$.ajax({
				type: "POST",
				url: "save_topic_master.php",
				data: '&action_type='+action_type,
				success: function(data){

				$("#display_data").html(data);

				}
			});

		}

	});
		
		
		
</script>