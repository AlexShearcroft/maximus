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
		<meta property="og:site_name" content="@yield('company_name')" />
		<meta property="og:url" content="{{url()}}" />
		<meta property="og:image" content="{{url('/assets/images/')}}" />
		<meta property="og:locale" content="en_GB" />
		<?php /* Validation via: https://cards-dev.twitter.com/validator */ ?>
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="Your title here" />
		<meta name="twitter:description" content="Your 200-character description here" />
		<meta name="twitter:url" content="{{url()}}" />
		<meta name="twitter:image" content="{{url('/assets/images/')}}" />
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
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
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