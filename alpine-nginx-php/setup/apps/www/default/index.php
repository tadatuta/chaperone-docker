<!DOCTYPE html>
<?php
   $appsdir = getenv("APPS_DIR");
   $vardir = getenv("VAR_DIR");
   $appsdirtt = "<tt>" . $appsdir . "</tt>";
   $pagename = getenv("HTTPD_SERVER_NAME") . "+php container";

function highlight($instr, $words) {
   return preg_replace("/.+(".$words.")/", "<span class='ls-high'>$0</span>", $instr);
}
   ?>
<html>
  <head>
    <title><?php echo $pagename; ?> - Home</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href='//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css' />

  </head>
  <body class="landing-page  wsite-theme-light  wsite-page-index"><div class="top-background">
      <div id="header-wrap">
	<div class="container">
	  <td class="search"></td>
	</div><!-- end container -->
      </div><!-- end header-wrap -->
      
      <div id="nav-wrap">
	<div class="container header-align-outer">
	  <div class="header-align-mid">
	    <div class="header-align-inner">
	      <div class="built-with">
		  <img style="height:25px;vertical-align:middle" src="images/chaplogo-150627.svg"/>&nbsp;<span style="vertical-align:middle">Built with Chaperone + Docker</span>
	      </div>
	      <div id="logo"><span class="wsite-logo">
		  <a href="">
		    <span id="wsite-title"><?php echo $pagename; ?></span>
		  </a>
		</span>
		<div class="nav-spacer"></div>
		<div class="nav-container">
		  <ul class="wsite-menu-default">
		    <li id="active" class="wsite-menu-item-wrap">
		      <a href="index.php" class="wsite-menu-item">
			Default Site Home
		      </a>
		    </li>
		    <li class="wsite-menu-item-wrap">
		      <a href="about.php" class="wsite-menu-item">
			About Chaperone
		      </a>
		    </li>
		    <li class="wsite-menu-item-wrap">
		      <a href="resources.php" class="wsite-menu-item">
			Resources
		      </a>
		    </li>
		  </ul>
		</div>
	      </div><!-- end header align inner -->
	    </div><!-- end header align mid -->
	  </div><!-- end container -->	
	</div><!-- end top background -->

	<div id="banner-wrap" class="wsite-background">
	  <div class="container">
	    <div id="banner">
	      
	      <div id="banner-insert">
		<iframe src="process_list.php" width="400" height="250"></iframe>
	      </div><!-- end banner-left -->
	      
	      <div id="bannerright" class="landing-banner-outer">
		<div class="landing-banner-mid">
		  <div class="landing-banner-inner">
		    <h2><span class="wsite-text wsite-headline">
			System Configuration at a Glance
		    </span></h2>
		    <p><span class="wsite-text wsite-headline-paragraph">
			The running process tree is at the right. &nbsp;Click to get a <tt>phpinfo()</tt>
			page so you can see the full configuration.
		    </span></p>
		    <div style="text-align:left;"><div style="height: 0px; overflow: hidden;"></div>
		      <a class="wsite-button wsite-button-large wsite-button-highlight" href="phpinfo.php" >
			<span class="wsite-button-inner">phpinfo()</span>
		      </a>
		      <div style="height: 0px; overflow: hidden;"></div></div>
		  </div><!-- end banner inner -->
		</div><!-- end banner mid -->
	      </div><!-- end banner-right -->
	      
	      <div style="clear:both;"></div>
	      
	    </div><!-- end banner -->
	  </div><!-- end container -->
	</div><!-- end banner-wrap -->
	
	<div id="main-wrap">
	  <div class="container">
	    <div id='wsite-content' class='wsite-elements wsite-not-footer'>
	      <h2 class="wsite-content-title" style="text-align:left;">Start Customizing ...</h2>

	      <div class="paragraph" style="text-align:left;">
		This page is running in 
		a container that "wraps" your development directory at <?php echo $appsdirtt; ?>.
	      </div>
	      <div class="paragraph" style="text-align:left;">
		During development, you can just work directly on your Docker host while the container
		provides the infrastructure.. &nbsp;Later, you can bundle it all in a production container which
		is either fully self-contained or designed to to be ephemeral and work with other persistent
		containers or services.<br />
	      </div>
	      <div class="paragraph" style="text-align:left;">
		Take a look for a moment at <?php echo $appsdirtt; ?>:<br />
	      </div>
	      <pre class="premain">$ cd <?php echo $appsdir; ?><br/><?php 
		    echo highlight(shell_exec("cd " . $appsdir . "; ls -l"),
			 'etc|chaperone.d|startup.d|var|www|build.sh'); ?></pre>
	      <br/>
	      A few things to know:<br />

	      <div class="paragraph" style="text-align:left;">
		<div class="dirlist">
		  <div class="dirlist-name">www</div>
		  <div class="dirlist-item">
		    The website files for this page are located in the <tt>www/default</tt> directory.
		    Modify for your own purposes.  Per-site webserver
		    configuration is located in <tt>www/sites.d</tt>.   Note that
		    the entire configuration is located here so you don't have to
		    modify the container.  Just execute the <tt>run.sh</tt> script to start-up
		    your development shell, and exit the shell to shut it down.
		  </div>
		</div>
	      </div>

	      <div class="paragraph" style="text-align:left;">
		<div class="dirlist">
		  <div class="dirlist-name">chaperone.d</div>
		  <div class="dirlist-item">
		    This is where all of Chaperone's configuration files are stored.  Total
		    control of start-up is here in just few files.  You can find details about
		    Chaperone's configuration directives 
		    <a href="http://garywiz.github.io/chaperone/ref/config.html">
		    in the documentation</a>.
		  </div>
		</div>
	      </div>

	      <div class="paragraph" style="text-align:left;">
		<div class="dirlist">
		  <div class="dirlist-name">startup.d</div>
		  <div class="dirlist-item">
		    Executable scripts in this directory are run sequentially when your
		    container starts.  They take care of preparing the container as
		    well as the "apps" directory by assuring permissions are correct
		    and copying files if needed. 
		  </div>
		</div>
	      </div>

	      <div class="paragraph" style="text-align:left;">
		<div class="dirlist">
		  <div class="dirlist-name">build.sh</div>
		  <div class="dirlist-item">
		    This script will build a derivative of the current environment
		    and package it inside a new Docker image.  You can then use the new image
		    as the basis for further development.  It also packages the
		    contents <?php echo $appsdirtt; ?> and moves it to <tt>/apps</tt>
		    inside the container so that the container can operate as
		    a self-contained production image.
		  </div>
		</div>
	      </div>

	      <div class="paragraph" style="text-align:left;">
		<div class="dirlist">
		  <div class="dirlist-name">var</div>
		  <div class="dirlist-item">
		    Log files, database files, and other data files relevant to execution
		    are stored in <tt>var</tt>.   The <tt>build.sh</tt> script is one way
		    you can create a new
		    production image from <?php echo $appsdirtt; ?> but <i>will omit this
		      directory</i> assuming that this is only valid during development.
		    You will probably want to tailor the <tt>build.sh</tt> script and
		    <tt>Dockerfile</tt> in the <tt>build</tt> directory to assure
		    your production image does what you want.
		  </div>
		</div>
	      </div>

	      <div class="paragraph" style="text-align:left;">
		<div class="dirlist">
		  <div class="dirlist-name">etc</div>
		  <div class="dirlist-item">
		    This is where configuration files go for things like webservers,
		    databases and other services which Chaperone starts.  It's similar to the normal
		    <tt>/etc</tt> directory, but  simpler and flatter.
		    It contains only configuration files that are relevant to the
		    operation of the container.  Having these files here makes it
		    easy for you to reconfigure the system without touching the 
		    container.  Then, when you're ready for a production image, you can
		    move these files into the production container (the <tt>build.sh</tt>
		    script will do this for you if you want).
		  </div>
		</div>
	      </div>

	    </div>

	  </div><!-- end container -->
	</div><!-- end main-wrap -->

	<div id="footer-wrap">
	  <div class="container">
	    See the <a href="resources.php">Resources</a> page for more information.
	  </div><!-- end container -->
	</div><!-- end footer-wrap -->

      </div>
    </div>      
  </body>
</html>
