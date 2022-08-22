<?php

namespace App\Http\Controllers;


use App\Services\HandleDataService;
use App\Services\ParserService;


class ParserController extends Controller
{
public function store(ParserService $parser, string $title) {

    $handler = new HandleDataService($parser,$title,'public/data_light.xml');
    $data = $handler-> storeData();
    return back()->with('success', 'Все в базе данных');
}
   


}