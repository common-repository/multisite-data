<?php
function mdw_Orderedproductlist() {?>
	<?php global $wpdb;
	$table_name = $wpdb->prefix.'weblist'; 
	$sql = "SELECT * FROM ".$table_name;$web_datam = $wpdb->get_results($sql);
						$i = 0; ?>		
	<?php foreach($web_datam as $row){ 

	 $ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/orders?per_page=5&consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret; 

$req = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($req);

	 //$jsona = file_get_contents($ukrl);
	 $jsonm[] = json_decode($jsona,true); 
	}
$data = $jsonm;
	 ?>
	 <?php require_once('scripts.php');
	  echo '<div class="wrap"><h2>'. __('Ordered List').'</h2>';
	  ?>
	   <div class="search-input">
           
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </div>
        
    





<table class="wp-list-table widefat fixed striped table-view-list movies table table-striped mt32 customers-list" id="myTable"  data-page-length="50">
		
	 		<thead>	

	 		<tr><th class="manage-column column-primary">Order Id</th>			<th class="manage-column column-primary">Product Id/Name</th>		<th class="manage-column column-primary">Customer Name</th>			<th class="manage-column column-primary">Email</th>					<th class="manage-column column-primary">Phone</th>		
	 		<th class="manage-column column-primary">Status</th>		<th class="manage-column column-primary">Date</th>						<th class="manage-column column-primary">Total</th>					<th class="manage-column column-primary">URL</th>					</tr></thead>	
	 		<tbody>		
	 				<?php for ($i=0; $i < @count($data); $i++) { 	
	 					for ($j=0; $j < @count($data[$i]); $j++) {  ?>					<tr>				
	 						<td> <?php echo esc_html($data[$i][$j]['id']); ?></td>				<td><?php echo esc_html($data[$i][$j]['line_items'][0]['product_id']); ?> /	<?php echo esc_html($data[$i][$j]['line_items'][0]['name']); ?> </td>									<td><?php echo esc_html($data[$i][$j]['billing']['first_name']); ?> <?php echo esc_html($data[$i][$j]['billing']['last_name']); ?></td>
	 						<td><?php echo esc_html($data[$i][$j]['billing']['email']); ?></td>	
	 						<td><?php echo esc_html($data[$i][$j]['billing']['phone']); ?></td>	
	 						<td> <?php echo esc_html($data[$i][$j]['status']); ?></td>			<td><?php echo esc_html($data[$i][$j]['date_created']); ?></td>
	 								<td><?php echo esc_html($data[$i][$j]['total']); ?></td>			
	 									<td><?php $url = esc_html($data[$i][$j]['_links']['self'][0]['href']); 								  		$urlarr = parse_url($url);
	 							echo esc_html($urlarr['host']);										?>									</td>	</tr>									<?php } }?>			

	 								</tbody>				<tfoot>					<tr>											<th class="manage-column column-primary">Order Id</th>										<th class="manage-column column-primary">Product Id/Name</th>						<th class="manage-column column-primary">Customer Name</th>											<th class="manage-column column-primary">Email</th>						<th class="manage-column column-primary">Phone</th>						<th class="manage-column column-primary">Status</th>						<th class="manage-column column-primary">Date</th>						<th class="manage-column column-primary">Total</th>						<th class="manage-column column-primary">URL</th>					</tr>				</tfoot>			</table>	
	 		  <?php }?>