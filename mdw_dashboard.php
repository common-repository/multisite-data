<?php

function mdw_dashboard() {



		$first_day_this_month = date('Y-m-01'); 

		$last_day_this_month  = date('Y-m-t');



	$first_day_this_month_three = date('Y-m-01', strtotime('first day of -2 month'));

	$last_day_this_month_three  = date('Y-m-t', strtotime('last day of -2 month'));



$first_day_this_month_two = date('Y-m-01', strtotime('first day of -1 month'));

	$last_day_this_month_two  = date('Y-m-t', strtotime('last day of -1 month'));

	



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



	if($weboneapiurl!=''){

	$jsoncustomeraa = wp_remote_get($weboneapiurl.'/wp-json/wc/v3/reports/customers/totals?per_page=100&role=all&consumer_key=ck_f31e43ae30c8a97a859ac0c9b5f44b50df40ff7e&consumer_secret=cs_92b71c4af03bfb69a8a34c25ef105c98d6f57e4c');
	$jsoncustomera = wp_remote_retrieve_body($jsoncustomeraa);
}
if($webtwoapiurl!=''){
	$jsoncustomerbb = wp_remote_get($webtwoapiurl.'/wp-json/wc/v3/reports/customers/totals?per_page=100&role=all&consumer_key=ck_68a18be3194c169d337b0af5d937d2073eec194d&consumer_secret=cs_26b45b8d14cffb5678f5b2af277715be606f9d0f');
	$jsoncustomerb = wp_remote_retrieve_body($jsoncustomerbb);
}
if($webthreeapiurl!=''){
	$jsoncustomercc = wp_remote_get($webthreeapiurl.'/wp-json/wc/v3/reports/customers/totals?per_page=100&role=all&consumer_key=ck_af2da31f94ca0a9c4d35288b494af7853c783093&consumer_secret=cs_0a6d41807ddafdf2722a8a7eca9550aa0cb30d2a');
	$jsoncustomerc = wp_remote_retrieve_body($jsoncustomercc);
}

















	$task_array = json_decode($jsoncustomera,true);

	$jsoncustomera= json_decode($jsoncustomera,true);

	$jsoncustomerb = json_decode($jsoncustomerb,true);

	$jsoncustomerc = json_decode($jsoncustomerc,true);

	$customerscount = $jsoncustomera[0]['total']+$jsoncustomerb[0]['total']+$jsoncustomerc[0]['total'];


if($weboneapiurl!=''){
	$jsonorderaoo = wp_remote_get($weboneapiurl.'/wp-json/wc/v3/orders?per_page=100&role=all&consumer_key=ck_f31e43ae30c8a97a859ac0c9b5f44b50df40ff7e&consumer_secret=cs_92b71c4af03bfb69a8a34c25ef105c98d6f57e4c');
	$jsonorderao = wp_remote_retrieve_body($jsonorderaoo);
}


if($webtwoapiurl!=''){
	$jsonorderboo = wp_remote_get($webtwoapiurl.'/wp-json/wc/v3/orders?per_page=100&role=all&consumer_key=ck_68a18be3194c169d337b0af5d937d2073eec194d&consumer_secret=cs_26b45b8d14cffb5678f5b2af277715be606f9d0f');
	$jsonorderbo = wp_remote_retrieve_body($jsonorderboo);
}

if($webthreeapiurl!=''){
	$jsonordercoo = wp_remote_get($webthreeapiurl.'/wp-json/wc/v3/orders?per_page=100&role=all&consumer_key=ck_af2da31f94ca0a9c4d35288b494af7853c783093&consumer_secret=cs_0a6d41807ddafdf2722a8a7eca9550aa0cb30d2a');
	$jsonorderco = wp_remote_retrieve_body($jsonordercoo);
}






	$jsonm[] = json_decode($jsonorderao,true);

	$jsonm[] = json_decode($jsonorderbo,true);

	$jsonm[] = json_decode($jsonorderco,true);

	$data = $jsonm;


if($weboneapiurl!=''){
$jsonsalesaa = wp_remote_get($weboneapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month.'&date_max='.$last_day_this_month.'&role=all&consumer_key='.$weboneconsumer_key.'&consumer_secret='.$weboneconsumer_secret);
	$jsonsalesa = wp_remote_retrieve_body($jsonsalesaa);

	//print_r($jsonsalesa);
}

if($webtwoapiurl!=''){
	 $jsonsalesbb = wp_remote_get($webtwoapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month.'&date_max='.$last_day_this_month.'&role=all&consumer_key='.$webtwoconsumer_key.'&consumer_secret='.$webtwoconsumer_secret);
	 $jsonsalesb = wp_remote_retrieve_body($jsonsalesbb);
//	 print_r($jsonsalesb);
}

if($webthreeapiurl!=''){
	$jsonsalescc = wp_remote_get($webthreeapiurl.'/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month.'&date_max='.$last_day_this_month.'&role=all&consumer_key='.$webthreeconsumer_key.'&consumer_secret='.$webthreeconsumer_secret);
	$jsonsalesc = wp_remote_retrieve_body($jsonsalescc);
//	print_r($jsonsalesc);
}







	$jsonsalesam = json_decode($jsonsalesa,true);

	$jsonsalesbm = json_decode($jsonsalesb,true);

	$jsonsalescm = json_decode($jsonsalesc,true);



	$salescount = $jsonsalesam[0]['total_sales']+$jsonsalesbm[0]['total_sales']+$jsonsalescm[0]['total_sales'];

	 $ordercount = $jsonsalesam[0]['total_orders']+$jsonsalesbm[0]['total_orders']+$jsonsalescm[0]['total_orders'];

	$total_tax = $jsonsalesam[0]['total_tax']+$jsonsalesbm[0]['total_tax']+$jsonsalescm[0]['total_tax'];

	
if($weboneapiurl!=''){
	$jsonsalesathree3 = wp_remote_get($weboneapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month_three.'&date_max='.$last_day_this_month_three.'&role=all&consumer_key='.$weboneconsumer_key.'&consumer_secret='.$weboneconsumer_secret);
$jsonsalesathree = wp_remote_retrieve_body($jsonsalesathree3);


}
if($webtwoapiurl!=''){
	$jsonsalesbthree3 = wp_remote_get($webtwoapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month_three.'&date_max='.$last_day_this_month_three.'&role=all&consumer_key='.$webtwoconsumer_key.'&consumer_secret='.$webtwoconsumer_secret);
	$jsonsalesbthree = wp_remote_retrieve_body($jsonsalesbthree3);
}
if($webthreeapiurl!=''){
	$jsonsalescthree3 = wp_remote_get($webthreeapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month_three.'&date_max='.$last_day_this_month_three.'&role=all&consumer_key='.$webthreeconsumer_key.'&consumer_secret='.$webthreeconsumer_secret);
	$jsonsalescthree = wp_remote_retrieve_body($jsonsalescthree3);
}








	$jsonsalesamthree = json_decode($jsonsalesathree,true);

	$jsonsalesbmthree = json_decode($jsonsalesbthree,true);

	$jsonsalescmthree = json_decode($jsonsalescthree,true);



  


if($weboneapiurl!=''){
	$jsonsalesatwo2 = wp_remote_get($weboneapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month_two.'&date_max='.$last_day_this_month_two.'&role=all&consumer_key='.$weboneconsumer_key.'&consumer_secret='.$weboneconsumer_secret);
	$jsonsalesatwo = wp_remote_retrieve_body($jsonsalesatwo2);
}
if($webtwoapiurl!=''){
	$jsonsalesbtwo2 = wp_remote_get($webtwoapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month_two.'&date_max='.$last_day_this_month_two.'&role=all&consumer_key='.$webtwoconsumer_key.'&consumer_secret='.$webtwoconsumer_secret);
	$jsonsalesbtwo = wp_remote_retrieve_body($jsonsalesbtwo2);
}
if($webthreeapiurl!=''){
	$jsonsalescttwo2 = wp_remote_get($webthreeapiurl.'/wp-json/wc/v3/reports/sales?per_page=100&date_min='.$first_day_this_month_two.'&date_max='.$last_day_this_month_two.'&role=all&consumer_key='.$webthreeconsumer_key.'&consumer_secret='.$webthreeconsumer_secret);
	$jsonsalescttwo = wp_remote_retrieve_body($jsonsalescttwo2);
}






	$jsonsalesamtwo = json_decode($jsonsalesatwo,true);

	$jsonsalesbmtwo = json_decode($jsonsalesbtwo,true);

	$jsonsalescmtwo = json_decode($jsonsalesctwo,true);







          foreach($web_datam as $row){  



$ukrl = $row->weblist_apiurl.'/wp-json/wc/v3/orders?per_page=100&consumer_key='.$row->consumer_key.'&consumer_secret='.$row->consumer_secret;

 $jsonaaa = wp_remote_get($ukrl);
$jsona = wp_remote_retrieve_body($jsonaaa);
$jsonmorder[] = json_decode($jsona,true);



 } 






$dataorder = $jsonmorder;







?>



<!--chartjs-->


<?php wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/chartcss/bootstrap.min.css',false,'','all'); ?> 
<?php wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/chartcss/style.css',false,'','all'); ?> 
<?php wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/chartcss/fontawesome-all.css',false,'','all'); ?> 







<?php $vt = sanitize_text_field($web_datam[0]->weblist_title); ?>
<?php $st = sanitize_text_field($jsonsalesam[0]['total_sales']); ?>
<?php 

if(isset($web_datam[1]->weblist_title))
{
$vt1 = sanitize_text_field($web_datam[1]->weblist_title);
}
else
{
	$vt1 = 'NA';
}


if(isset($jsonsalesam[1]['total_sales']))
{
$st1 = sanitize_text_field($jsonsalesam[1]['total_sales']);
}
else
{
	$st1 = 0;
}



 ?>


<?php  
 $stpercent = @esc_html($st*100/($st+$st1));
 $st1percent = @esc_html($st1*100/($st+$st1));
 ?>


<?php //for graph

$salesone = esc_html($jsonsalesbmthree[0]['total_sales']/50);
$salestwo = esc_html($jsonsalescmthree[0]['total_sales']/50);
$salesthree = esc_html($jsonsalesamthree[0]['total_sales']/50);

$salesfour = esc_html($jsonsalesbmtwo[0]['total_sales']/50);
 $salesfive = esc_html($jsonsalescmtwo[0]['total_sales']/50);
 $salessix =  esc_html($jsonsalesamtwo[0]['total_sales']/50);

$salesseven = esc_html($jsonsalesbm[0]['total_sales']/50);
 $saleseight = esc_html($jsonsalescm[0]['total_sales']/50);
 $salesnine =  esc_html($jsonsalesam[0]['total_sales']/50);

   ?>

<?php 

 $orderone = esc_html($jsonsalesbmthree[0]['total_orders']*20);
 $ordertwo = esc_html($jsonsalescmthree[0]['total_orders']*20);
 $orderthree = esc_html($jsonsalesamthree[0]['total_orders']*20);

$orderfour = esc_html($jsonsalesbmtwo[0]['total_orders']*20);
 $orderfive = esc_html($jsonsalescmtwo[0]['total_orders']*20);
 $ordersix =  esc_html($jsonsalesamtwo[0]['total_orders']*20);

$orderseven = esc_html($jsonsalesbm[0]['total_orders']*20);
 $ordereight = esc_html($jsonsalescm[0]['total_orders']*20);
 $ordernine =  esc_html($jsonsalesam[0]['total_orders']*20);
//for graph
   ?>

<style type="text/css">


#my-pie-chart-container {
  display: flex;
  align-items: center;
}

#my-pie-chart {
  background: conic-gradient(blue <?php echo esc_html($stpercent); ?>%, green 0.00% 0.00%, yellow <?php echo esc_html($st1percent); ?>% 0.00%, orange 0.00% 0.00%, red 0.00%);
  border-radius: 50%;
    width: 150px;
    height: 150px;
}

