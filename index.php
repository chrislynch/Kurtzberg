<?php include_once('_kurtzberg/kurtzberg.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>TechJunkie</title>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="author" content="Erwin Aligam - styleshout.com" />
<meta name="description" content="Site Description Here" />
<meta name="keywords" content="keywords, here" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />

<link rel="stylesheet" href="images/TechJunkie.css" type="text/css" />

</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

	<!--header -->
	<div id="header">			
				
		<h1 id="logo-text"><a href="index.php.html" title="">chris lynch</a></h1>		
		<p id="slogan">notes from a front line technologist</p>		
			
		<form id="quick-search" action="index.php.html" method="get" >
			<p>
			<label for="qsearch">Search:</label>
			<input class="tbox" id="qsearch" type="text" name="qsearch" value="Search..." title="Start typing and hit ENTER" />
			<input class="btn" alt="Search" type="image" name="searchsubmit" title="Search" src="images/search.gif" />
			</p>
		</form>	
			
	<!--header ends-->					
	</div>
		
	<!-- navigation starts-->	
	<div  id="nav">
		<ul>
			<li id="current"><a href="index.php.html">Home</a></li>
			<li><a href="style.html">Style Demo</a></li>
			<li><a href="index.php.html">Downloads</a></li>
			<li><a href="index.php.html">Services</a></li>
			<li><a href="index.php.html">Support</a></li>
			<li><a href="index.php.html">About</a></li>		
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap">
	
		<div id="main">
				
			<?php
                        foreach ($page['posts'] as $post){
                        ?>
                            <h2><a href="" title=""><?=$post->title;?></a></h2>
                            <p class="post-info">Posted by <a href="index.php.html">erwin</a> | Filed under <a href="index.php.html">templates</a>, <a href="index.php.html">internet</a>  </p>
				
                            <?php print $post->content;?>
				
                            <p class="post-footer">		
                                <a href="index.php.html" class="readmore">Read more</a> |
                                <a href="index.php.html" class="comments">Comments (7)</a> |				
                                <span class="date">May 20, 2007</span>	
                            </p>
                        <?
                        }
                        ?>
			
		<!-- main ends -->	
		</div>
				
		<div id="sidebar">
			
			<h3>Sidebar Menu</h3>
			<ul class="sidemenu">				
				<li><a href="index.php.html">Home</a></li>
				<li><a href="index.html#TemplateInfo">TemplateInfo</a></li>
				<li><a href="style.html">Style Demo</a></li>
				<li><a href="http://www.styleshout.com/">More Free Templates</a></li>
				<li><a href="http://www.dreamtemplate.com" title="Web Templates">Web Templates</a></li>
			</ul>	
				
			<h3>Links</h3>
			<ul class="sidemenu">
				<li><a href="http://www.freephotos.se/">FreePhotos.se</a></li>
				<li><a href="http://www.alistapart.com">Alistapart</a></li>					
				<li><a href="http://www.cssremix.com">CSS Remix</a></li>
				<li><a href="http://www.cssmania.com/">CSS Mania</a></li>				
			</ul>
			
			<h3>Sponsors</h3>
			<ul class="sidemenu">
                <li><a href="http://www.dreamtemplate.com" title="Website Templates">DreamTemplate <br />
                <span>Over 6,000+ Premium Web Templates</span></a>
                </li>
                <li><a href="http://www.themelayouts.com" title="WordPress Themes">ThemeLayouts <br />
                <span>Premium WordPress &amp; Joomla Themes</span></a>
                </li>
                <li><a href="http://www.imhosted.com" title="Website Hosting">ImHosted.com <br />
                <span>Affordable Web Hosting Provider</span>
                </a></li>
                <li><a href="http://www.dreamstock.com" title="Stock Photos">DreamStock <br />
                <span>Download Amazing Stock Photos</span></a>
                </li>
                <li><a href="http://www.evrsoft.com" title="Website Builder">Evrsoft <br />
                <span>Website Builder Software &amp; Tools</span></a>
                </li>
                <li><a href="http://www.webhostingwp.com" title="Web Hosting">Web Hosting <br />
                <span>Top 10 Hosting Reviews</span></a>
                </li>
			</ul>
			
			<h3>Search Box</h3>	
			<form class="searchform" action="index.php.html" method="get">
				<p>
				<input name="search_query" class="textbox" type="text" />
  				<input name="search" class="button" value="Search" type="submit" />
				</p>			
			</form>	
				
			<h3>Wise Words</h3>
			<p>&quot;When I have fully decided that a result 
			is worth getting I go ahead of it and 
			make trial after trial until it comes.&quot; </p>
					
			<p class="align-right">- Thomas A. Edison</p>
					
			<h3>Support Styleshout</h3>
			<p>If you are interested in supporting my work and would like to contribute, you are
			welcome to make a small donation through the 
			<a href="http://www.styleshout.com/">donate link</a> on my website - it will 
			be a great help and will surely be appreciated.</p>			
						
		<!-- sidebar ends -->		
		</div>		
		
	<!-- content-wrap ends-->	
	</div>
		
	<!-- footer starts -->		
	<div id="footer-wrap"><div id="footer-content">
	
		<div id="footer-columns">	
			<div class="col3">
				<h3>Tincidunt</h3>
				<ul>
					<li><a href="index.php.html">consequat molestie</a></li>
					<li><a href="index.php.html">sem justo</a></li>
					<li><a href="index.php.html">semper</a></li>
					<li><a href="index.php.html">magna sed purus</a></li>
					<li><a href="index.php.html">tincidunt</a></li>
				</ul>
			</div>

			<div class="col3-center">
				<h3>Sed purus</h3>
				<ul>
					<li><a href="index.php.html">consequat molestie</a></li>
					<li><a href="index.php.html">sem justo</a></li>
					<li><a href="index.php.html">semper</a></li>
					<li><a href="index.php.html">magna sed purus</a></li>
					<li><a href="index.php.html">tincidunt</a></li>
				</ul>
			</div>

			<div class="col3">
				<h3>Praesent</h3>
				<ul>
					<li><a href="index.php.html">consequat molestie</a></li>
					<li><a href="index.php.html">sem justo</a></li>
					<li><a href="index.php.html">semper</a></li>
					<li><a href="index.php.html">magna sed purus</a></li>
					<li><a href="index.php.html">tincidunt</a></li>					
				</ul>
			</div>
		<!-- footer-columns ends -->
		</div>	
	
		<div id="footer-bottom">
			<p>
			&copy; 2010 <strong>Your Company</strong> &nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.bluewebtemplates.com/" title="Website Templates">website templates</a> by <a href="http://www.styleshout.com/">styleshout</a> |
			Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | 
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
			
   		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<a href="index.php.html">Home</a>&nbsp;|&nbsp;
   		    <a href="index.php.html">Sitemap</a>&nbsp;|&nbsp;
	   	    <a href="index.php.html">RSS Feed</a>
   		    </p>
		</div>	

<!-- footer ends-->
</div></div>

<!-- wrap ends here -->
</div>

</body>
</html>