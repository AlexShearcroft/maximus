<!doctype html>
<!--[if IE 8]>
<html class="ie8" dir="ltr" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9" dir="ltr" lang="en"><![endif]-->
<!--[if gt IE 9]><!-->
<html dir="ltr" lang="en"> <!--<![endif]-->
<html>
    <head>
        <title>@yield('title')</title>
		<meta name="description" content="@yield('meta_desc')">
        <meta name="viewport" content="width=device-width">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,400,700" rel="stylesheet" type="text/css">
        <script src="assets/scripts/utils/modernizr.min.js"></script>
		<link href="assets/styles/styles.css" rel='stylesheet' type="text/css">
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