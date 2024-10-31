<?php



function mdw_help() {



?>
<p>
<b>Update or Add Web List To Activated Plugin  </b>
<br/><br/>

Go to: Multi Data > View Website API 
<br/>
Update the Web Title,Web Url,Consumer Key and Consumer Secret .
</p>





<p>
<b>Generate API keys (Consumer Key and Consumer Secret)</b>
<br/><br/>
The WooCommerce REST API works on a key system to control access. These keys are linked to WordPress users on your website.
<br/>
Go to: WooCommerce > Settings > Advanced > REST API.
(Note: Keys/Apps was found at WooCommerce > Settings > API > Key/Apps prior to WooCommerce 3.4.)<br/>
Select Add Key. You are taken to the Key Details screen.
</p>

<img src="<?php echo plugin_dir_url(__FILE__) ?>images/restapi-addkey-2.png">

<p>
1.Add a Description.<br/>
2.Select the User you would like to generate a key for in the dropdown.<br/>
3.Select a level of access for this API key — Read access, Write access or Read/Write access.<br/>
4.Select Generate API Key, and WooCommerce creates API keys for that user.<br/>
Now that keys have been generated, you should see Consumer Key and Consumer Secret keys, a QRCode, and a Revoke API Key button.
</p>

<img src="<?php echo plugin_dir_url(__FILE__) ?>images/restapi-addkey-3.png">
<?php } ?>