<?php

	// Variable to store the generated menu
	$generatedNav = "";

	// JSONs Array - This array will contain all the declared json files that will be decoded and parsed
	$jsonArray = array();

	// Error state variable
	$error = false;

	// Based on the error, its possible to control some of the page functions
	$errorNum = 0;

	// Variable to hold message if any.
	$errorMsg = "";


	if (gettype($_GET["nav"]) == "string") {

		$jsonFiles = $_GET["nav"];

		// Check to see if there are multiple files.
		if (strpos($jsonFiles, ',') !== false) { 

			// Split the items on the comma
			$files = explode(',', $jsonFiles);

			foreach ($files as $file) {
			
				$filename =  $file . ".json";

				// Check to see if this file exists!
				if (file_exists($filename)) {

					// Get file contents
					$jsonContents = file_Get_contents($filename);

					$jsonArrayTemp = json_decode($jsonContents,true);

					// We need to combind the json into one large json.
					$jsonArray = array_replace_recursive($jsonArray, $jsonArrayTemp);

				} else {

					// Error out here at some point.

				}

			}


		} else {

			// Create the full filename
			$filename =  $jsonFiles . ".json";

			// Check to see if this file exists!
			if (file_exists($filename)) {

				$jsonContents = file_Get_contents($filename);

				$jsonArray = json_decode($jsonContents,true);

			}

		}

		// Create the html menu output
		$generatedNav = createNav($jsonArray, 0); 


	} else {

		$error = true;

		// Standard error, used did no provide a file name in a parameter
		$errorNum = 1;

		// Error out. The user did not declare the nav parameter or the file to look for.
		$errorMsg = '<p class="ux-msg error">You must declare the navigation json file you want generated with the "nav" parameter.</p>';

	}


	// This function is used to create a nav
	function createNav($ary, $cLvl) {

		$newNav = "";

		// Check to see what the current navigation level is
		if ($cLvl == 0) {

			// Check to see if this is a multi-level navigation
			$appID = (is_multi($ary) ? 'id="app-nav"' : '');

			// Create the outer wrapper
			$newNav = "<nav class=\"container_16 ux-content\"" . $appID . ">\n";

			// Call the build list function that will create the individual task items
			$newNav .= buildList($ary, $cLvl);

			$newNav .= "</nav>\n";

		} else {

			// Check to see what the current level the navigation is on and make the correct class.
			if ($cLvl == 1) {

				$divClass = "outer-sub-nav";
				$navClass = "";

			} else {

				$divClass = "outer-sub-nav-2";
				$navClass = " group";

			}

			$tabs = $cLvl + 2;
			$tabIndent = "";

			for ($i = 0; $i < $tabs; $i++) {
				$tabIndent .= "\t";
			}

			$newNav = $tabIndent . "<div class=\"sub-nav " . $divClass . "\">\n" . $tabIndent . "\t<nav class=\"container_16 ux-content" . $navClass . "\">\n";

			if (!isAssoc($ary)) {

				foreach ($ary as &$column) {
					$newNav .= $tabIndent . "\t\t<div class=\"menu-column\">\n" . buildList($column, $cLvl, 4) . $tabIndent . "\t\t</div>\n";
				}

			} else {
				$newNav .= buildList($ary, $cLvl);
			}	

			$newNav .= $tabIndent . "\t</nav>\n" . $tabIndent . "</div>\n";

		}

		// Return the completed Nav
		return $newNav;

	}

	// This function us used to create unorder listes and any sub containers as needed.
	function buildList($ary, $cLvl, $tabLvl = 0) {

		// Determine the amount to indent
		$tabs = $cLvl + 1;
		$tabIndent = "";

		if (is_numeric($tabLvl)) {
			$tabs += $tabLvl;
		}

		for ($i = 0; $i < $tabs; $i++) {
			$tabIndent .= "\t";
		}


		// Create a new unordered list
		$list = $tabIndent . "<ul>\n";

		// Loop through the navigation items
		foreach ($ary as $key => $val) {

			// For each nav item creat a new list item
			$item = $tabIndent . "\t" . "<li>\n";

			// Determine the name of the link by checking for the "text" property of the current object.
			$itemName = (array_key_exists("text", $val) ? $val["text"] : $key);

			if (array_key_exists("header", $val)) {

				$item .= $tabIndent . "\t" . "\t" . '<strong ' . buildAttr($val, false) . '>' . $itemName . "</strong>\n";

			} else {

				// Create the anchor rage.
				$item .= $tabIndent . "\t" . "\t" . '<a ' . buildAttr($val, true) . '>' . $itemName . "</a>\n";

				// Check to see if a sub navigation needs to be created.
				if (array_key_exists("children", $val)) {
					$item .= createNav($val["children"], ($cLvl + 1));
				}

			}

			$item .= $tabIndent . "\t" . "</li>\n";

			// Add item to the list variable
			$list .= $item;

		}


		$list .= $tabIndent . "</ul>\n";

		// Retern the completed list
		return $list;

	}

	// This function is responsible for create attributes. It doesnt matter what the element is
	function buildAttr($ary, $link) {
		//print_r($ary);

		// Create attribute variable
		$attr = "";

		// Create a starting point and see if an href attribute is defined, if not add in a default href="#"
		if ($link) {
			$attr = (!array_key_exists("href", $ary) ? 'href="#"' : "");
		}

		// Loop through all of the attributes
		foreach ($ary as $key => $val) {

			// Ignore the "children and text properties as they mean something else"
			if ($key != "children" && $key != "text" && $key != "header" && !empty($val)) {

				$attr .= " " . $key . '="' . $val .'" ';

			}

		}

		// Trim any leading/ending white space
		$attr = trim($attr);

		return $attr;
	}

	// Utility function to check if the array is associative or indexed.
	function isAssoc($arr) {
		return array_keys($arr) !== range(0, count($arr) - 1);
	}

	// Utility function to check if array is multi-dementional.
	function is_multi($ary) {

		foreach ($ary as $key => $val) {

			// Check for the childrens property. If one is found return true as there is a sub nav.
			if (array_key_exists("children", $val)) {
				return true;
			}
		}

		// Nothing was found
		return false;

	}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>

		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<meta name="viewport" content="initial-scale=1, maximum-scale=1">

		<title>UX Global Nav Generator</title>
		<link rel="stylesheet" media="screen" href="http://labor.ny.gov/css/apps/v.0.4.8/css/ux-style.min.css">
		<link rel="stylesheet" media="print" href="http://labor.ny.gov/css/apps/v.0.4.8/css/ux-print.min.css">

		<!-- JS -->
		<script src="http://labor.ny.gov/css/apps/v.0.4.8/js/modernizr.min.js"></script>
		<script src="https://www.google.com/jsapi"></script>

	</head>

	<!--[if IE 7 ]>    <body class="ie7 "> <![endif]-->
	<!--[if IE 8 ]>    <body class="ie8 "> <![endif]-->
	<!--[if IE 9 ]>    <body class="ie9 "> <![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!--> 
	<body class="">
	<!--<![endif]-->

		<header class="group">

			<div id="ux-skip-nav">
				<a tabindex="1" id="skip-to-content" href="#content-anchor" class="ux-no-block">Skip to Content</a>	
				<a tabindex="2" id="skip-to-nav" href="#navigation-anchor" class="ux-no-block" >Skip to Navigation</a>
			</div>

			<div id="ux-notification-container">
				<div class="ux-content-wrapper">
					<div id="ux-action-required-notifications" class="ux-notice-outer">
						<div class="arn-tray ux-notice-inner">
						</div>
					</div>
					<div id="ux-generic-notifications">
					</div>
				</div>
			</div>

			<div id="gov-banner">
				<div class="container_16 ux-content">
					<div id="gov-links">
						<a href="http://www.ny.gov/" id="gov-link1" class="gov-img">
							<span class="ux-hide-508">New York State Home</span>
						</a>
						<a href="http://www.nysegov.com/citGuide.cfm?superCat=102&cat=449&content=main" id="gov-link2" class="gov-img">
							<span class="ux-hide-508">Stage Agencies List</span>
						</a>
					</div>
					<div>
						<a href="#" id="gov-link3" class="gov-img">
							<span class="ux-hide-508">Search all of New York State</span>
						</a>
						<form method="get" id="nys-search" action="http://search.cio.ny.gov/" target="_blank" class="ux-hide-js ux-search-form" autocomplete="off">
							<div>
								<label for="nys-search-box" class="ux-hide-508">Search all of New York State</label>
								<input type="text" id="nys-search-box" class="ux-search-input" placeholder="Search New York State" name="q" size="15" />
								<input type="submit" value="Search NY.GOV" class="ux-search-button" id="nys-search-button" />
							</div>
							<input type="hidden" name="sort" value="date:D:L:d1" />
							<input type="hidden" name="output" value="xml_no_dtd" />
							<input type="hidden" name="ie" value="UTF-8" />
							<input type="hidden" name="oe" value="UTF-8" />
							<input type="hidden" name="client" value="default_frontend" />
							<input type="hidden" name="proxystylesheet" value="default_frontend" />
							<input type="hidden" name="site" value="default_collection" />
						</form>
					</div>
				</div>
			</div>
			<div id="ux-site-header">
				<div class="container_16 ux-content">
					<a href="https://labor.ny.gov" id="ux-site-logo">
						<h1>
							<span class="ux-hide-508">New York State Department of Labor</span>
						</h1>
					</a>
					<span id="ux-site-title">
						UX Global Nav Generator
					</span>
					<span id="ux-gov-commish-name">
						Andrew M. Cuomo, Governor | Peter M. Rivera, Commissioner
					</span>
					<div id="ux-header-functions">
						<div id="ux-universal-menu">
							<nav>
								<ul>
									<li>
										<a href="#">A-Z Index</a>
									</li>
									<li>
										<a href="#" class="ux-popover">My Account</a>
										<div>
											<ul>
												<li><a href="#">Individual Account</a></li>
												<li><a href="#">Business Account</a></li>
											</ul>
										</div>
									</li>
									<li><a href="#">Translate</a></li>
									<li class="ux-mobile-only"><a href="#">Search DOL</a></li>
								</ul>
							</nav>
						</div>
						<form name="_ipsubmit" id="ux-site-search" method="get" action="http://search.cio.ny.gov/search" class="ux-search-form" >
							<div>
								<label for="site-search-box" class="ux-hide-508">Search DOL</label>
								<input type="text" id="site-search-box" class="ux-search-input" placeholder="Search Labor" name="q" size="15" />
								<input type="submit" value="Search NY.GOV" class="ux-search-button" id="site-search-button" />
							</div>
							<input type="hidden" name="entqr" value="0" />
							<input type="hidden" name="ud" value="1" />
							<input type="hidden" name="sort" value="date:D:L:d1" />
							<input type="hidden" name="output" value="xml_no_dtd" />
							<input type="hidden" name="oe" value="UTF-8" />
							<input type="hidden" name="ie" value="UTF-8" />
							<input type="hidden" name="client" value="labor_frontend" />
							<input type="hidden" name="proxystylesheet" value="labor_frontend" />
							<input type="hidden" name="site" value="labor_collection" />
						</form>
					</div>
				</div>
			</div>
			<div id="ux-domain-menu">
				<a name="navigation-anchor" id="navigation-anchor" tabindex="-1"></a>

				<?php
					if (!$error) {
						print($generatedNav);
					}
				?>
			</div>
		</header>
		<div id="ux-page" class="group">
			<div class="container_16 ux-content clearfix">

				<noscript>
					<div class="grid_16">
					<p class=" ux-msg warning margin-bottom-none">
						<strong>JavaScript is currently disabled in your web browser. </strong> 
							<br />For full functionality of this site, it is necessary to enable JavaScript. 
							Here are <a href="http://www.enable-javascript.com/" target="_blank">
 							instructions how to enable JavaScript</a>.
					<p>
					</div>	
				</noscript>

				<div id="ux-breadcrumbs" class="grid_16 clearfix">
					<ul>
						<li>
							<a href="#">Breadcrumb 1</a>
						</li>
						<li>
							Breadcrumb 2
						</li>
					</ul>
				</div>

				<div class="grid_4">
					<nav id="ux-side-nav">
						<ul>
							<li><a href="#">Local Navigation</a></li>
						</ul>
					</nav>
				</div>

				<div class="grid_12">
					<a name="content-anchor" id="content-anchor" tabindex="-1"></a>

					<!-- Page Content Starts Here -->

					<?php

						if (($error == "true" && $errorNum == 1) || ($error == 0 && $_GET["nav"] != "")) {

					?>

						<form method="GET" class="ux-form">

							<p>
								Please enter the name of the file found in the root of the project folder you wish to compile.
							</p>

							<label for="filename">
								<span>JSON Filename</span>
								<input id="filename" name="nav" value="<?php print($_GET["nav"]); ?>" />
							</label>

							<input type="submit" value="Generate" class="button primary no-icon" />

						</form>

					<?php
						} else {
							print($errorMsg);
						}   

						// Preform a string replace
						//$test = str_replace('><ul>',">\n<ul>", $generatedNav);
						//$test = str_replace('><li>',">\n<li>", $test);

						//nl2br($test);

						if ($_GET["nav"]) {
							?>

<textarea style="margin:35px 0 0 0;height:500px;" wrap="off">
<?php print($generatedNav); ?>
</textarea>

							<?php
						}

					?>


					<!-- Page Content Ends Here -->

					
				</div>
			</div>
		</div>
		<footer class="group">
			<div class="container_16 ux-content">
				<nav>
				</nav>
			</div>
		</footer>
		<script src="http://labor.ny.gov/css/apps/v.0.4.8/js/ux-script.min.js"></script>
	</body>