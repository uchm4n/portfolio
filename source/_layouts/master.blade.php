<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

    <meta property="og:site_name" content="{{ $page->siteName }}"/>
    <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:type" content="website"/>

    <meta name="twitter:image:alt" content="{{ $page->siteName }}">
    <meta name="twitter:card" content="summary_large_image">

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <meta name="generator" content="tighten_jigsaw_doc">
    @endif

    <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">
    <link rel="icon" href="{{ $page->baseUrl }}/favicon.ico">

    @stack('meta')

    @if ($page->production)
        <!-- Insert analytics code here -->
    @endif

    <link href='https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i' rel="stylesheet">
    <link rel="stylesheet" href="{{ $page->baseUrl }}/assets/build/css/main.css">

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css"/>
    @endif
</head>

<body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
<header class="flex items-center shadow bg-white border-b h-24 mb-8 py-4" role="banner">
    <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
        <div class="flex items-center">
            <a href="{{$page->baseUrl ?? '/'}}" title="{{ $page->siteName }} home" class="inline-flex items-center">
                <img class="h-8 md:h-10 mr-3" src="{{ $page->baseUrl }}/assets/img/icon-terminal.svg" alt="{{ $page->siteName }} logo"/>
            </a>
        </div>

        <div class="flex flex-1 justify-end items-center text-right md:pl-10">
            @if ($page->docsearchApiKey && $page->docsearchIndexName)
                @include('_nav.search-input')
            @endif
        </div>
    </div>

    @yield('nav-toggle')
</header>

<main role="main" class="w-full flex-auto">
    @yield('body')
</main>

<script src="{{ $page->baseUrl }}/assets/build/js/main.js"></script>

@stack('scripts')


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $page->google_analytics_id }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ $page->google_analytics_id }}');
</script>

<footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
    <ul class="flex flex-col md:flex-row justify-center">
        <li class="md:mr-2"></li>
    </ul>
</footer>
</body>
</html>
