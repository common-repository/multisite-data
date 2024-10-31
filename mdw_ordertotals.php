<?php

function mdw_ordertotals() {

?>



<?php



global $wpdb;
$table_name = $wpdb->prefix.'weblist';
 $sql = "SELECT * FROM ".$table_name;
$web_datam = $wpdb->get_results($sql);



					$i = 0; ?>

					<?php foreach($web_datam as $row){  

 $ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/reports/orders/totals?role=all&per_page=100&consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret;
 $req = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($req);

//$jsona = file_get_contents($ukrl);
//$jsonm['href'] = $row->weblist_apiurl;
$jsonm[] = json_decode($jsona,true);


 } 




$data[] = $jsonm;





















	//print_r($data);



    //outputing the headline before table

    echo '<div class="wrap"><h2>'. __('Order Status').'</h2>';

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

						

						<th class="manage-column column-primary">Order Type</th>

					

						<th class="manage-column column-primary">Total</th>

						<!--<th class="manage-column column-primary">URL</th>-->

					</tr>

				</thead>

				<tbody>

			<?php	for ($i=0; $i < count($data); $i++) { 

		for ($j=0; $j < @count($data[$i]); $j++) { 

			



			for ($k=0; $k < @count($data[$i][$j]); $k++) { 

				?>

					<tr>

					<td>

					<?php echo esc_html($data[$i][$j][$k]['name']); ?>  </td>

					

						



						<td>

							<?php echo esc_html($data[$i][$j][$k]['total']); ?> </td>





						<!--	<td></td>	-->
						<?php// $variable = $data[$i][$j][$k]['_links']['about'][0]['href'];
//echo $variable = substr($variable, 0, strpos($variable, "wp-json"));
?>							

					

					</tr>

				

					<?php } } }?>

				</tbody>

				<tfoot>

					<tr>

						

						<th class="manage-column column-primary">Order Status</th>

					

						<th class="manage-column column-primary">Total</th>

					<!--	<th class="manage-column column-primary">URL</th>-->

					</tr>

				</tfoot>

			</table>

    



<?php







}



?>





