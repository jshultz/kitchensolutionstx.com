<?php
/* ------------------------------------------
    XML News Sitemap Feed Styleheet Template
   ------------------------------------------ */

header('Content-Type: text/xsl; charset=utf-8', true);

echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<xsl:stylesheet version="2.0" 
	xmlns:html="http://www.w3.org/TR/REC-html40" 
	xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9" 
		xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" 
		xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Google News Sitemap Feed</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">body{font-family:"Lucida Grande","Lucida Sans Unicode",Tahoma,Verdana,sans-serif;font-size:13px}#header,#footer{padding:2px;margin:10px;font-size:8pt;color:gray}a{color:black}td{font-size:11px}th{text-align:left;padding-right:30px;font-size:11px}tr.high{background-color:whitesmoke}#footer img{vertical-align:bottom}</style>
</head>
<body>
	<h1>Google News Sitemap Feed</h1>
	<div id="header">
		<p>This is a Google News Sitemap to aid <a href="http://news.google.com">Google News</a> finding news on your website. Please note that <strong><em>only posts from the last 48 hours</em></strong> will be processed by Google News. Read more about <a href="http://www.google.com/schemas/sitemap-news/0.9/">Google News Sitemaps</a>, submit your site via <a href="http://www.google.com/support/news_pub/bin/request.py?contact_type=suggest_content">Google propose news content</a> and add it in your <a href="https://www.google.com/webmasters/tools/">Google Webmaster Tools</a> account.</p>
	</div>
	<div id="content">
		<table cellpadding="5">
			<tr class="high">
				<th>#</th>
				<th>Title</th>
				<th>Language</th>
				<th>Genre(s)</th>
				<th>Keyword(s)</th>
				<th># Images</th>
				<th>Location</th>
				<th>Publication Date</th>
			</tr>
<xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
<xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
<xsl:for-each select="sitemap:urlset/sitemap:url">
			<tr><xsl:if test="position() mod 2 != 1"><xsl:attribute  name="class">high</xsl:attribute></xsl:if>
				<td><xsl:value-of select="position()"/></td>
				<td><xsl:variable name="itemURL"><xsl:value-of select="sitemap:loc"/></xsl:variable>
					<a href="{$itemURL}"><xsl:value-of select="news:news/news:title"/></a>
				</td>
				<td><xsl:value-of select="news:news/news:publication/news:language"/></td>
				<td><xsl:value-of select="news:news/news:genres"/></td>
				<td><xsl:value-of select="news:news/news:keywords"/></td>
				<td><xsl:value-of select="count(image:image)"/></td>
				<td><xsl:value-of select="news:news/news:geo_locations"/></td>
				<td><xsl:value-of select="concat(substring(news:news/news:publication_date,0,11),concat(' ', substring(news:news/news:publication_date,12,5)))"/></td>
			</tr>
</xsl:for-each>
		</table>
	</div>
	<div id="footer">
		<p><img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))); ?>/images/sitemapxml.gif" alt="XML Sitemap" title="XML Sitemap" /> generated by <a href="http://status301.net/wordpress-plugins/xml-sitemap-feed/" title="XML Sitemap Feed plugin for WordPress">XML &amp; Google News Sitemap Feed <?php echo (preg_match( '`^\d{1,2}\.\d{1,2}(\.\d{1,2})?$`' , $_GET['ver'] )) ? $_GET['ver'] : ''; ?></a> running on <a href="http://wordpress.org/">WordPress</a>.</p>
	</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
