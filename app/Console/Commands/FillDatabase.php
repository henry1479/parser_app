<?php

namespace App\Console\Commands;

use App\Services\Contracts\Parser;
use App\Services\HandleDataService;
use Exception;
use Illuminate\Console\Command;

class FillDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:fill {path=public/data_light.xml} {title=automobiles}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда запускает сервис сохранения данных в базе данных из XML-источника';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Parser $parser)
    {
        try{
            $title = $this->argument('title');
            $path = $this->argument('path');
            // dd($path);
            $handler = new HandleDataService($parser,$title,$path);
            $data = $handler->storeData();
            $this->info($data);
        } catch (Exception $error) {
            $this->error($error->getMessage());
        }
        

    }
}
