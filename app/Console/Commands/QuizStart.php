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
     *
     * @var string
     */
    protected $signature = 'quiz:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->line("Simple text.");
        $this->info("Informació...");
        $this->comment("Un comentari");
        $this->question("Una pregunta?");
        $this->error("Error! A veure si l'arregles :3");
    }
}
