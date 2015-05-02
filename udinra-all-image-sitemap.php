<?php
/*
Plugin Name: Udinra All Image Sitemap 
Plugin URI: http://udinra.com/blog/udinra-image-sitemap
Description: Automatically generates Google Image Sitemap and submits it to Google,Bing and Ask.com.
Author: Udinra
Version: 3.2
Author URI: http://udinra.com
*/

function UdinraAA_IMS() {
if(!isset($_POST['udinra_ping_google'])){
$_POST['udinra_ping_google'] = "";
}
if(!isset($_POST['udinra_ping_bing'])){
$_POST['udinra_ping_bing'] = "";
}
if(!isset($_POST['udinra_ping_ask'])){
$_POST['udinra_ping_ask'] = "";
}
if(!isset($_POST['udinra_gzip'])){
$_POST['udinra_gzip'] = "";
}
if(!isset($_POST['udinra_autogen'])){
$_POST['udinra_autogen'] = "";
}
if($_POST['udinra_img_site']){
update_option('udinra_ping_google',$_POST['udinra_ping_google']);
update_option('udinra_ping_bing',$_POST['udinra_ping_bing']);
update_option('udinra_ping_ask',$_POST['udinra_ping_ask']);
update_option('udinra_gzip',$_POST['udinra_gzip']);
update_option('udinra_autogen',$_POST['udinra_autogen']);
}
$wp_udinra_ping_google = get_option('udinra_ping_google');
$wp_udinra_ping_bing  = get_option('udinra_ping_bing');
$wp_udinra_ping_ask = get_option('udinra_ping_ask');
$wp_udinra_gzip = get_option('udinra_gzip');
$wp_udinra_autogen = get_option('udinra_autogen');
$udinra_sitemap_response = "";
if(isset($_POST['udinra_img_site'])){
$udinra_sitemap_response = udinra_image_sitemap_loop(); 
}
?>
<div class="wrap">
<h2>Udinra All Image Sitemap (Configuration)</h2>
<form method="post" id="UdinraAA_IMS">
<fieldset class="options">
<p><input type="checkbox" id="udinra_autogen" name="udinra_autogen" value="udinra_autogen" <?php if($wp_udinra_autogen == true) { echo('checked="checked"'); } ?> />Automatically generate Sitemap after a post is published</p>
<p><input type="checkbox" id="udinra_gzip" name="udinra_gzip" value="udinra_gzip" <?php if($wp_udinra_gzip == true) { echo('checked="checked"'); } ?> />Create gzip file sitemap-image.xml.gz</p>
<p><input type="checkbox" id="udinra_ping_google" name="udinra_ping_google" value="udinra_ping_google" <?php if($wp_udinra_ping_google == true) { echo('checked="checked"'); } ?> />Ping Google (Recommended)</p>
<p><input type="checkbox" id="udinra_ping_bing" name="udinra_ping_bing" value="udinra_ping_bing" <?php if($wp_udinra_ping_bing == true) { echo('checked="checked"'); } ?> />Ping Bing (Recommended)</p>
<p><input type="checkbox" id="udinra_ping_ask" name="udinra_ping_ask" value="udinra_ping_ask" <?php if($wp_udinra_ping_ask == true) { echo('checked="checked"'); } ?> />Ping Ask.com (Recommended)</p>
<p><em>If you have a minute, please <a href="http://wordpress.org/extend/plugins/udinra-all-image-sitemap/" target="_blank">rate this plugin</a> on WordPress.org... thanks!</em></p>
<p><input type="submit" name="udinra_img_site" value="Create Sitemap" /></p>
<p><?php echo "Status:"."<br><br>".$udinra_sitemap_response; ?></p>
</fieldset>
</form>
<a href="https://udinra.com/blog/udinra-image-sitemap"><u><h3>Buy Udinra Image Sitemap Pro</h3></u></a>
<ul><li>Supports WooCommerce plugin</li>
<li>Supports Easy Digital Downloads plugin</li>
<li>Generates ALT text</li>
<li>Index Sitemap functionality</li>
<li>Supports Large Website with limited resources</li>
<li>Increased Google Search Visibility</li></ul>

<table>
<tr><td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">  
 <input type="hidden" name="business" value="pitaji@udinra.com">  
 <input type="hidden" name="cmd" value="_donations">  
 <input type="hidden" name="item_name" value="udinra">  
 <input type="hidden" name="item_number" value="Udinra Image Sitemap plugin">  
 <input type="hidden" name="currency_code" value="USD">  
 <input type="image" name="submit" border="0" 
        src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif"  
        alt="PayPal - The safer, easier way to pay online">  
 <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" >  
</form>
</td><td>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=238475612916304";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="http://www.facebook.com/udinra" data-width="300" data-show-faces="false" data-stream="false" data-header="false"></div>
</td></tr></table>
</div>
<?php

}

