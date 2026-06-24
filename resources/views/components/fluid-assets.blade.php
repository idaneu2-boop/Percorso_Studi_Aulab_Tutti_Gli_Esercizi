@props(['target' => 'head'])

@if ($target === 'head')
    <link rel="stylesheet" href="{{ asset('css/site-fluid.css') }}">
@else
    <script src="{{ asset('js/site-fluid.js') }}" defer></script>
@endif
