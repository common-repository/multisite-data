<?php

function mdw_Customerlist() {

?>


<?php 

global $wpdb;
$table_name = $wpdb->prefix.'weblist';
 $sql = "SELECT * FROM ".$table_name;
$web_datam = $wpdb->get_results($sql);



					$i = 0; ?>

					<?php foreach($web_datam as $row){  

 $ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/customers?role=all&per_page=5&consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret;
 
$jsonaa = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($jsonaa);
$jsonm[] = json_decode($jsona,true);


 } 






?>

<?php


	$data = $jsonm;



    echo '<div class="wrap"><h2>'. __('All Customer List').'</h2>';

   ?>
<?php require_once('scripts.php');?>
	  <div class="search-input">
           
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </div>
        
    





<table class="wp-list-table widefat fixed striped table-view-list movies table table-striped mt32 customers-list" id="myTable"  data-page-length="50">


				<thead>

					<tr>

						

					<th class="manage-column column-primary">Customer Name</th>

					

						<th class="manage-column column-primary">Email</th>

						<th class="manage-column column-primary">Phone</th>

						<th class="manage-column column-primary">Billing Address</th>

						<th class="manage-column column-primary">Shipping Address</th>

						<th class="manage-column column-primary">URL</th>

					</tr>

				</thead>

				<tbody>

				<?php for ($i=0; $i < @count($data); $i++) { 

		for ($j=0; $j < @count($data[$i]); $j++) {  ?>

					<tr>

					<td>

					<?php echo esc_html($data[$i][$j]['first_name']); ?> <?php echo esc_html($data[$i][$j]['last_name']); ?>  </td>

					

						



						<td>

							<?php echo esc_html($data[$i][$j]['email']); ?></td>

					

						<td> 

							<?php echo esc_html($data[$i][$j]['phone']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['billing']['first_name']); echo esc_html($data[$i][$j]['billing']['lastt_name']); 	

						echo '<br/>';	echo esc_html($data[$i][$j]['billing']['email']); echo '<br/>';echo esc_html($data[$i][$j]['billing']['phone']);echo '<br/>';

							echo esc_html($data[$i][$j]['billing']['address_1']); echo ',&nbsp;'; echo esc_html($data[$i][$j]['billing']['address_2']);echo '<br/>';

							echo esc_html($data[$i][$j]['billing']['city']); echo ',&nbsp;'; echo esc_html($data[$i][$j]['billing']['state']);echo '<br/>';

							echo esc_html($data[$i][$j]['billing']['country']);

							?>

							

						</td>





						<td> 

							<?php echo esc_html($data[$i][$j]['shipping']['first_name']); echo esc_html($data[$i][$j]['shipping']['lastt_name']); 	

						echo '<br/>';	echo esc_html($data[$i][$j]['shipping']['email']); echo '<br/>';echo esc_html($data[$i][$j]['shipping']['phone']);echo '<br/>';

							echo esc_html($data[$i][$j]['shipping']['address_1']); echo ',&nbsp;'; echo esc_html($data[$i][$j]['shipping']['address_2']);echo '<br/>';

							echo esc_html($data[$i][$j]['shipping']['city']); echo ',&nbsp;'; echo esc_html($data[$i][$j]['shipping']['state']);echo '<br/>';

							echo esc_html($data[$i][$j]['shipping']['country']);

							?>

							

						</td>





					<td><?php $urlm = $data[$i][$j]['_links']['self'][0]['href'];

					

					$urlarr = parse_url($urlm);

					echo esc_html($urlarr['host']);	

					?></td>

					</tr>

				

					<?php } }?>

				</tbody>



				<tfoot>

				<tr>

						

						<th class="manage-column column-primary">Customer Name</th>

						

							<th class="manage-column column-primary">Email</th>

							<th class="manage-column column-primary">Phone</th>

							<th class="manage-column column-primary">Billing Address</th>

							<th class="manage-column column-primary">Shipping Address</th>

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





