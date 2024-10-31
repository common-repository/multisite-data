<?php

function mdw_weblist() {

?>



<?php



echo '<div class="wrap"><h2>'. __('Website List').'</h2>';

  

?>

<?php require_once('scripts.php');?>



		  <div class="search-input">
           
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </div>
        
    





<table class="wp-list-table widefat fixed striped table-view-list movies table table-striped mt32 customers-list" id="myTable"  data-page-length="50">


				<thead>

					<tr>

						<th class="manage-column column-primary">No</th>

						<th class="manage-column column-primary ">Web Title</th>						

						<th class="manage-column column-primary">Web Url</th>
<th class="manage-column column-primary">Consumer Key</th>
<th class="manage-column column-primary">Consumer Secret</th>
<th class="manage-column column-primary" colspan="2">Action</th>

					</tr>

				</thead>

				<tbody>

					<?php 

global $wpdb;
$table_name = $wpdb->prefix.'weblist';
 $sql = "SELECT * FROM ".$table_name;
$web_datam = $wpdb->get_results($sql);



					$i = 0; ?>

					<?php foreach($web_datam as $row){  ?>

					<tr>

						<td><?php echo $i+1; ?></td>

						

						<td><?php echo esc_html($row->weblist_title); ?></td>

						<td><?php echo esc_html($row->weblist_apiurl); ?></td>
<td><?php echo esc_html($row->consumer_key); ?></td>

<td><?php echo esc_html($row->consumer_secret); ?></td>
<td><a href="admin.php?page=managedata_addwebsitelist&editid=<?php echo esc_html($row->weblist_id); ?>"><i class='far fa-edit'></i>Edit</a></td>
<td><a href="admin.php?page=managedata_addwebsitelist&delid=<?php echo esc_html($row->weblist_id); ?>"><i class='far fa-del'></i>Delete</a></td>
					</tr>

					<?php $i++; ?>

					<?php } ?>

				</tbody>



				<tfoot>

					<tr>

							<th class="manage-column column-primary">No</th>

						<th class="manage-column column-primary ">Web Title</th>						

						<th class="manage-column column-primary">Web Url</th>
<th class="manage-column column-primary">Consumer Key</th>
<th class="manage-column column-primary">Consumer Secret</th>
<th class="manage-column column-primary" colspan="2">Action</th>
					</tr>

				</tfoot>





			</table>



		











<?php







}



?>