#legenda {
  margin-left: 20px;
  background-color: white;
  padding: 5px;
}

.entry {
  display: flex;
  align-items: center;
}

.entry-color {
    height: 10px;
    width: 10px;
}

.entry-text {
  margin-left: 5px;
}

#color-red {
  background-color: red;
}

#color-orange {
  background-color: orange;
}

#color-yellow {
  background-color: yellow;
}

#color-green {
  background-color: green;
}

#color-blue {
  background-color: blue;
}

#color-black {
  background-color: black;
}

#color-brown {
  background-color: brown;
}
</style>

<!--graph-->
<style type="text/css">
	
	@-webkit-keyframes animate-width {
  0% {
    width: 0;
  }
  100% {
    visibility: visible;
  }
}
@-moz-keyframes animate-width {
  0% {
    width: 0;
  }
  100% {
    visibility: visible;
  }
}
@keyframes animate-width {
  0% {
    width: 0;
  }
  100% {
    visibility: visible;
  }
}
@-webkit-keyframes animate-height {
  0% {
    height: 0;
  }
  100% {
    visibility: visible;
  }
}
@-moz-keyframes animate-height {
  0% {
    height: 0;
  }
  100% {
    visibility: visible;
  }
}
@keyframes animate-height {
  0% {
    height: 0;
  }
  100% {
    visibility: visible;
  }
}
body {
  background-color: #3b4150;
  font-family: arial, sans-serif;
  color: #cdcdcd;
}

