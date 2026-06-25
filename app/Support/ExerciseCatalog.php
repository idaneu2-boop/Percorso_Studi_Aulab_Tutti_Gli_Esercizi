<?php

namespace App\Support;

class ExerciseCatalog
{
    /**
     * @return array<string, string>
     */
    public function profile(): array
    {
        return [
            'name' => 'Daniele Pigliacelli / Matricola: 7521788692',
            'url' => 'https://www.instagram.com/daniele.pigliacelli_/',
            'image' => '/media/danielefoto.jpg',
            'image_alt' => 'Foto di Daniele Pigliacelli',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function hero(): array
    {
        return [
            'kicker' => 'Console Unix - Html - Git Bash&Hub - CSS - Bootstrap - JS',
            'title' => 'Indice dei miei esercizi',
            'copy' => 'Una dashboard semplice e ordinata per aprire al volo tutte le pagine HTML dei miei esercizi.',
        ];
    }

    /**
     * @return list<array{label: string, slug: string}>
     */
    public function categories(): array
    {
        return [
            ['label' => 'Console Unix', 'slug' => 'console'],
            ['label' => 'Html', 'slug' => 'html'],
            ['label' => 'Css', 'slug' => 'css'],
            ['label' => 'Bootstrap', 'slug' => 'bootstrap'],
            ['label' => 'DOM', 'slug' => 'dom'],
            ['label' => 'JS', 'slug' => 'js'],
            ['label' => 'Laravel', 'slug' => 'laravel'],
        ];
    }

    /**
     * @return array{label: string, slug: string}|null
     */
    public function findCategory(string $slug): ?array
    {
        foreach ($this->categories() as $category) {
            if ($category['slug'] === $slug) {
                return $category;
            }
        }

        return null;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function exercises(?string $category = null): array
    {
        if ($category === null) {
            return $this->allExercises();
        }

        return array_values(array_filter(
            $this->allExercises(),
            fn (array $exercise): bool => $exercise['category_slug'] === $category,
        ));
    }

    /**
     * @return list<string>
     */
    public function legacyPages(): array
    {
        $exercisePages = array_map(
            fn (array $exercise): string => $exercise['page'],
            array_filter($this->allExercises(), fn (array $exercise): bool => isset($exercise['page'])),
        );

        return array_values(array_unique(array_merge([
            'home',
            'I Fantastici 5',
            'nasa1',
            'nasa2',
            'pokemitology (2)',
            'pokemitology (3)',
            'pokemitology (4)',
            'prestoannunci',
            'viaggi (1)',
            'viaggi (2)',
            'viaggi (3)',
            'viaggi (5)',
        ], $exercisePages)));
    }

    /**
     * @return list<array<string, string>>
     */
    public function footerContacts(): array
    {
        return [
            ['label' => 'idaneu2@gmail.com', 'href' => 'mailto:idaneu2@gmail.com'],
            ['label' => '3281022479', 'href' => 'tel:+393281022479'],
            ['label' => 'Daniele.Pigliacelli_', 'href' => 'https://www.instagram.com/daniele.pigliacelli_/'],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function allExercises(): array
    {
        return [
            [
                'title' => 'Test-Comandi',
                'search_title' => 'test comandi terminale git',
                'tag' => 'Console Unix',
                'date' => '27.04.2026',
                'card_class' => 'card-terminal',
                'category_slug' => 'console',
                'page' => 'index',
                'cta' => 'Fai il primo passo',
                'media' => ['type' => 'text', 'class' => 'terminal-media', 'text' => '> Il primo passo.', 'hidden' => true],
            ],
            [
                'title' => 'Cucina Abruzzese e 5 Tag Html',
                'search_title' => 'Cucina Abruzzese Es-Html ricette cucina',
                'tag' => 'Html',
                'date' => '28.04.2026',
                'card_class' => 'card-cucina',
                'category_slug' => 'html',
                'page' => 'Ricette_cucina',
                'cta' => 'Scopri delle nuove ricette!',
                'media' => ['type' => 'image', 'src' => '/media/Timballo-scrippelle-teramano-1.jpg', 'alt' => 'Timballo di scrippelle teramano'],
            ],
            [
                'title' => 'MSD Viaggi',
                'search_title' => 'MSD Viaggi Esercizio Git Daniele Pigliacelli viaggi blog',
                'tag' => 'Html + Git-Hub',
                'date' => '29.04.2026',
                'card_class' => 'card-viaggi',
                'category_slug' => 'html',
                'page' => 'viaggi (4)',
                'cta' => 'Apri il blog viaggi',
                'media' => ['type' => 'image', 'src' => '/media/optimized/home-viaggi.jpg', 'alt' => 'Aereo in viaggio'],
            ],
            [
                'title' => 'PokéMitology',
                'search_title' => 'PokéMitology Pokémon mitologia creazione medioevo presente',
                'tag' => 'CSS1 + CSS2',
                'date' => '30.04.2026',
                'card_class' => 'card-pokemon-myth',
                'category_slug' => 'css',
                'page' => 'pokemitology (1)',
                'cta' => 'Tuffati nel passato!',
                'media' => ['type' => 'image', 'src' => '/media/gif arceus.gif', 'alt' => 'Arceus animato'],
            ],
            [
                'title' => 'StreamWorld Anime',
                'search_title' => 'Blog Anime Blog_Anime StreamWorld anime',
                'tag' => 'Bootstrap',
                'date' => '05.05.2026',
                'card_class' => 'card-anime',
                'category_slug' => 'bootstrap',
                'page' => 'anime',
                'cta' => 'Clicca per guardare i migliori Anime',
                'media' => ['type' => 'image', 'src' => '/media/chainsaw-man-denji-bound-makimas-eye-live-wallpaper.png', 'alt' => 'Chainsaw Man'],
            ],
            [
                'title' => 'Smart4 Telefonia',
                'search_title' => 'Blog Telefonia Blog_Telefonia smartphone offerte',
                'tag' => 'Bootstrap Components',
                'date' => '06.05.2026',
                'card_class' => 'card-tech',
                'category_slug' => 'bootstrap',
                'page' => 'telefonia',
                'cta' => 'Sfoglia il catalogo',
                'media' => ['type' => 'image', 'src' => '/media/optimized/home-telefonia.jpg', 'alt' => 'iPhone 17 Pro Max'],
            ],
            [
                'title' => 'Nasa',
                'search_title' => 'Blog Nasa Blog_Nasa spazio bootstrap',
                'tag' => 'Live Coding',
                'date' => '07.05.2026',
                'card_class' => 'card-nasa',
                'category_slug' => 'bootstrap',
                'page' => 'nasa',
                'cta' => 'Houston? We landed!',
                'media' => ['type' => 'image', 'src' => '/media/header.webp', 'alt' => 'Scenario spaziale NASA'],
            ],
            [
                'title' => 'Super Ma...Du..',
                'search_title' => 'SuperMario SuperMario_Es super mario gioco esercizio',
                'tag' => 'JS - intro',
                'date' => '12.05.2026',
                'card_class' => 'card-mario',
                'category_slug' => 'js',
                'page' => 'supermario',
                'cta' => 'Super Mario sembra strano...',
                'media' => ['type' => 'image', 'src' => '/media/d9f6x59-83bc7697-99b5-4ab1-b56c-48286f982b2b.gif', 'alt' => 'Super Mario animato'],
            ],
            [
                'title' => '?????????????????????????',
                'search_title' => 'EserciziJS2 Undertale JavaScript seconda parte',
                'tag' => 'JS - Variabili',
                'date' => '13.05.2026',
                'card_class' => 'card-undertale',
                'category_slug' => 'js',
                'page' => 'undertale (1)',
                'cta' => '????????????????????????????',
                'media' => ['type' => 'image', 'src' => '/media/footer.webp', 'alt' => 'Sans da Undertale'],
            ],
            [
                'title' => 'Pokédex',
                'search_title' => 'Es2005Ja Es2005ja JavaScript esercizi 20 maggio',
                'tag' => 'JS - Array/Funzioni',
                'date' => '18.05.2026',
                'card_class' => 'card-pokedex',
                'category_slug' => 'js',
                'page' => 'pokedex',
                'cta' => 'Sfoglia il Pokédex',
                'media' => ['type' => 'empty', 'class' => 'pokeball-media', 'hidden' => true],
            ],
            [
                'title' => 'Aulab',
                'search_title' => 'oggetti OggettiEsDP Aulab oggetti JavaScript',
                'tag' => 'JS - Oggetti',
                'date' => '21.05.2026',
                'card_class' => 'card-aulab',
                'category_slug' => 'js',
                'page' => 'oggetti (1)',
                'cta' => 'Valerio perderà il lavoro?',
                'media' => ['type' => 'image', 'src' => '/media/object-lab-hero.png', 'alt' => 'Aulab Object Lab'],
            ],
            [
                'title' => 'Minecraft',
                'search_title' => 'Dom1 DOM JavaScript querySelector classList eventi lista contatti',
                'tag' => 'JS - DOM',
                'date' => '25.05.2026',
                'card_class' => 'card-dom',
                'category_slug' => 'dom',
                'page' => 'dom1',
                'cta' => 'Start Launcher',
                'media' => ['type' => 'image', 'class' => 'dom-media', 'src' => '/media/logo.svg', 'alt' => ''],
            ],
            [
                'title' => 'Rubrica contatti',
                'search_title' => 'Rubrica DOM JavaScript rubrica contatti',
                'tag' => 'JS - DOM',
                'date' => '26.05.2026',
                'card_class' => 'card-rubrica',
                'category_slug' => 'dom',
                'page' => 'rubrica',
                'cta' => 'Apri la rubrica',
                'media' => ['type' => 'image', 'class' => 'rubrica-media', 'src' => '/media/Icona Contatti.jpg', 'alt' => ''],
            ],
            [
                'title' => 'JDM Garage',
                'search_title' => 'Presto JDM Garage annunci auto JavaScript JSON',
                'tag' => 'AOS - JSON/DOM',
                'date' => '27.05.2026',
                'card_class' => 'card-presto',
                'category_slug' => 'dom',
                'page' => 'presto',
                'cta' => 'Acquista la tua Auto Tuning',
                'media' => ['type' => 'image', 'class' => 'presto-media', 'src' => '/media/logopresto.avif', 'alt' => 'Logo Presto JDM Garage'],
            ],
            [
                'title' => 'GTA VI Hub',
                'search_title' => 'Donato GTA 6 Grand Theft Auto VI Laravel annunci leak',
                'tag' => 'Laravel',
                'date' => '24.06.2026',
                'card_class' => 'card-gta',
                'category_slug' => 'laravel',
                'route' => 'gta.home',
                'cta' => 'Apri il sito GTA 6',
                'media' => ['type' => 'image', 'class' => 'gta-media', 'src' => '/GTA-6-Logo-PNG-from-Grand-Theft-Auto-VI-Transparent-jpg.png', 'alt' => 'Logo Grand Theft Auto VI'],
            ],
        ];
    }
}