function udinra_image_sitemap_loop() {

$wp_udinra_ping_google = get_option('udinra_ping_google');
$wp_udinra_ping_bing  = get_option('udinra_ping_bing');
$wp_udinra_ping_ask = get_option('udinra_ping_ask');
$wp_udinra_gzip = get_option('udinra_gzip');
$wp_udinra_autogen = get_option('udinra_autogen');
$udinra_img_pluginurl = plugin_dir_url( __FILE__ );

global $post;
$udinra_post_id = $post->post_id;

if($post != null) {
	if ($wp_udinra_autogen == true) {
		if(wp_attachment_is_image($udinra_post_id)) { }
		else {return false;}
	}
	else { return false;}
}

if ( preg_match( '/^https/', $udinra_img_pluginurl ) && !preg_match( '/^https/', get_bloginfo('url') ) )
	$udinra_img_pluginurl = preg_replace( '/^https/', 'http', $udinra_img_pluginurl );

define( 'UDINRA_IMG_FRONT_URL', $udinra_img_pluginurl );

global $wpdb;

$udinra_posts = $wpdb->get_results("SELECT post_title,post_excerpt,post_parent,guid	FROM $wpdb->posts
				 			WHERE post_type = 'attachment'
							AND post_mime_type like 'image%'
							AND post_parent > 0
							ORDER BY post_date desc");

if (empty ($udinra_posts)) {
	return false;

} else {
	$udinra_xml   = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	$udinra_xml  .= '<?xml-stylesheet type="text/xsl" href='.'"'. UDINRA_IMG_FRONT_URL . 'xml-image-sitemap.xsl'. '"'.'?>' . "\n";
	$udinra_xml  .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
	
	$udinra_cur_post_id= 0;
	$udinra_prev_post_id= 0;		
	$udinra_first_time = 0;


	foreach ($udinra_posts as $udinra_post) { 
		$udinra_cur_post_id= $udinra_post->post_parent;
		if(get_post_status($udinra_cur_post_id) == 'publish') {
		if($udinra_cur_post_id != 0) {
			if($udinra_cur_post_id != $udinra_prev_post_id) {
				$udinra_post_url = get_permalink($udinra_cur_post_id);
				if($udinra_first_time == 1) {
					$udinra_xml .= "\t"."</url>"."\n"; 
					$udinra_first_time = 0;
				}
				$udinra_xml .= "\t"."<url>"."\n";
				$udinra_xml .= "\t\t"."<loc>".htmlspecialchars($udinra_post_url)."</loc>"."\n";
				$udinra_xml .= "\t\t"."<image:image>"."\n";
				$udinra_xml .= "\t\t\t"."<image:loc>".htmlspecialchars($udinra_post->guid)."</image:loc>"."\n";
				$udinra_xml .= "\t\t\t"."<image:caption>".htmlspecialchars($udinra_post->post_excerpt)."</image:caption>"."\n";
				$udinra_xml .= "\t\t\t"."<image:title>".htmlspecialchars($udinra_post->post_title)."</image:title>"."\n";
				$udinra_xml .= "\t\t"."</image:image>"."\n";
				$udinra_first_time = 1;
				$udinra_prev_post_id = $udinra_cur_post_id;
			}
			else {
				$udinra_xml .= "\t\t"."<image:image>"."\n";
				$udinra_xml .= "\t\t\t"."<image:loc>".htmlspecialchars($udinra_post->guid)."</image:loc>"."\n";
				$udinra_xml .= "\t\t\t"."<image:caption>".htmlspecialchars($udinra_post->post_excerpt)."</image:caption>"."\n";
				$udinra_xml .= "\t\t\t"."<image:title>".htmlspecialchars($udinra_post->post_title)."</image:title>"."\n";
				$udinra_xml .= "\t\t"."</image:image>"."\n";
			}
		} 
	  }
	}
	$udinra_xml .= "\t"."</url>"."\n";
	$udinra_xml .= "</urlset>";

	$udinra_image_sitemap_url = ABSPATH . '/sitemap-image.xml';
	if (UdinraWritable(ABSPATH) || UdinraWritable($udinra_image_sitemap_url)) {
	if (file_put_contents ($udinra_image_sitemap_url, $udinra_xml)) {
		$udinra_tempurl = get_bloginfo('url'). '/sitemap-image.xml';
		$udinra_sitemap_response = "Sitemap created successfully"."<br>";
		}
	}

	if ($wp_udinra_gzip == true) {
		$udinra_image_sitemap_url = ABSPATH . '/sitemap-image.xml.gz';
		if (UdinraWritable(ABSPATH) || UdinraWritable($udinra_image_sitemap_url)) {
		$udinra_gz = gzopen($udinra_image_sitemap_url,'w9');
		gzwrite($udinra_gz, $udinra_xml);
		gzclose($udinra_gz);
		$udinra_tempurl = get_bloginfo('url'). '/sitemap-image.xml.gz';
		$udinra_sitemap_response = "Sitemap created successfully"."<br>";
		}
	}
			
	if ($wp_udinra_ping_google == true) {
		$udinra_ping_url ='';
		$udinra_ping_url = "http://www.google.com/webmasters/tools/ping?sitemap=" . urlencode($udinra_tempurl);
		$udinra_response = wp_remote_get( $udinra_ping_url );
		if (is_wp_error($udinra_response)) {
		}
		else {
		if($udinra_response['response']['code']==200)
			{ $udinra_sitemap_response .= "Pinged Google Successfully"."<br>"; }
			else { $udinra_sitemap_response .= "Failed to ping Google.Please submit your image sitemap(sitemap-image.xml) at Google Webmaster."."<br>";}}}
	if ($wp_udinra_ping_bing == true) {
		$udinra_ping_url ='';
		$udinra_ping_url = "http://www.bing.com/webmaster/ping.aspx?sitemap=" . urlencode($udinra_tempurl);
		$udinra_response = wp_remote_get( $udinra_ping_url );
		if (is_wp_error($udinra_response)) {
		}
		else {
		if($udinra_response['response']['code']==200)
			{ $udinra_sitemap_response .= "Pinged Bing Successfully"."<br>"; }
			else { $udinra_sitemap_response .= "Failed to ping Bing.Please submit your image sitemap(sitemap-image.xml) at Bing Webmaster."."<br>";}}}
	if ($wp_udinra_ping_ask == true) {
		$udinra_ping_url ='';
		$udinra_ping_url = "http://submissions.ask.com/ping?sitemap=" . urlencode($udinra_tempurl);
		$udinra_response = wp_remote_get( $udinra_ping_url );
		if (is_wp_error($udinra_response)) {
		}
		else {
		if($udinra_response['response']['code']==200)
			{ $udinra_sitemap_response .= "Pinged Ask.com Successfully"."<br>"; }
			else { $udinra_sitemap_response .= "Failed to ping Ask.com."."<br>"; }}}
		}
		$udinra_tempurl = get_bloginfo('url'). '/sitemap-image.xml';
		$udinra_sitemap_response .= '<a href='.$udinra_tempurl.' target="_blank" title="Image Sitemap URL">View Image Sitemap</a>'; 
return $udinra_sitemap_response;
}

function udinra_image_sitemap_admin() {
	if (function_exists('add_options_page')) {
	add_options_page('Udinra Image Sitemap', 'Udinra Image Sitemap', 'manage_options', basename(__FILE__), 'UdinraAA_IMS');
	}
}

function UdinraWritable($udinra_filename) {
	if(!is_writable($udinra_filename)) {
		$udinra_sitemap_response = "The file sitemap-image.xml is not writable please check permission of the file for more details visit http://udinra.com/blog/udinra-image-sitemap";
		return false;
	}
	return true;
}

add_action ('publish_post','udinra_image_sitemap_loop');
add_action ('publish_page','udinra_image_sitemap_loop');
add_action('admin_menu','udinra_image_sitemap_admin');

?>
