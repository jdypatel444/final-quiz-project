<?php

include "include/config.php";

if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    // print_r('helloo');

	if ($_POST['action_type'] == 'add') {
        $level_type = $_POST['level_type'];
        
        $insert = "INSERT INTO `levels` (`level_type`, `created_at`, `updated_at`) 
                   VALUES ('$level_type', NOW(), NOW())";
    
        $result_of_insert = mysqli_query($conn, $insert);
        
        echo json_encode($result_of_insert);
    }

	else if($_POST['action_type'] == 'view')
	{
					
	
?>	
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Action</th>
						<th>Level Type</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$select = "SELECT * FROM `levels`  WHERE isdeleted='0' ORDER BY id DESC LIMIT 100 ";
					$result_of_select = mysqli_query($conn,$select);
					
					while($r = mysqli_fetch_array($result_of_select))
					{
					
					?>
					<tr id="<?php echo $r['id']; ?>">
						<td align="center">
							<a href="#" class="fa fa-edit" data-id="<?php echo $r['id']; ?> "
							data-role="update"></a> &nbsp &nbsp
							<a href="#" class="fa fa-remove" data-id="<?php echo $r['id']; ?>"
							data-role="delete"></a>
						
						</td>
			
						<td data-target="level_type"><?php echo $r['level_type'];?></td>

					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>							
<?php
		
    }
	

	else if($_POST['action_type'] == 'edit')
	{

		$id= $_POST['level_id'];
		$level_type = $_POST['level_type'];

	
		$update="UPDATE `levels` SET 
		`level_type` = '$level_type',
		`updated_at` = NOW()

	    WHERE `id`='$id'"; 
		
		$result_of_update=mysqli_query($conn,$update);	
		echo json_encode($result_of_update);		
		}

	else if($_POST['action_type'] == 'delete')
	{
		
		$delete="UPDATE `levels` SET `isdeleted`='1' WHERE `id`= '$_POST[txt_id1]'";
		
		$result_of_delete=mysqli_query($conn,$delete);	
		
		
			echo json_encode($result_of_delete);		
	}		
	  
} 

	
?>


<script type="text/javascript">
	$(document).ready(function() {
    $('#example1').DataTable( {
    } );
} );
</script>