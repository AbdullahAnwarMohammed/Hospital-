<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{asset('dashboard/assets')}}/img/fav.png" />

		<!-- Title -->
		<title>@yield('title')</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		@notifyCss

		<link rel="stylesheet" href="{{asset('dashboard/assets')}}/css/bootstrap.min.css">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{asset('dashboard/assets')}}/fonts/style.css">
		
		<!-- Main css -->
		@if (App::getLocale() == 'ar')
		<link rel="stylesheet" href="{{asset('dashboard/assets')}}/css/rtl.css">
		@else 
		<link rel="stylesheet" href="{{asset('dashboard/assets')}}/css/ltr.css">
		@endif


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- DateRange css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
		<link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendor/daterange/daterange.css" />
        @yield('css')

		
	</head>

	<body>


		<!-- Loading starts -->
		{{-- <div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div> --}}
		<!-- Loading ends -->


