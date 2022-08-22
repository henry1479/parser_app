<?php
namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
	protected string $link;


	public function setLink(string $link):Parser
	{
		$this->link = $link;

		return $this;
	}

	public function parse():array
	{
		$xml = XmlParser::load($this->link);
		// указываем поля для парсинга
		// dd($xml);
		$cars = $xml->parse([
			'id' => [
				'uses' => 'offers.offer[id]'
			],
			'mark' => [
				'uses' => 'offers.offer[mark]'
			],
			'model' => [
				'uses' => 'offers.offer[model]'
			],
			'generation' => [
				'uses' => 'offers.offer[generation]'
			],
			'year' => [
				'uses' => 'offers.offer[year]'
			],
			'run' => [
				'uses' => 'offers.offer[run]'
			],
			'generation_id' => [
				'uses' => 'offers.offer[generation_id]'
			],
			'colors' => [
				'uses'=> 'offers.offer[color]'
			],
			'body-types' => [
				'uses'=> 'offers.offer[body-type]'
			],
			'engine-types' => [
				'uses' => 'offers.offer[engine-type]'
			],
			'transmissions' =>[
				'uses' => 'offers.offer[transmission]'
			],
			'gear-types' => [
				'uses' => 'offers.offer[gear-type]'
			],
			'automobiles' => [
				'uses' => 'offers.offer[id,mark,model,generation,year,run,color,body-type,engine-type,transmission,gear-type,generation_id]'
			]

		]);

        return $cars;

	}
}