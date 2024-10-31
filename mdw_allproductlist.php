<?php

function mdw_allproductlist() {

global $wpdb;
$table_name = $wpdb->prefix.'weblist';
 $sql = "SELECT * FROM ".$table_name;
$web_datam = $wpdb->get_results($sql);



					$i = 0; ?>

					<?php foreach($web_datam as $row){  

  $ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/products?consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret;
 $req = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($req);
//$jsona = file_get_contents($ukrl);
$jsonm[] = json_decode($jsona,true);


 } 
	$data = $jsonm;

?>
<?php




	

    //outputing the headline before table

    echo '<div class="wrap"><h2>'. __('All Product List').'</h2>';

    //calling function prepare_items



	

?>

<?php require_once('scripts.php');?>

 
  

        <div class="search-input">
           
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </div>
        
    





<table class="wp-list-table widefat fixed striped table-view-list movies table table-striped mt32 customers-list" id="myTable"  data-page-length="50">

				<thead>

					<tr>

						

						

						<th class="manage-column column-primary">Name</th>

						<th class="manage-column column-primary">Category</th>

						<th class="manage-column column-primary">Regular Price</th>

						<th class="manage-column column-primary">Sale Price</th>

						

						<th class="manage-column column-primary">Total Sales</th>



						<th class="manage-column column-primary">Status</th>



						<th class="manage-column column-primary">URL</th>

					</tr>

				</thead>

				<tbody>

				<?php 

				for ($i=0; $i < @count($data); $i++) { 

		for ($j=0; $j < @count($data[$i]); $j++) {  ?>

					<tr>

						

						<td>

							<?php echo esc_html($data[$i][$j]['name']); ?> </td>

						

						<td>

							<?php echo esc_html($data[$i][$j]['categories'][0]['name']); ?> 

						</td>

						<td>
						<?php if($data[$i][$j]['regular_price']!=''){ echo '$';echo esc_html($data[$i][$j]['regular_price']);} ?>	

							</td>

						<td> 

							<?php if($data[$i][$j]['sale_price']!=''){ echo '$';echo esc_html($data[$i][$j]['sale_price']);} ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['total_sales']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['status']); ?>	

						</td>





					<td><?php  $urlm = $data[$i][$j]['permalink'];

					$urlarr = parse_url($urlm);

					echo esc_html($urlarr['host']);				

					?></td>

					</tr>

				

					<?php } }?>

				</tbody>

				<tfoot>

					<tr>

						

						

					<th class="manage-column column-primary">Name</th>

						<th class="manage-column column-primary">Category</th>

						<th class="manage-column column-primary">Regular Price</th>

						<th class="manage-column column-primary">Sale Price</th>

						

						<th class="manage-column column-primary">Total Sales</th>

						<th class="manage-column column-primary">Status</th>





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





