@props(['title'])

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Roboto+Mono:wght@400;500;600;700&family=Zalando+Sans+SemiExpanded:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <x-fluid-assets target="head" />
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link id="homeFavicon" rel="shortcut icon" href="{{ asset('media/blackholelogo.webp') }}" type="image/x-icon">
</head>
<body>
  {{ $slot }}

  <script src="{{ asset('js/home.js') }}"></script>
  <x-fluid-assets target="body" />
</body>
</html>
