<?php

namespace App\Support;

class GtaContent
{
    /**
     * @return list<array<string, mixed>>
     */
    public function navigationLinks(): array
    {
        return [
            [
                'label' => 'Home',
                'route' => 'gta.home',
                'icon' => 'bi-house-door-fill',
                'active' => 'gta.home',
                'variant' => 'link',
            ],
            [
                'label' => 'Annunci',
                'route' => 'announcements.index',
                'icon' => 'bi-newspaper',
                'active' => 'announcements.index',
                'variant' => 'link',
            ],
            [
                'label' => 'Carica leak',
                'route' => 'announcements.create',
                'icon' => 'bi-upload',
                'active' => 'announcements.create',
                'variant' => 'link',
            ],
            [
                'label' => 'Richiedi info',
                'route' => 'info.create',
                'icon' => 'bi-envelope-fill',
                'active' => 'info.*',
                'variant' => 'button',
            ],
            [
                'label' => 'Torna agli esercizi',
                'route' => 'home',
                'icon' => 'bi-grid-3x3-gap-fill',
                'active' => 'home',
                'variant' => 'outline-button',
            ],
        ];
    }

    /**
     * @return list<array<string, string>>
     */
    public function footerLinks(): array
    {
        return $this->navigationLinks();
    }

    /**
     * @return array<string, mixed>
     */
    public function homeIntro(): array
    {
        return [
            'kicker' => 'Dal sito ufficiale Rockstar',
            'icon' => 'bi-stars',
            'title' => 'GTA VI riporta la serie a Vice City, nello stato di Leonida.',
            'text' => "Rockstar presenta una storia criminale con Jason e Lucia al centro di una cospirazione che si allarga oltre Vice City. Il gioco punta a essere l'evoluzione piu grande e immersiva della serie Grand Theft Auto.",
            'actions' => [
                [
                    'label' => 'Apri la board',
                    'route' => 'announcements.index',
                    'icon' => 'bi-grid-3x3-gap-fill',
                    'variant' => 'btn-neon',
                ],
                [
                    'label' => 'Fonte Rockstar',
                    'url' => 'https://www.rockstargames.com/VI',
                    'icon' => 'bi-box-arrow-up-right',
                    'variant' => 'btn-outline-neon',
                    'external' => true,
                ],
            ],
        ];
    }

    /**
     * @return list<array<string, string>>
     */
    public function homeFeatures(): array
    {
        return [
            [
                'icon' => 'bi-calendar-event-fill',
                'title' => 'Data di uscita',
                'text' => 'GTA VI e previsto per il 19 novembre 2026, dopo lo spostamento annunciato da Rockstar.',
            ],
            [
                'icon' => 'bi-controller',
                'title' => 'Console',
                'text' => 'Il lancio e indicato per PlayStation 5 e Xbox Series X|S. Una versione PC non e ancora annunciata.',
            ],
            [
                'icon' => 'bi-bag-check-fill',
                'title' => 'Pre-order',
                'text' => 'I pre-order ufficiali partono dal 25 giugno 2026 su store digitali e retailer selezionati.',
            ],
        ];
    }

    /**
     * @return list<array<string, string>>
     */
    public function homeTrailerVideos(): array
    {
        return [
            [
                'title' => 'Trailer 1',
                'label' => 'Reveal ufficiale',
                'youtube_id' => 'QdBZY2fkU-0',
            ],
            [
                'title' => 'Trailer 2',
                'label' => 'Jason e Lucia',
                'youtube_id' => 'VQRLujxTm3c',
            ],
            [
                'title' => 'Cover Art Reveal',
                'label' => 'Pre-order',
                'youtube_id' => 'EiQEBYDox_k',
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function homeAtmosphere(): array
    {
        return [
            'kicker' => 'Atmosfera ufficiale',
            'icon' => 'bi-sunset-fill',
            'title' => 'Neon, costa, rapine e cultura virale dentro una Leonida esagerata.',
            'text' => "La pagina ufficiale descrive GTA VI come un viaggio nel lato piu rischioso della destinazione piu assolata d'America. Questa homepage raccoglie quell'idea e la unisce alla board dei leak della community.",
            'source' => 'rockstargames.com/VI',
        ];
    }

    /**
     * @return list<array<string, string>>
     */
    public function homeCarouselItems(): array
    {
        return [
            [
                'image' => 'carousel-img-1.webp',
                'alt' => 'Strada notturna di Vice City',
            ],
            [
                'image' => 'carousel-img-2.avif',
                'alt' => 'Aereo che vola sopra una spiaggia a Vice City',
            ],
            [
                'image' => 'carousel-img-3.jpg',
                'alt' => 'Persone che ballano accanto a un auto a Vice City',
            ],
        ];
    }

    /**
     * @return list<array<string, string>>
     */
    public function footerCarouselItems(): array
    {
        return [
            [
                'image' => 'img-1-carousel2.jpg',
                'alt' => 'Jason e Lucia',
                'kicker' => 'Community',
                'icon' => 'bi-people-fill',
                'caption' => 'Tutti gli annunci finora',
            ],
            [
                'image' => 'img-2-carousel2.avif',
                'alt' => 'Jason in moto',
                'kicker' => 'Leonida',
                'icon' => 'bi-geo-alt-fill',
                'caption' => 'Una mappa il triplo di Los Santos',
            ],
            [
                'image' => 'img-3-carousel2.jpg',
                'alt' => 'Nightlife di Vice City',
                'kicker' => 'Nightlife',
                'icon' => 'bi-moon-stars-fill',
                'caption' => 'La vita notturna di Vice City',
            ],
        ];
    }

    /**
     * @return list<string>
     */
    public function announcementCategories(): array
    {
        return ['Gameplay', 'Mappa', 'Veicoli', 'Personaggi', 'Online'];
    }

    /**
     * @return array<string, string>
     */
    public function announcementFormPanel(): array
    {
        return [
            'image' => 'carousel-img-1.webp',
            'alt' => 'Vice City notturna',
            'badge' => 'Upload',
            'icon' => 'bi-cloud-arrow-up-fill',
            'title' => 'Ogni leak entra subito nella storia di Vice City.',
            'text' => 'Compila il form e salva la segnalazione nella tabella announcements.',
        ];
    }

    /**
     * @return list<string>
     */
    public function infoTopics(): array
    {
        return ['Press kit', 'Collaborazioni', 'Gameplay reveal', 'Eventi', 'Altro'];
    }

    /**
     * @return array<string, string>
     */
    public function infoPanel(): array
    {
        return [
            'kicker' => 'Invia una Mail',
            'icon' => 'bi-envelope-paper-fill',
            'title' => 'Contatta il team di GTA VI',
        ];
    }
}
