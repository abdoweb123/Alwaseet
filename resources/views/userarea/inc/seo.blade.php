<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
<meta name="author" content="Kayak Time - for Boat Rental">
<meta name="image" content="{{ asset('userarea/img/logo.svg')}}">
<meta property="og:title" content="{{ setting('title') }}">
<meta property="og:description" content="{{ strip_tags(setting('desc')) }}">
<meta property="og:locale" content="en">
<meta property="og:image" content="{{ asset('userarea/img/logo.svg')}}">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:site_name" content="{{ setting('title') }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="{{ setting('title') }}">
<meta name="twitter:title" content="{{ setting('title') }}">
<meta name="twitter:description" content="{{ strip_tags(setting('desc')) }}">
<meta name="twitter:site" content="{{ setting('title') }}">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">

<link rel="canonical" href="{{ url()->full() }}">
<link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
<link href="{{ asset('userarea/images/logo.png')}}" rel="shortcut icon">

{!! setting('snapchat_services') !!}
{!! setting('twitter_services') !!}
{!! setting('facebbok_services') !!}
{!! setting('google_services') !!}
{!! setting('tiktok_services') !!}
{!! setting('instagram_services') !!}
