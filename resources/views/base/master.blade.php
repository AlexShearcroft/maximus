@section('company_name', 'Maximus')
@section('email', env('MAIL_USERNAME'))
<!doctype html>
<!--[if IE 8]>
<html class="ie8" dir="ltr" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9" dir="ltr" lang="en"><![endif]-->
<!--[if gt IE 9]><!-->
<html dir="ltr" lang="en"> <!--<![endif]-->
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="false" />
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<title>@yield('title')</title>
		<meta name="description" content="@yield('meta_desc')">
		<meta name="author" content="@yield('company_name')" />
		<meta name="copyright" content="@yield('company_name')" />
		<meta name="publisher" content="@yield('company_name')" />
		<meta name="robots" content="Index, Follow" />
		<meta name="revisit-after" content="5" />
		<meta name="content-language" content="en-gb" />
		<link rel="shortcut icon" href="{{url('/assets/icons')}}/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{url('/assets/icons')}}/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="{{url('/assets/icons')}}/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="{{url('/assets/icons')}}/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/icons')}}/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="{{url('/assets/icons')}}/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="{{url('/assets/icons')}}/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="{{url('/assets/icons')}}/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="{{url('/assets/icons')}}/apple-touch-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="{{url('/assets/icons')}}/apple-touch-icon-180x180.png" />
		<meta property="og:site_name" content="@yield('company_name')" />
		<meta property="og:url" content="{{url()}}" />
		<meta property="og:image" content="{{url('/assets/images')}}/" />
		<meta property="og:locale" content="en_GB" />
		<?php /* Validation via: https://cards-dev.twitter.com/validator */ ?>
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="Your title here" />
		<meta name="twitter:description" content="Your 200-character description here" />
		<meta name="twitter:url" content="{{url()}}" />
		<meta name="twitter:image" content="{{url('/assets/images')}}/" />
		<script type="application/ld+json">
			{
				"@context" : "http://schema.org",
				"@type" : "Organization",
				"name" : "@yield('company_name')",
				"legalName" : "@yield('company_name')",
				"alternateName" : "@yield('company_name')",
				"taxID" : "",
				"url" : "{{url()}}",
				"logo": "{{url('/assets/images/')}}",
				"address" : "",
				"location" : "",
				"email" : "@yield('email')",
				"sameAs" : [
					"",
					""
				],
				"foundingLocation" : ""
			}
		</script>
		<meta name="viewport" content="width=device-width">
		<link href="https://fonts.googleapis.com/css?family=Lato:100,400,700" rel="stylesheet" type="text/css">
		<script src="{{url('/assets/scripts/')}}/utils/modernizr.min.js"></script>
		<link href="{{url('/assets/styles/')}}/styles.css" rel='stylesheet' type="text/css">
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', '', 'auto');
			ga('send', 'pageview');
		</script>
		<style>
			html,
			body {
				background: papayawhip;
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				background: url("../assets/images/logo.png") center center no-repeat;
				display: block;
				overflow: hidden;
				text-indent: 100%;
				white-space: nowrap;
				height: 64px;
				width: 100%;
				/*font-size: 96px;*/
				margin-bottom: 10px;
			}

			.quote {
				color: #1A1A1A;
				font-size: 24px;
			}
		</style>
    </head>
    <body>
        <div class="container">
			@yield('content')
		</div>
		<script data-main="assets/scripts/app/{{$page_script or 'main'}}" src="assets/scripts/require.min.js"></script>
    </body>
</html>