<?php
function mdw_addweblist() {

    echo '<div class="wrap"><h2>'. __('Add Website Details').'</h2>';
	global $wpdb;
$encryt = sanitize_text_field($_REQUEST['encryt']);
 $addlist = sanitize_text_field($_REQUEST['addlist']);
 $editid = sanitize_text_field($_REQUEST['editid']);
 $delid = sanitize_text_field($_REQUEST['delid']);
if(isset($encryt))
{
	//Encryption
	$en = sanitize_text_field($_REQUEST['encryt']);
}
if($addlist!='' && $editid=='')
{

$table = $wpdb->prefix.'weblist';
$title = sanitize_text_field($_REQUEST['title']);
$apiurl = sanitize_text_field($_REQUEST['apiurl']);
$consumer_key = sanitize_text_field($_REQUEST['consumer_key']);
$consumer_secret = sanitize_text_field($_REQUEST['consumer_secret']);
$msqllcnt = "SELECT count(*) as cnt FROM $table";
$thepostcnt = $wpdb->get_row( $wpdb->prepare( $msqllcnt ) );
$tcount = $thepostcnt->cnt; 
if($tcount>=2)
{
	 ?>
 <script>
window.location = "admin.php?page=mdw_registration&tcount=inactive";
</script>
 <?php
//header("location:admin.php?page=mdw_registration&tcount=inactive");
}
else
{
$wpdb->insert($table, array(
       'weblist_title' => $title,
    'weblist_apiurl' => $apiurl,
    'weblist_status' => '1',
'consumer_key' => $consumer_key,
  'consumer_secret' => $consumer_secret));
 ?>
 <script>
window.location = "admin.php?page=managedata_websitelist";
</script>
 <?php
//header("location:admin.php?page=managedata_websitelist");
}
}
elseif($editid!='' && $addlist!='')
{
$table = $wpdb->prefix.'weblist';
$title = sanitize_text_field($_REQUEST['title']);
$apiurl = sanitize_text_field($_REQUEST['apiurl']);
$consumer_key = sanitize_text_field($_REQUEST['consumer_key']);
$consumer_secret = sanitize_text_field($_REQUEST['consumer_secret']);
$editid = sanitize_text_field($_REQUEST['editid']);
$usql = "UPDATE $table SET weblist_title='$title',weblist_apiurl='$apiurl',consumer_key='$consumer_key',consumer_secret='$consumer_secret' WHERE weblist_id=$editid";
 $wpdb->query($usql);
 ?>
 <script>
window.location = "admin.php?page=managedata_websitelist";
</script>
 <?php
//header("location:admin.php?page=managedata_websitelist");
}
elseif($delid!='' )
{
$table = $wpdb->prefix.'weblist';
$delid = sanitize_text_field($_REQUEST['delid']);
$usql = "Delete from $table WHERE weblist_id=$delid";
$wpdb->query($usql);
 ?>
 <script>
window.location = "admin.php?page=managedata_websitelist";
</script>
 <?php
//header("location:admin.php?page=managedata_websitelist");
}
else
{
$editid = sanitize_text_field($_REQUEST['editid']);
$table = $wpdb->prefix.'weblist';
if($editid!=''){
$msqll = "SELECT * FROM $table WHERE weblist_id=$editid";
$thepost = $wpdb->get_row( $wpdb->prepare( $msqll ) );
}
?>
<form action="">
<input type="hidden" name="editid" value="<?php echo esc_html($_REQUEST['editid']); ?>"> 
<input type="hidden" name="page" value="managedata_addwebsitelist"> 
<table class="wp-list-table widefat fixed striped table-view-list movies" id="dataTable">
<tbody>
<tr>
<td >Web Title</td>
<td><input type="text" value="<?php echo esc_html($thepost->weblist_title);  ?>" name="title"></td>
</tr>						
<tr>
<td >Web Api Url</td>
<td><input type="text" value="<?php echo esc_html($thepost->weblist_apiurl); ?>" name="apiurl"></td>
</tr>					
</tr>
<tr>
<td >Consumer Key</td>
<td><input type="text" value="<?php echo esc_html($thepost->consumer_key); ?>" name="consumer_key"></td>
</tr>					
</tr>
<tr>
<td >Consumer Secret</td>
<td><input type="text" value="<?php echo esc_html($thepost->consumer_secret); ?>" name="consumer_secret"></td>
</tr>					

					</tr>



































	<tr>



						



<td colspan="2"><input type="submit" value="Add List" name="addlist"></td>



</tr>					











					</tr>











				</tbody>







				























			</table>







</form>



<br/><br/>

<table class="wp-list-table widefat fixed striped table-view-list movies" id="dataTable">







				<tbody>







		







<tr>



						<td >



		

<p>

<b>To Activated Plugin  </b>

<br/>

<br/>

Update or Add Web Title, Web Url, Consumer Key and Consumer Secret .

<br><br/>

For more help <a href="admin.php?page=mdw_help">CLick here</a>

</p>



</td>



</tr>					

</tbody>

</table>









<?php } ?>



































<?php































}



















function mdw_encrypt_decrypt($string, $action = 'encrypt')



{



    $encrypt_method = "AES-256-CBC";



    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key



    $secret_iv = '5fgf5HJ5g27'; // user define secret key



    $key = hash('sha256', $secret_key);



    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo



    if ($action == 'encrypt') {



        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);



        $output = base64_encode($output);



    } else if ($action == 'decrypt') {



        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);



    }



    return $output;



}







?>