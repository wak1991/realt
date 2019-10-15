<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function getApartments()
    {
        for ($i=1; $i<=50; $i++){
            $xml = simplexml_load_file("http://realt.by/typo3conf/ext/uedb_core/getrecords.php?login[user]=test&login[pass]=test&config[tableid]=1&config[type]=1&config[page]={$i}&config[records-per-page]=100&select[town_id][e]=5102&select[price_m2][ge]=1&select[rooms][le]=4");
            foreach ($xml->records->record as $n){
                $id = Apartment::where('appart_id', '=', $n->code)->first();
                if (!$id){
                    $apartment = new Apartment();
                    $apartment->appart_id = $n->code;
                    $apartment->rooms = $n->rooms;
                    $apartment->price = $n->price_m2;
                    $apartment->save();
                }
            }
        }
    }

    public function getRooms($id)
    {
        // получаем группы с разбивкой цены по 50$
        $group = Apartment::selectRaw('price , CEIL(price/50) as `grup`')->orderBy('price')->where('rooms', '=', $id)->get()->groupBy('grup')->toArray();

        // получаем в цикле количесво квартир в каждой группе
        foreach ($group as $a){
            $data[] = count($a);

            // получаем диапозон цен в каждой группе
            $massiv = [];
            foreach ($a as $n){

                $massiv[] = $n['price'];
            }

            // подписи для диапазона цен
            $min = min($massiv);
            $max = max($massiv);
            $labels[] = $min . '-' . $max . ', $';

        }
        return [
            'labels' => $labels,
            'datasets' => array([
                'label' => $id . ' комнатные квартиры',
                'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                'borderColor' => 'rgba(255, 206, 86, 1)',
                'borderWidth' => '1',
                'data' => $data,
            ])
        ];
    }
}
