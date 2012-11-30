<?php
/*
Plugin Name: Udinra All Image Sitemap 
Plugin URI: http://udinra.com/blog/udinra-image-sitemap
Description: Automatically generates Google Image Sitemap and submits it to Google,Bing and Ask.com.
Author: Udinra
Version: 2.7
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
<p>You can report all bugs,feature requests and other queries related to this version of plugin at 
<a href="http://udinra.com/blog/udinra-all-image-sitemap-version-2-4-support-forum">Support Forum</a></p>
<table><tr>
<td>
<!-- Place this tag where you want the badge to render. -->
<div class="g-plus" data-height="69" data-href="//plus.google.com/116123732887797372587?rel=author"></div>

<!-- Place this tag after the last badge tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</td><td><table><tr><td>
<a href="https://twitter.com/Udinra" class="twitter-follow-button" data-show-count="false">Follow @Udinra</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</td></tr>
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
</td></tr></table></td>
</tr></table>
<table width="100%"><tr>
<td width="50%">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=238475612916304";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="http://www.facebook.com/udinra" data-width="292" data-show-faces="true" data-stream="false" data-header="true"></div>
</td>
</tr></table>
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
			else { $udinra_sitemap_response .= "Failed to ping Google.Please submit your image sitemap(sitemap-image.xml) at Google Webmaster.";}}}
	if ($wp_udinra_ping_bing == true) {
		$udinra_ping_url ='';
		$udinra_ping_url = "http://www.bing.com/webmaster/ping.aspx?sitemap=" . urlencode($udinra_tempurl);
		$udinra_response = wp_remote_get( $udinra_ping_url );
		if (is_wp_error($udinra_response)) {
		}
		else {
		if($udinra_response['response']['code']==200)
			{ $udinra_sitemap_response .= "Pinged Bing Successfully"."<br>"; }
			else { $udinra_sitemap_response .= "Failed to ping Bing.Please submit your image sitemap(sitemap-image.xml) at Bing Webmaster.";}}}
	if ($wp_udinra_ping_ask == true) {
		$udinra_ping_url ='';
		$udinra_ping_url = "http://submissions.ask.com/ping?sitemap=" . urlencode($udinra_tempurl);
		$udinra_response = wp_remote_get( $udinra_ping_url );
		if (is_wp_error($udinra_response)) {
		}
		else {
		if($udinra_response['response']['code']==200)
			{ $udinra_sitemap_response .= "Pinged Ask.com Successfully"."<br>"; }
			else { $udinra_sitemap_response .= "Failed to ping Ask.com."; }}}
		}

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
