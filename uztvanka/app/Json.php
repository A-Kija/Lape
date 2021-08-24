<?php

namespace Bebru\Uztvanka;

use App\DB\DataBase;

class Json implements DataBase {

    private static $obj;
    private $data;

    public static function get()
    {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct()
    {
        if (!file_exists(DIR.'data/bebrai.json')) {
            file_put_contents(DIR.'data/bebrai.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/bebrai.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(DIR.'data/bebrai.json', json_encode($this->data));
    }


    function create(array $uztvankaData) : void
    {
        $this->data[] = $uztvankaData;
    }
 
    function update(int $uztvankaId, array $uztvankaData) : void
    {
        foreach ($this->data as $key => $uztvanka) {
            if ($uztvanka['id'] == $uztvankaId) {
                $this->data[$key] = $uztvankaData;
            }
        }
    }
 
    function delete(int $uztvankaId) : void
    {
        foreach ($this->data as $key => $uztvanka) {
            if ($uztvanka['id'] == $uztvankaId) {
                unset($this->data[$key]);
            }
        }
    }
 
    function show(int $uztvankaId) : array
    {
        foreach ($this->data as $uztvanka) {
            if ($uztvanka['id'] == $uztvankaId) {
                return $uztvanka;
            }
        }
        return [];
    }
    
    function showAll() : array
    {
        return $this->data;
    }


}