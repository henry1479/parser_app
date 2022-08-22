<?php


namespace App\Services;

use App\Models\Automobile;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;



class HandleDataService
{

    protected $parser;
    protected $model;
    protected $key;
    protected $path;
    protected $title;

    public function __construct(Parser $parser, string $title, string $path)
    {
        $this->parser = $parser;
        $this->title = $title;
        $this->model = Automobile::class;
        $this->path = $path;
    }

    // возвращает массив данных из источника XML
    public function getFullData() 
    {
        $url = Storage::path($this->path);
        $data = $this->parser->setLink($url)->parse();
        return $data;
    }

    // возвращает массив информации по конкретному тегу 
    // в данном случае automobiles
    private function handleData()
    {
        $parsData = $this->getFullData();
        $data = $parsData[$this->title];
        return $data;
    }

    // очистка старой информации из базы данных
    private function cleanModels()
    {
        $data = $this->getFullData();
        $dataId = collect($data['id'])->flatten()->toArray();
        $modelId = $this->model::pluck('id');
        $cleanId = $modelId->diff($dataId);
        $this->model::destroy($cleanId);
    }

    // сохранение обработанных данных в базе данных
    public function storeData() 
    {
        $data = $this->handleData();
        foreach($data as $item){
            if (!$item) continue;
            $result = $this->model::updateOrCreate($item);
        }

        $this->cleanModels();
       
        
        return $result;
        
    } 
}
