<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <base href="http://<?= @$k->domain() ?>">

        <link rel="icon" type="image/png" href="favicon.ico">

        <!-- Title and SEO information -->
        <title><?= @$k->__config->site->title ?></title>

        <meta name="keywords" content="<?= @$k->_seo->keywords ?>" />
        <meta name="description" content="<?= @$k->_seo->description ?>" />
        <meta name="abstract" content="<? @$k->_seo->abstract ?>" />

        <meta name="copyright" content="<?= @$k->__config->site->copyright ?>" />

        <!-- Dublin Core -->
        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" /> 
        <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" /> 
        <meta name="DC.title" content="<?= @$k->_seo->dc->title?>" /> 
        <meta name="DC.creator" content="<?= @$k->_seo->dc->creator?>" /> 
        <meta name="DC.subject" content="<?= @$k->_seo->dc->keywords?>" /> 
        <meta name="DC.description" content="<?= @$k->_seo->dc->description?>" /> 
        <meta name="DC.publisher" content="<?= @$k->_seo->dc->publisher?>" /> 
        <meta name="DC.contributor" content="<?= @$k->_seo->dc->contributor?>" /> 
        <meta name="DC.date" content="<?= @$k->_seo->dc->date?>" /> 
        <meta name="DC.type" scheme="DCTERMS.DCMIType" content="Text" /> 
        <meta name="DC.format" content="text/html" /> 
        <meta name="DC.format" content="<?= @$k->_seo->dc->format?>" /> 
        <meta name="DC.identifier" scheme="DCTERMS.URI" content="http://{@my.domain@}" /> 

        <!-- Geo Tagging -->
        <meta name="geo.region" content="GB-VGL" />
        <meta name="geo.placename" content="Taff\'s Well" />
        <meta name="geo.position" content="51.563899;-3.264585" />
        <meta name="ICBM" content="51.563899, -3.264585" />

        <!-- Google, Yahoo, and Bing tracking -->
        <meta name="google-site-verification" content="{@data.config.google.webmastertools.account@}" />
        <meta name="y_key" content="" />
        <meta name="msvalidate.01" content="20CE00102B0D5E01CD915F444BBD109C" />

        <!-- URL canonicalisation -->
        <link rel="canonical" href="{@data.seo.canonical@}" />

        <!-- ROBOTS directives -->
        <meta name="robots" content="index,follow" />

        <!-- XML Sitemap -->
        <link rel="sitemap" type="application/xml" title="Sitemap" href="/xml/sitemap" />

        <!-- Blueprint CSS http://www.blueprintcss.org -->
        <link rel="stylesheet" href="lib_public/blueprint/src/grid.css" type="text/css" media="screen, projection">		
        <!--[if lt IE 8]>
                <link rel="stylesheet" href="lib_public/blueprint/ie.css" type="text/css" media="screen, projection">
        <![endif]-->

        <!-- Template CSS -->
        <link rel="stylesheet" href="_templates/HTML/eCommerce/style.css" type="text/css" media="screen, projection">

        <!-- Site CSS -->
        <link rel="stylesheet" href="{@my.domaindir@}/style.css" type="text/css" media="screen, projection">

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '{@data.config.seo.google.analytics.account@}']);
            _gaq.push(['_setDomainName', '{@my.domain@}']);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

        <!-- JQuery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <!-- Colour Box -->
        <link rel="stylesheet" href="lib_public/colorbox/colorbox/colorbox.css" />
        <script src="lib_public/colorbox/colorbox/jquery.colorbox-min.js"></script>
    </head>
