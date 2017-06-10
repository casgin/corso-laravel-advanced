<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;



class FeedImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laramind:feed-importer {nomeBrand?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scarica i feed di un brand, i converte in JSON e li salva nello strorage';

    protected $endPoint = [
        'vanityfair'    => 'https://www.vanityfair.it/feed',
        'vogue'         => 'http://www.vogue.it/?feed=rss2',
        'gqitalia'      => 'https://www.gqitalia.it/feed',
        'wired'         => 'https://www.wired.it/feed/',
        'glamour'       => 'http://www.glamour.it/feed/',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // === Valuto il parametro in ingresso
        $nomeBrand = strtolower($this->argument('nomeBrand'));

        // --- se non è presente tra gli argomenti, lo chiedo in modo interattivo
        if(is_null($nomeBrand)
            || trim($nomeBrand)=='' || !array_key_exists($nomeBrand, $this->endPoint))
        {
            $nomeBrand = strtolower(
                                $this->choice(
                                    'Quale brand vuoi importare ?',
                                    array_keys($this->endPoint)
                                )
                        );
        }

        $this->info('Stai importando i feed di '.$nomeBrand);

        // --- Recupero endPoint della URL del feed
        $feedUrl = $this->endPoint[$nomeBrand];
        $this->line('URL='.$feedUrl);

        // === Procedo alla lettura del feed
        $arRss = \Feeds::make($feedUrl, true);
        $arFeed = $arRss->get_items();
        $this->comment('Ho recuperato '.count($arFeed).' feed.');

        // --- creo array che contiene gli array le informazioni desiderate degli item
        $arItems = [];
        $arOutputTable = [];

        // $mdlImportedFeed = new \App\ImportedFeed();
        $mdlImportedFeed = new \App\Models\ImportedFeed();

        foreach ($arFeed as $item)
        {
            $record = [
                'title'  => $item->get_title(),
                'pub_date' =>  $item->get_date('Y-m-d H:i:s'),
                'description' => $item->get_description(),
                'link' => $item->get_link(),
                'brand' => $nomeBrand,
            ];

            $mdlImportedFeed->firstOrCreate($record);

            array_push($arItems, $record);
            array_push($arOutputTable, [
                'title'  => $item->get_title(),
                'pub_date' =>  $item->get_date('Y-m-d H:i:s'),
                'link' => $item->get_link(),
            ]);


        }

        file_put_contents(storage_path().DIRECTORY_SEPARATOR.$nomeBrand.'.json', json_encode($arItems));

        $this->table(['Titolo','Data','Link'],$arOutputTable);

    }
}
