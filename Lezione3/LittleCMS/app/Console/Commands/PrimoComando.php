<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PrimoComando extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laramind:esempio {nome} {cognome?} {--formatoOutput=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Primo esempio di come creare un comando artisan';

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
        // COMMANDLOGIC
        // --- Recupero il valore di una option
        $formato = $this->option('formatoOutput');
        $this->comment('Hai indicato un formato='.$formato);

        // --- Visualizza un messaggio in verde
        $this->info('Benvenuti al primo comando');

        // --- con $this->argument(<nomeParametro>) recuperiamo il valore
        // --- dei parametri in ingresso
        $nome = $this->argument('nome');

        // --- Visualizza un messaggio colore bianco
        $this->line('Ciao utente:'.$nome);

        // --- Visualizza un messaggio di errore
        $this->error('Si è verificato un errore');

        // --- Visualizza un messaggio di commento (giallo)
        $this->comment('sono un commento');

        $this->question('Ciao on un messaggio di question');

        // -------------------------------------------------
        // --- Intereattività
        // -------------------------------------------------

        // --- Confirm per interattività YES/NO
        if($this->confirm('Vuoi cancellare i file ?'))
        {
            $this->comment('Allora di canello tutti i file, OS compreso');
        }

        // --- Compando di input all'utente
        $risposta = $this->ask('Digita il tuo nome');
        $this->line('Il tuo nome='.$risposta);

        // --- Messanismo di suggest
        $arElencoBrand = ['VanityFair','Wired','GQItalia','Glamour','Vogue','Style.it'];
        $suggest = $this->anticipate('Di quale brand ti vuoi occupare ?', $arElencoBrand);


        // --- Meccanismo di scelta come menu
        $brand = $this->choice('Scegli il brand di cui ti vuoi occupare', $arElencoBrand);
        $this->line('Hai scelto '.$brand);

        // --- Visualizzazione tabellare
        $arData = [
            ['nome' => 'Gianfranco', 'cognome' => 'Castro'],
            ['nome' => 'Silvio', 'cognome' => 'Del Monte'],
            ['nome' => 'Marco', 'cognome' => 'Caputo'],
            ['nome' => 'Riccardo', 'cognome' => 'Komesar'],
            ['nome' => 'Belen', 'cognome' => 'Rodriguez'],
            ['nome' => 'Ariana', 'cognome' => 'Grande'],
            ['nome' => 'tizio', 'cognome' => 'quello lì'],
        ];

        $nomiColonne = ['Nome', 'Cognome'];
        $this->table($nomiColonne,$arData);


    }
}
