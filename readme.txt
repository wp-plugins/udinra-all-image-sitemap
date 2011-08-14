=== Plugin Name ===
Contributors: Udinra
Tags: xml sitemaps, google sitemaps, image sitemap, seo, search engines, sitemap
Requires at least: 2.9.2
Tested up to: 3.2.1
Stable tag: 1.0

This plugin will help you generate Image Sitemaps (XML) for your WordPress blog from all images excluding the images from other

sources other than your website.

== Description ==

The plugin generates a XML Image Sitemap from the images used in your post excluding 

the images of advertising networks.It will create image sitemap from the images uploaded using Wordpress upload

or from the images used in the post or pages but not uploaded using Wordpress upload.The images should be on your server

thus the sitemap only contains your images.The sitemap contains all the important tags like

1.image location  (available in both versions downloadable from wordpress and Udinra)
2.image caption   (available only in free version downloadable from http://udinra.com/blog/udinra-image-sitemap)
3.image title     (available only in free version downloadable from http://udinra.com/blog/udinra-image-sitemap)

Thus increasing the chances of your image ranking high in search engine results.If you have not mentioned title

of the image while using in post or pages the plugin uses your alt text for title else title mentioned by you is used.

Udinra is using this plugin to generate image sitemap.Below is screenshot of the 

sitemap.

<?xml version="1.0" encoding="UTF-8"?>
<!-- Generated-by = Udinra Image Sitemap (http://udinra.com) -->
<!-- Generated-on="August 13, 2011, 3:55 pm" -->
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<url>
 <loc>http://udinra.com/blog/durga-puja-pandal-mg-road-gangtok-sikkim</loc>
 <image:image>
  <image:loc>http://udinra.com/image/Durga-puja-pandal-in-MG-Road-Gangtok-Sikkim-1.jpg</image:loc>
  <image:caption>Durga puja pandal in MG Road Gangtok Sikkim 1</image:caption>
  <image:title>Symbol of innovation and technology in indian puja pandal creation</image:title>
 </image:image>
 <image:image>
  <image:loc>http://udinra.com/image/Durga-puja-pandal-in-MG-Road-Gangtok-Sikkim-2.jpg</image:loc>
  <image:caption>Durga puja pandal in MG Road Gangtok Sikkim 2</image:caption>
  <image:title>Durga puja pandal in MG Road Gangtok Sikkim 1</image:title>
 </image:image>
</url>


For updates, you can follow the [author] at (http://udinra.com/blog/udinra-image-sitemap).All information about
the plugin will be updated on Wordpress as well as the link shared above.If you find any bugs then report it
either on wordpress or on the link shared above.

== Installation ==

Here's how you can install the plugin:

1. Upload the plugins folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Expand the Tools menu from WordPress dashboard sidebar and select "Udinra Image Sitemap."
4. Create a blank file sitemap-image.xml with permission 666 in root directory.
5. Click the "Generate Sitemap" button to create your XML Sitemap for Images.
6. Once you have created your Sitemap, you can submit it to Google using Webmaster Tools. 

== Frequently Asked Questions ==

= How can I submit my image sitemap to Google? =

Once you have created your Sitemap, you can submit it to Google using Webmaster Tools. 

= Where's the sitemap file stored? =

You can find the sitemap-image.xml file in your blog's root folder.

= My sitemap is not getting created =

Please create sitemap-image.xml in your Wordpress installation root directory and set the permissions to 666.

== Screenshots ==
<?xml version="1.0" encoding="UTF-8"?>
<!-- Generated-by = Udinra Image Sitemap (http://udinra.com) -->
<!-- Generated-on="August 13, 2011, 3:55 pm" -->
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<url>
 <loc>http://udinra.com/blog/durga-puja-pandal-mg-road-gangtok-sikkim</loc>
 <image:image>
  <image:loc>http://udinra.com/image/Durga-puja-pandal-in-MG-Road-Gangtok-Sikkim-1.jpg</image:loc>
  <image:caption>Durga puja pandal in MG Road Gangtok Sikkim 1</image:caption>
  <image:title>Symbol of innovation and technology in indian puja pandal creation</image:title>
 </image:image>
 <image:image>
  <image:loc>http://udinra.com/image/Durga-puja-pandal-in-MG-Road-Gangtok-Sikkim-2.jpg</image:loc>
  <image:caption>Durga puja pandal in MG Road Gangtok Sikkim 2</image:caption>
  <image:title>Durga puja pandal in MG Road Gangtok Sikkim 1</image:title>
 </image:image>
</url>
