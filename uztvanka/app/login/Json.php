<?php

namespace Bebru\Uztvanka\Login;

use App\DB\DataBase;

class Json {

    private static $obj;
    private $data;

    public static function get()
    {
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct()
    {
        if (!file_exists(DIR.'data/users.json')) {
            file_put_contents(DIR.'data/users.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/users.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(DIR.'data/users.json', json_encode($this->data));
    }

 
    function show(string $userId) : array
    {
        foreach ($this->data as $user) {
            if ($user['email'] == $userId) {
                return $user;
            }
        }
        return [];
    }
}