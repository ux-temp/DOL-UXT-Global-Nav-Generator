<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>

		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<meta name="viewport" content="initial-scale=1, maximum-scale=1">

		<title>Generic Non Responsive Template</title>
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
						User Experience (UX) Template v.0.4.8
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

				<!-- Output -->

<nav class="container_16 ux-content" id="app-nav"><ul><li><a href="http://labor.ny.gov">Home</a></li><li><a href="http://labor.ny.gov/main/individuals.asp">Individuals</a><div class="sub-nav outer-sub-nav"><nav class="container_16 ux-content"><ul><li><a href="#">Job Seekers</a><div class="sub-nav outer-sub-nav-2"><nav class="container_16 ux-content group"><div class="menu-column"><ul><li><strong>Job Seekers</strong></li><li><a href="/careerservices/findajob/jobfairrecruitmentsindex.shtm">Career Fairs and Recruitments</a></li><li><a href="/careerservices/CareerServicesIndex.shtm">Find a Job</a></li><li><a href="/workforcenypartners/osview.asp">One-Stop Career Centers</a></li><li><strong>Apprenticeship</strong></li><li><a href="/apprenticeship/general/registration.shtm">Overveiw</a></li><li><a href="/apprenticeship/general/occupations.shtm">Active Trades</a></li><li><a href="/pressreleases/apprenticeshiparchive.shtm">Current Recruitments</a></li></ul></div><div class="menu-column"><ul><li><strong>Career Development</strong></li><li><a href="/careerservices/planyourcareer/planningyourcareerindex.shtm">Overveiw</a></li><li><a href="http://careerzone.ny.gov/">CareerZone</a></li><li><a href="http://jobzone.ny.gov/">JobZone</a></li><li><a href="/stats/lstrain.shtm">Occupational Licenses and Certifications</a></li><li><a href="/careerservices/findajob/res_fun.shtm">Resumes</a></li><li><a href="/careerservices/planyourcareer/training.shtm">Training</a></li></ul></div><div class="menu-column"><ul><li><strong>Youth</strong></li><li><a href="/youth">Information Portal</a></li><li><a href="/workerprotection/laborstandards/workprot/minors.shtm">Child Labor Law</a></li><li><a href="/workerprotection/laborstandards/secure/child_index.shtm">Child Performer</a></li><li><a href="/workerprotection/laborstandards/workprot/wphmpg.shtm">Working Papers</a></li></ul></div></nav></div></li><li><a href="#">Unemployment</a></li><li><a href="#">Workers</a></li><li><a href="/vets/vetintropage.shtm">Veterans' Services</a></li></ul></nav></div></li><li><a href="http://labor.ny.gov">Businesses</a></li><li><a href="http://labor.ny.gov">Government &amp; Research</a></li><li><a href="http://labor.ny.gov">Other Information</a></li></ul></nav>

				<!-- Output -->

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
					<h2>Page Title</h2>

					<!-- Page Content Starts Here -->

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
</html>