#bar-chart {
  height: 380px;
  width: 70%;
  position: relative;
  margin: 50px auto 0;
}
#bar-chart * {
  box-sizing: border-box;
}
#bar-chart .graph {
  height: 283px;
  position: relative;
}
#bar-chart .bars {
  height: 347px;
  padding: 0 0%;
  position: absolute;
  width: 100%;
  z-index: 10;
}
#bar-chart .bar-group {
  display: block;
  float: left;
  height: 100%;
  position: relative;
  width: 20%;
  margin-right: 10%;
}
#bar-chart .bar-group:last-child {
  margin-right: 0;
}
#bar-chart .bar-group .bar {
  visibility: hidden;
  height: 0;
  -webkit-animation: animate-height;
  -moz-animation: animate-height;
  animation: animate-height;
  animation-timing-function: cubic-bezier(0.35, 0.95, 0.67, 0.99);
  -webkit-animation-timing-function: cubic-bezier(0.35, 0.95, 0.67, 0.99);
  -moz-animation-timing-function: cubic-bezier(0.35, 0.95, 0.67, 0.99);
  animation-duration: 0.4s;
  -webkit-animation-duration: 0.4s;
  -moz-animation-duration: 0.4s;
  animation-fill-mode: forwards;
  -webkit-animation-fill-mode: forwards;
  box-shadow: 1px 0 2px rgba(0, 0, 0, 0.15);
  border: 1px solid #2d2d2d;
  border-radius: 3px 3px 0 0;
  bottom: 0;
  cursor: pointer;
  height: 0;
  position: absolute;
  text-align: center;
  width: 25%;
}
#bar-chart .bar-group .bar:nth-child(2) {
  left: 35%;
}
#bar-chart .bar-group .bar:nth-child(3) {
  left: 70%;
}
#bar-chart .bar-group .bar span {
  display: none;
}
#bar-chart .bar-group .bar-1 {
  animation-delay: 0.3s;
  -webkit-animation-delay: 0.3s;
}
#bar-chart .bar-group .bar-2 {
  animation-delay: 0.4s;
  -webkit-animation-delay: 0.4s;
}
#bar-chart .bar-group .bar-3 {
  animation-delay: 0.5s;
  -webkit-animation-delay: 0.5s;
}
#bar-chart .bar-group .bar-4 {
  animation-delay: 0.6s;
  -webkit-animation-delay: 0.6s;
}
#bar-chart .bar-group .bar-5 {
  animation-delay: 0.7s;
  -webkit-animation-delay: 0.7s;
}
#bar-chart .bar-group .bar-6 {
  animation-delay: 0.8s;
  -webkit-animation-delay: 0.8s;
}
#bar-chart .bar-group .bar-7 {
  animation-delay: 0.9s;
  -webkit-animation-delay: 0.9s;
}
#bar-chart .bar-group .bar-8 {
  animation-delay: 1s;
  -webkit-animation-delay: 1s;
}
#bar-chart .bar-group .bar-9 {
  animation-delay: 1.1s;
  -webkit-animation-delay: 1.1s;
}
#bar-chart .bar-group .bar-10 {
  animation-delay: 1.2s;
  -webkit-animation-delay: 1.2s;
}
#bar-chart .bar-group .bar-11 {
  animation-delay: 1.3s;
  -webkit-animation-delay: 1.3s;
}
#bar-chart .bar-group .bar-12 {
  animation-delay: 1.4s;
  -webkit-animation-delay: 1.4s;
}
#bar-chart .bar-group .bar-13 {
  animation-delay: 1.5s;
  -webkit-animation-delay: 1.5s;
}
#bar-chart .bar-group .bar-14 {
  animation-delay: 1.6s;
  -webkit-animation-delay: 1.6s;
}
#bar-chart .bar-group .bar-15 {
  animation-delay: 1.7s;
  -webkit-animation-delay: 1.7s;
}
#bar-chart ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
#bar-chart .x-axis {
  bottom: -96px;
  position: absolute;
  text-align: center;
  width: 350px;

}
#bar-chart .x-axis li {
  float: left;
  margin-right: 10.5%;
  font-size: 11px;
  width: 11.5%;
}
#bar-chart .x-axis li:last-child {
  margin-right: 0;
}
#bar-chart .y-axis {
  position: absolute;
  text-align: right;
  width: 100%;
}
#bar-chart .y-axis li {
  border-top: 1px solid #4e5464;
  display: block;
  height: 63.25px;
  width: 100%;
}
#bar-chart .y-axis li span {
  display: block;
  font-size: 11px;
  margin: -10px 0 0 -60px;
  padding: 0 10px;
  width: 40px;
}
#bar-chart .stat-1 {
  background-image: -webkit-linear-gradient(left, #ff4500 0%, #ff4500 47%, #cf3a02 50%, #cf3a02 100%);
  background-image: linear-gradient(to right, #ff4500 0%, #ff4500 47%, #cf3a02 50%, #cf3a02 100%);
}
#bar-chart .stat-2 {
  background-image: -webkit-linear-gradient(left, #b8f123 0%, #b8f123 47%, #79a602 50%, #79a602 100%);
  background-image: linear-gradient(to right, #b8f123 0%, #b8f123 47%, #79a602 50%, #79a602 100%);
}
#bar-chart .stat-3 {
  background-image: -webkit-linear-gradient(left, #00c5ff 0%, #00c5ff 47%, #0383a9 50%, #0383a9 100%);
  background-image: linear-gradient(to right, #00c5ff 0%, #00c5ff 47%, #0383a9 50%, #0383a9 100%);
}
</style>

<!--chart-->





<style>

.grafbox{padding:0; max-width: 100%; box-shadow: 0 6px 6px #d9d9d9; }

.card.twobox-fullwidth {    max-width: 100%;    padding: 0;}

.viewdetails-but {    background: #333;    padding: 8px !important;}

.viewdetails-but a {    color: #fff;    font-size: 1rem;    font-weight: 500;}

.viewdetails-but a:hover {text-decoration: none;}

.table-headtitle{background: #ffd700;}

div#piechart div[dir="ltr"] {    width: 100% !important;overflow: auto;}



.grafbox canvas {    width: 100% !important;    pointer-events: none;}

.recent-order span.traffic-sales-amount {    float: right;    font-weight: bold;}

.table thead th {    font-weight: 500;}

.minheight-graf{height:275px;}



.greentext,td.completed{    color: green;}

td.failed {    color: red;}

td.processing {    color: orange;}

td.pending {    color: #3366cc;}

.stauts-cap{    text-transform: capitalize;}



@media all and (max-width:1280px){

.card.twobox-fullwidth {    font-size: 14px;}	

	

}

@media all and (max-width:1220px){

.minheight-graf{height:300px;}

	

}

 @media all and (max-width:990px){

h5.text-muted,h5.card-header.table-headtitle {    font-size: 18px;}

#piechart {    overflow: auto;}

} 



 @media all and (max-width:767px){

.minheight-graf{height:auto;}

} 









</style>















<?php



   echo '<div class="wrap">';

   



?>





<div class="dashboard-wrapper">

<div class="container-fluid  dashboard-content">

 <div class="row">

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="page-header">

<h3 class="mb-2"> Dashboard  </h3>

<p class="pageheader-text"></p>



</div>

</div>

</div>







<div class="row">




		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

		<a href="?page=mdw_salesreportlist" >

		<div class="card grafbox" style="width:100%; height: 300px;">

		<div class="card-body  minheight-graf">

		<h5 class="text-muted">Monthly Revenue - <?php echo date("M'y");?></h5>

		<div class="metric-value d-inline-block">

		<h1 class="mb-1 text-primary">$<?php echo esc_html($salescount); ?></h1>

		</div>

		<!--<div class="metric-label d-inline-block float-right text-danger">

		<i class="fa fa-fw fa-caret-down"></i><span></span>

		</div>-->

		</div>



		</div>

		</a>

		</div>



		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

		<a href="?page=mdw_orderedproductlist">

		<div class="card grafbox" style="width:100%; height: 300px;">

		<div class="card-body minheight-graf">

		<h5 class="text-muted">Monthly Order - <?php echo date("M'y");?></h5>

		<div class="metric-value d-inline-block">

		<h1 class="mb-1 text-primary"><?php echo esc_html($ordercount); ?> </h1>

		</div>

		<!--<div class="metric-label d-inline-block float-right text-danger">

		<i class="fa fa-fw fa-caret-down"></i><span></span>

		</div>-->

		</div>



		</div>

		</a>

		</div>





		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

		<div class="card twobox-fullwidth grafbox" style="width:100%; height: 300px;">

		<div class="card-body">

		<h5 class="text-muted">Monthly Sales Report - <?php echo date("M'y");?></h5>


<div id="my-pie-chart-container">
  <div id="my-pie-chart"></div>

  <div id="legenda">
   
    <div class="entry">
      <div id="color-blue" class="entry-color"></div>
      <div class="entry-text"><?php echo esc_html($vt); ?></div>
    </div>
  
    <div class="entry">
      <div id="color-yellow" class="entry-color"></div>
      <div class="entry-text"><?php echo esc_html($vt1) ?></div>
    </div>

  </div>
</div>
<!--		<div id="piechart"></div>-->

		</div>

		</div>

		</div>





</div>










<div class="row">









<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

<div class="card twobox-fullwidth">

<h5 class="card-header table-headtitle">Revenue</h5>

<div class="card-body p-0">

<!--<div id="chart_div" style="width:100%; height: 500px;"></div>-->


<!--graph-->
<!-- partial:index.partial.html -->
<div id="bar-chart">
  <div class="graph">
    <ul class="x-axis">
      <li><span><?php echo date('Y-m', strtotime('first day of -2 month'));?></span></li>
      <li><span><?php echo date('Y-m', strtotime('first day of -1 month'));?></span></li>
      <li><span><?php echo date('Y-m');?></span></li>

    </ul>
    <ul class="y-axis">
    	  <li><span>5k</span></li>
      <li><span>4k</span></li>
      <li><span>3k</span></li>
      <li><span>2k</span></li>
      <li><span>1k</span></li>
      <li><span>0</span></li>
    </ul>
    <div class="bars">
      <div class="bar-group">
        <div class="bar bar-1 stat-1" style="height: <?php echo esc_html($salesone);?>%;">      
          <span>5680</span>
        </div>
        <div class="bar bar-2 stat-2" style="height: <?php echo esc_html($salestwo);?>%;">
          <span>5680</span>
        </div>

         <div class="bar bar-6 stat-3" style="height: <?php echo esc_html($salesthree);?>%;">
          <span>1040</span>
        </div>
      </div>
      <div class="bar-group">
        <div class="bar bar-4 stat-1" style="height: <?php echo esc_html($salesfour);?>%;">
          <span>6080</span>
        </div>
        <div class="bar bar-5 stat-2" style="height: <?php echo esc_html($salesfive);?>%;">
          <span>6880</span>
        </div>
        <div class="bar bar-6 stat-3" style="height: <?php echo esc_html($salessix);?>%;">
          <span>1760</span>
        </div>
      </div>
      <div class="bar-group">
        <div class="bar bar-7 stat-1" style="height: <?php echo esc_html($salesseven);?>%;">
          <span>6240</span>
        </div>
        <div class="bar bar-8 stat-2" style="height: <?php echo esc_html($saleseight);?>%;">
          <span>5760</span>
        </div>
        <div class="bar bar-9 stat-3" style="height: <?php echo esc_html($salesnine);?>%;">
          <span>2880</span>
        </div></div>
     
    </div>

  </div>
</div>
<!-- partial -->
<!--graph-->

<!--legend-->
  <div id="legenda">
     <div class="entry">
      <div id="color-orange" class="entry-color"></div>
      <div class="entry-text">	<?php if($web_datam[1]->weblist_title!=''){echo esc_html($web_datam[1]->weblist_title);}else{ echo 'NA';}; ?></div>
    </div>
 
  
    <div class="entry">
      <div id="color-yellow" class="entry-color"></div>
      <div class="entry-text">	<?php if($web_datam[2]->weblist_title!=''){echo esc_html($web_datam[2]->weblist_title);}else{ echo 'NA';}; ?></div>
    </div>

       <div class="entry">
      <div id="color-blue" class="entry-color"></div>
      <div class="entry-text">	<?php if($web_datam[0]->weblist_title!=''){echo esc_html($web_datam[0]->weblist_title);}else{ echo 'NA';}; ?></div>
    </div>

  </div>

<!--legend-->

</div>

</div>

</div>











<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

<div class="card twobox-fullwidth">

<h5 class="card-header table-headtitle">Order</h5>

<div class="card-body p-0">

<!--<div id="chart_div_order" style="width:100%; height: 500px;"></div>-->
<!--graph-->
<!-- partial:index.partial.html -->
<div id="bar-chart">
  <div class="graph">
    <ul class="x-axis">
      <li><span><?php echo date('Y-m', strtotime('first day of -2 month'));?></span></li>
      <li><span><?php echo date('Y-m', strtotime('first day of -1 month'));?></span></li>
      <li><span><?php echo date('Y-m');?></span></li>

    </ul>
    <ul class="y-axis">
    	  <li><span>5</span></li>
      <li><span>4</span></li>
      <li><span>3</span></li>
      <li><span>2</span></li>
      <li><span>1</span></li>
      <li><span>0</span></li>
    </ul>
    <div class="bars">
      <div class="bar-group">
        <div class="bar bar-1 stat-1" style="height: <?php echo esc_html($orderone);?>%;">      
          <span>5680</span>
        </div>
        <div class="bar bar-2 stat-2" style="height: <?php echo esc_html($ordertwo);?>%;">
          <span>5680</span>
        </div>
        <div class="bar bar-3 stat-3" style="height: <?php echo esc_html($orderthree);?>%;">
          <span>1040</span>
        </div>
      </div>
      <div class="bar-group">
        <div class="bar bar-4 stat-1" style="height: <?php echo esc_html($orderfour);?>%;">
          <span>6080</span>
        </div>
        <div class="bar bar-5 stat-2" style="height: <?php echo esc_html($orderfive);?>%;">
          <span>6880</span>
        </div>
        <div class="bar bar-6 stat-3" style="height: <?php echo esc_html($ordersix);?>%;">
          <span>1760</span>
        </div>
      </div>
      <div class="bar-group">
        <div class="bar bar-7 stat-1" style="height: <?php echo esc_html($orderseven);?>%;">
          <span>6240</span>
        </div>
        <div class="bar bar-8 stat-2" style="height: <?php echo esc_html($ordereight);?>%;">
          <span>5760</span>
        </div>
        <div class="bar bar-9 stat-3" style="height: <?php echo esc_html($ordernine);?>%;">
          <span>2880</span>
        </div></div>
     
    </div>
  </div>
</div>
<!-- partial -->

<!--legend-->
  <div id="legenda">
     <div class="entry">
      <div id="color-orange" class="entry-color"></div>
      <div class="entry-text">	<?php if($web_datam[1]->weblist_title!=''){echo esc_html($web_datam[1]->weblist_title);}else{ echo 'NA';}; ?></div>
    </div>
 
  
    <div class="entry">
      <div id="color-yellow" class="entry-color"></div>
      <div class="entry-text">	<?php if($web_datam[2]->weblist_title!=''){echo esc_html($web_datam[2]->weblist_title);}else{ echo 'NA';}; ?></div>
    </div>

       <div class="entry">
      <div id="color-blue" class="entry-color"></div>
      <div class="entry-text">	<?php if($web_datam[0]->weblist_title!=''){echo esc_html($web_datam[0]->weblist_title);}else{ echo 'NA';}; ?></div>
    </div>

  </div>

<!--legend-->
<!--graph-->
</div>

</div>

</div>

























</div>











<div class="row">



<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



<div class="card twobox-fullwidth">

<h5 class="card-header table-headtitle">Ordered Product Report</h5>

<div class="card-body p-0">

<div class="table-responsive">

<table class="table" style="margin-bottom:0;">

	<thead>

<tr>

<th class="manage-column column-primary">Customer</th>

<th class="manage-column column-primary">Product Id/Name</th>

<th class="manage-column column-primary">Order Status</th>

<th class="manage-column column-primary">Total</th>

<th class="manage-column column-primary">URL</th>

</tr>

</thead>

<tbody>

<?php

if(@count($dataorder)>=9)

{

  $cmnt = 3;

}

else

{

  $cmnt = @count($dataorder);

}



 for ($i=0; $i < $cmnt; $i++) { 



for ($j=0; $j < 3; $j++) {  ?>

<tr>

<td>

<?php echo esc_html($dataorder[$i][$j]['billing']['first_name']); ?> <?php echo esc_html($dataorder[$i][$j]['billing']['last_name']); ?>

  </td>

<td>

<?php echo esc_html($dataorder[$i][$j]['line_items'][0]['name']); ?>  </td>

<td class="<?php echo esc_html($dataorder[$i][$j]['status']); ?> stauts-cap"><?php echo esc_html($dataorder[$i][$j]['status']); ?>	 </td>

<td class="greentext">$<?php echo esc_html($dataorder[$i][$j]['total']); ?>	 </td>

<td><?php $url = $dataorder[$i][$j]['_links']['self'][0]['href']; 			



$urlarr = parse_url($url);



echo esc_html($urlarr['host']);







?> </td>	

</tr>



				



<?php } }?>



				</tbody>



			



			</table>



    



</div>



</div>

<div class="card-footer text-center viewdetails-but">

<a href="?page=mdw_orderedproductlist" class="btn-primary-link">View Details</a>

</div>

</div>







</div>






</div>

































<?php } ?>





