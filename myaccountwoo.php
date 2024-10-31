<?php

/*

 * Step 1. Add Link (Tab) to My Account menu

 */

add_filter ( 'woocommerce_account_menu_items', 'multidata_log_history_link', 40 );

function multidata_log_history_link( $menu_links ){

	

	$menu_links = array_slice( $menu_links, 0, 5, true ) 

	+ array( 'log-history' => 'View Order History' )

	+ array_slice( $menu_links, 5, NULL, true );

	

	return $menu_links;



}

/*

 * Step 2. Register Permalink Endpoint

 */

add_action( 'init', 'multidata_add_endpoint' );

function multidata_add_endpoint() {



	// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation

	add_rewrite_endpoint( 'log-history', EP_PAGES );



}

/*

 * Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint

 */

add_action( 'woocommerce_account_log-history_endpoint', 'multidata_my_account_endpoint_content' );

function multidata_my_account_endpoint_content() {



	// of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()

	//echo 'Last time you logged in: yesterday from Safari.';

	$current_user = wp_get_current_user();



//	print_r($current_user);





	$phone = get_user_meta($current_user->ID,'billing_phone',true); 

	

	if($phone == '')

	{

		$phone = 'Null';

	}

 



global $wpdb;

$table_name = $wpdb->prefix.'weblist';

 $sql = "SELECT * FROM ".$table_name;

$web_datam = $wpdb->get_results($sql);

$weboneapiurl = $web_datam[0]->weblist_apiurl;

$weboneconsumer_key = $web_datam[0]->consumer_key;

$weboneconsumer_secret = $web_datam[0]->consumer_secret;

$webtwoapiurl = $web_datam[1]->weblist_apiurl;

$webtwoconsumer_key = $web_datam[1]->consumer_key;

$webtwoconsumer_secret = $web_datam[1]->consumer_secret;

$webthreeapiurl = $web_datam[2]->weblist_apiurl;

$webthreeconsumer_key = $web_datam[2]->consumer_key;

$webthreeconsumer_secret = $web_datam[2]->consumer_secret;



	

	$req = wp_remote_get($weboneapiurl.'/wp-json/wc/v3/orders?consumer_key=ck_f31e43ae30c8a97a859ac0c9b5f44b50df40ff7e&consumer_secret=cs_92b71c4af03bfb69a8a34c25ef105c98d6f57e4c');

$jsona = wp_remote_retrieve_body($req);







	$reqb = wp_remote_get($webtwoapiurl.'/wp-json/wc/v3/orders?consumer_key=ck_68a18be3194c169d337b0af5d937d2073eec194d&consumer_secret=cs_26b45b8d14cffb5678f5b2af277715be606f9d0f');
$jsonb = wp_remote_retrieve_body($reqb);

	$reqc = wp_remote_get($webthreeapiurl.'/wp-json/wc/v3/orders?consumer_key=ck_af2da31f94ca0a9c4d35288b494af7853c783093&consumer_secret=cs_0a6d41807ddafdf2722a8a7eca9550aa0cb30d2a');
$jsonc = wp_remote_retrieve_body($reqc);
	
	

	$jsonm[] = json_decode($jsona,true);

	$jsonm[] = json_decode($jsonb,true);

	$jsonm[] = json_decode($jsonc,true);

		$data = $jsonm;





		



//print_r($data);

?>



<?php require_once('myacc-script.php');?>





<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table table-view-order-history" id="dataTable">

				<thead>

					<tr>

					<th class="woocommerce-orders-table__header view-order-th">Order</th>

					<th class="woocommerce-orders-table__header view-date-th">Date</th>

					<th class="woocommerce-orders-table__header view-total-th">Total</th>

					<th class="woocommerce-orders-table__header view-detail-th">Detail</th>

					<th class="woocommerce-orders-table__header view-url-th">URL</th>

					

					</tr>

				</thead>

				<tbody>

				<?php

				

				

				for ($i=0; $i < @count($data); $i++) { 

		for ($j=0; $j < @count($data[$i]); $j++) { 



		if ( $data[$i][$j]['billing']['email'] == $current_user->user_email || $data[$i][$j]['billing']['phone'] == $phone ) {

 

			

			

			?>

					<tr>

					<td class="woocommerce-orders-table__body view-order-td"> 

							<?php echo esc_html($data[$i][$j]['id']); ?>	

							<br/>

							<?php echo esc_html($data[$i][$j]['line_items'][0]['name']); ?>

						</td>

						<td  class="woocommerce-orders-table__body view-date-td"> 

							<?php echo esc_html($data[$i][$j]['date_created']); ?>	

						</td>



					

						<td  class="woocommerce-orders-table__body view-total-td"> 

							<?php echo esc_html($data[$i][$j]['total']); ?>	

						</td>







						<td  class="woocommerce-orders-table__body view-detail-td">

				<?php echo esc_html($data[$i][$j]['billing']['first_name']); ?>

				 <?php echo esc_html($data[$i][$j]['billing']['last_name']); ?><br/>

				 <?php echo esc_html($data[$i][$j]['billing']['email']); ?><br/>

				 <?php echo esc_html($data[$i][$j]['billing']['phone']); ?><br/>



				 Status : <?php echo esc_html($data[$i][$j]['status']); ?>	



				</td>

					<td  class="woocommerce-orders-table__body view-url-td"><?php $url = $data[$i][$j]['_links']['self'][0]['href']; 			

					  		$urlarr = parse_url($url);

					echo esc_html($urlarr['host']);

					

					?>

					

				</td>





					</tr>

				

					<?php }

							

				

				

				} }?>

				</tbody>



				<tfoot>

					<tr>

						

					<th class="manage-column column-primary">Order</th>

					<th class="manage-column column-primary">Date</th>

					<th class="manage-column column-primary">Total</th>

					<th class="manage-column column-primary">Detail</th>

					<th class="manage-column column-primary">URL</th>

					

							</tr>

				</tfoot>





			</table>

<?php













//	$phone = get_user_meta($current_user->ID,'phone_number',true); echo $phone; 



/*

 * Step 4

 */

// Go to Settings > Permalinks and just push "Save Changes" button.



}

