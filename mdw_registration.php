<?php

function mdw_registration() {



    echo '<div class="wrap"><h2>'. __('Upgrade To Pro').'</h2>';

  if(isset($_REQUEST['tcount']))
  {
?>
<h2>Need to add more website! Activate to pro</h2>
<?php
  }

?>



<?php 
	global $wpdb;


if(isset($_REQUEST['encryt']))
{

$table = $wpdb->prefix.'multidata_registration';
	//Encryption
	$en = sanitize_text_field($_REQUEST['encryt']);

 $msqll = "SELECT * FROM $table WHERE reg_code=md5($en)";
$thepost = $wpdb->get_row( $wpdb->prepare( $msqll ) );

if(@count($thepost)>=1)
{

$tablemreg = $wpdb->prefix.'multidata_registration';
$usqlmreg = "UPDATE $tablemreg SET reg_status='1' WHERE reg_code=md5($en)";

 $wpdb->query($usqlmreg);




//$_SESSION['prostatus']=active;
echo '<h2>You are now a pro member Enjoy adding more websites.</h2>';
//header("location:admin.php?page=managedata_websitelist");
}
else
{

	echo '<h2>Registration Code is Not Valid</h2>';
}
}


?>





<form action="" method="posts">
	<input type="hidden" name="editid" value="<?php echo esc_html($_REQUEST['editid']); ?>"> 
<input type="hidden" name="page" value="mdw_registration"> 
<table class="wp-list-table widefat fixed striped table-view-list movies" id="dataTable">

				<tbody>

		

<tr>
						<td >Add your Registration Key</td>
						<td><input type="text" value="" name="encryt" required></td>
</tr>						

			



	<tr>
						
<td colspan="2"><input type="submit" value="Add Key" name="addkey"></td>
</tr>					


					</tr>


				</tbody>

				





			</table>

</form>

		


<?php } ?>




