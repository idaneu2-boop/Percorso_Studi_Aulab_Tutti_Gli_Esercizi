@props(['contacts'])

<footer class="site-footer">
  <div class="footer-content">
    <div>
      <strong class="footer-title">Esercizi Daniele</strong>
      <p>Creato per navigare velocemente tra gli esercizi.</p>
    </div>
    <address class="footer-contacts">
      @foreach ($contacts as $contact)
        <a href="{{ $contact['href'] }}" @if (str_starts_with($contact['href'], 'http')) target="_blank" rel="noopener noreferrer" @endif>{{ $contact['label'] }}</a>
      @endforeach
    </address>
  </div>
</footer>
