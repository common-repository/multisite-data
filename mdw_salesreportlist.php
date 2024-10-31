<?php

function mdw_salesreportlist() {

?>



<?php




	  $start_date = $first_day_this_month = date('Y-m-01'); 

	 $end_date = $last_day_this_month  = date('Y-m-t');




global $wpdb;
$table_name = $wpdb->prefix.'weblist';
 $sql = "SELECT * FROM ".$table_name;
$web_datam = $wpdb->get_results($sql);



					$i = 0; ?>

					<?php foreach($web_datam as $row){  

$ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$start_date.'&date_max='.$end_date.'&consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret;
 
$req = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($req);

//$jsona = file_get_contents($ukrl);


$jsonm[] = json_decode($jsona,true);


 } 



$data[] = $jsonm;









    //outputing the headline before table

    echo '<div class="wrap"><h2>'. __('Monthly Sales Report').'</h2>';

    //calling function prepare_items



 //$ft = array_flatten($datam);

 //print_r($ft);



  //exit();

?>

<?php require_once('scripts.php');?>



  <div class="search-input">
           
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </div>
        
    





<table class="wp-list-table widefat fixed striped table-view-list movies table table-striped mt32 customers-list" id="myTable"  data-page-length="50">


				<thead>

					<tr>

						

					<th class="manage-column column-primary">Total Sales</th>

						<th class="manage-column column-primary">Total Orders</th>

					

						<th class="manage-column column-primary">Total Product</th>

						<th class="manage-column column-primary">Total Refunds</th>

						<th class="manage-column column-primary">Total Customers</th>

						<th class="manage-column column-primary">URL</th>

					</tr>

				</thead>

				<tbody>

				<?php	for ($i=0; $i < count($data); $i++) { 

		for ($j=0; $j < @count($data[$i]); $j++) { 

			



			for ($k=0; $k < @count($data[$i][$j]); $k++) { 

				?>

					<tr>

					<td>

					$<?php echo esc_html($data[$i][$j][$k]['total_sales']); ?>  </td>

					

						



						<td>

							<?php echo esc_html($data[$i][$j][$k]['total_orders']); ?> </td>

					

						<td> 

							<?php echo esc_html($data[$i][$j][$k]['total_items']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j][$k]['total_refunds']); ?>	

						</td>

					<td><?php echo esc_html($data[$i][$j][$k]['total_customers']); ?></td>

					

					<td>
<?php $variable = esc_html($data[$i][$j][$k]['_links']['about'][0]['href']);
 $variable = substr($variable, 0, strpos($variable, "wp-json"));

 echo esc_html($variable);
?> </td>	

					</tr>

				

					<?php }} }?>

				</tbody>

				<tfoot>

					<tr>

						

					<th class="manage-column column-primary">Total Sales</th>

						<th class="manage-column column-primary">Total Orders</th>

					

						<th class="manage-column column-primary">Total Product</th>

						<th class="manage-column column-primary">Total Refunds</th>

						<th class="manage-column column-primary">Total Customers</th>

						<th class="manage-column column-primary">URL</th>

					</tr>

				</tfoot>





			</table>

		















<?php //new instance of wp_list_table

 //include_once 'classes/class-customer-list-table.php'; 

   // Create an instance of our package class.

	//$test_list_table = new Customer_List_Table();



	// Fetch, prepare, sort, and filter our data.

	//$test_list_table->prepare_items();

   

?>

	


    



<?php







}



?>





