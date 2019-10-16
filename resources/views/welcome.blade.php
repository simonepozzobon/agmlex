<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AgmLex</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app">
            <main-template
                ref="MainTemplate"
                skills="{{ $skills }}"
                professionals-json="{{ $professionals }}"
                news="{{ $newsFormatted }}">
            </main-template>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
