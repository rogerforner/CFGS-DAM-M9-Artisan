<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class QuizStart
 * Es correspòn a la comanda: php artisan quiz:start
 *
 * @package App\Console\Commands
 */
class QuizStart extends Command
{
    /**
     * The name and signature of the console command.
     * Aquí és on definim els nostres arguments i opcions que podràn ser emprades amb la nostra comanda.
     * Arguments: {argumentName}
     * Opcions: {--optionName=}
     * Documentació: https://laravel.com/docs/master/artisan
     *
     * @var string
     */
    protected $signature = 'quiz:start {user} {--difficulty=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * QuizStart constructor.
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
        $difficulty =  $this->option('difficulty');

        if(!$difficulty){
            $difficulty = 'fàcil';
        }

        $this->line('Benvingut '.$this->argument('user').", comencem el qüestionari amb dificultat: ". $difficulty);

        $questions = [
            'facil' => [
                'Quants anys tens?',
                'Com es diu Joan?',
                'De quin color era el cavall blanc de Santiago?',
                'Si un arbre cau enmig d\'un bosc, fa soroll?',
                'Tots els animals són mamífers?'
            ],
            'dificil' => [
                'Quan el Harry Potter va anar a Hogwarts, quants anys tenia?',
                "Com és diu el germà del Ron que investiga els dracs a Romania?",
                'Amb quantes pilotes diferents es juga a Quidditch?',
                'Quines paraules has de dir per fer l\'encanteri d\'obrir portes?',
                "Com és diu el gos del Hàgrid?"
            ]
        ];

        $questionsToAsk = $questions[$difficulty];
        $answers = [];

        foreach($questionsToAsk as $question){
            $answer = $this->ask($question);
            array_push($answers,$answer);
        }

        $this->info("Gràcies per contestar el qüestionari en la terminal. Les teves respostes: ");

        for($i = 0;$i <= (count($questionsToAsk) -1 );$i++){
            $this->line(($i + 1).') '. $answers[$i]);
        }
    }
}
