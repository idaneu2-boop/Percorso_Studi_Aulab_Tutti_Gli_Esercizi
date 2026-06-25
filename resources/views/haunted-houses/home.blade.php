<x-haunted-houses.layout title="Dimore Spettrali - Agenzia viaggi paranormali">
    <x-haunted-houses.header />

    <section class="featured-section section-spacing" id="consigliate">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">
                    <i class="bi bi-lightning-charge"></i>
                    Case consigliate
                </p>
                <h2>Tre soggiorni per chi non ha paura del check-in dopo mezzanotte</h2>
            </div>

            <div class="row g-4">
                @forelse ($featuredHouses as $hauntedHouse)
                    <div class="col-md-6 col-xl-4">
                        <x-haunted-houses.house-card :house="$hauntedHouse" />
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-house-heart"></i>
                            <h3>Nessuna dimora consigliata disponibile</h3>
                            <p>Aggiungi la prima casa infestata al portale e torna qui dopo il seed del database.</p>
                            <a class="btn btn-primary-ghost" href="{{ route('haunted-houses.create') }}">Aggiungi casa</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-haunted-houses.layout>
