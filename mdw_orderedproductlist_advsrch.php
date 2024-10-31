<?php

function mdw_orderedproductlist_advsrch() {

?>

<?php 

global $wpdb;
$table_name = $wpdb->prefix.'weblist';
 $sql = "SELECT * FROM ".$table_name;
$web_datam = $wpdb->get_results($sql);



					$i = 0; ?>

					<?php foreach($web_datam as $row){  

$ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/orders?per_page=5&consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret;
 
$req = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($req);


//$jsona = file_get_contents($ukrl);
$jsonm[] = json_decode($jsona,true);


 } 

?>

<?php


		$data = $jsonm;

		

 //echo '<pre>';



		//print_r($data);

		//echo '</pre>';

		echo '<div class="wrap"><h2>'. __('Advance Search Order').'</h2>';

        ?>





<?php require_once('scripts.php');?>





<style>

thead input {

        width: 100%;

    }

    .fixedHeader-locked

    {

        display: none;

    }





 .fixedHeader-floating

    {

        display: none;

    }


#example_length label
{
	display: none;
}


</style>




<script>



$(document).ready(function() {

    // Setup - add a text input to each footer cell

    $('#example thead tr').clone(true).addClass('filters').appendTo( '#example thead' );

 

    var table = $('#example').DataTable( {

        orderCellsTop: true,

        fixedHeader: true

    } );

 

 

        table.columns().eq(0).each(function(colIdx) {

            var cell = $('.filters th').eq($(table.column(colIdx).header()).index());

            console.log(cell);

            var title = $(cell).text();

            $(cell).html( '<input type="text" placeholder="Search '+title+'" />' );

     

            $('input', $('.filters th').eq($(table.column(colIdx).header()).index()) ).off('keyup change').on('keyup change', function (e) {

                e.stopPropagation();

                $(this).attr('title', $(this).val());

                    var regexr = '({search})'; //$(this).parents('th').find('select').val();

                    table

                        .column(colIdx)

                        .search((this.value != "") ? regexr.replace('{search}', '((('+this.value+')))') : "", this.value != "", this.value == "")

                        .draw();

                 

            });

 

            $('select', $('.filters th').eq($(table.column(colIdx).header()).index()) ).off('change').on('change', function () {

                $(this).parents('th').find('input').trigger('change');

            });

        });

} );



</script>

  <div class="search-input">
           
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </div>
        
    





<table class="wp-list-table widefat fixed striped table-view-list movies table table-striped mt32 customers-list" id="myTable"  data-page-length="50">


	<thead>

		<tr>

        <th class="manage-column column-primary">Ord Id</th>

					

					<th class="manage-column column-primary">Product</th>

						<th class="manage-column column-primary">C.Name</th>

					

						<th class="manage-column column-primary">Email</th>

						<th class="manage-column column-primary">Phone</th>

						<th class="manage-column column-primary">Status</th>

						<th class="manage-column column-primary">Date</th>

						<th class="manage-column column-primary">Total</th>

						<th class="manage-column column-primary">URL</th>

		</tr>

	</thead>

	<tbody>

	<?php for ($i=0; $i < @count($data); $i++) { 

		for ($j=0; $j < @count($data[$i]); $j++) {  ?>

					<tr>

					<td> 

							<?php echo esc_html($data[$i][$j]['id']); ?>	

						</td>

					<td>

						<?php echo esc_html($data[$i][$j]['line_items'][0]['name']); ?> </td>

					

						



						<td>

							<?php echo esc_html($data[$i][$j]['billing']['first_name']); ?> <?php echo esc_html($data[$i][$j]['billing']['last_name']); ?></td>

					

						<td> 

							<?php echo esc_html($data[$i][$j]['billing']['email']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['billing']['phone']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['status']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['date_created']); ?>	

						</td>

						<td> 

							<?php echo esc_html($data[$i][$j]['total']); ?>	

						</td>

					<td><?php $url = $data[$i][$j]['_links']['self'][0]['href']; 			

					  		$urlarr = parse_url($url);

					echo esc_html($urlarr['host']);

					

					?>

					

				</td>

					</tr>

				

					<?php } }?>

		

	</tbody>

	<tfoot>

		<tr>

        <td class="manage-column column-primary">Order Id</td>

					

					<td class="manage-column column-primary">Product</td>

						<td class="manage-column column-primary">C.Name</td>

					

						<td class="manage-column column-primary">Email</td>

						<td class="manage-column column-primary">Phone</td>

						<td class="manage-column column-primary">Status</td>

						<td class="manage-column column-primary">Date</td>

						<td class="manage-column column-primary">Total</td>

						<td class="manage-column column-primary">URL</td>

		</tr>

	</tfoot>

</table>











<?php







}





?>