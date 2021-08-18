<?php
use Ramsey\Uuid\Uuid;

class Kibiras {

    protected $akmenuKiekis = 0;
    protected static $akmenuKiekisVisuoseKibiruose = 0;
    private static $kibiras;


    public static function getKibiras()
    {
        return self::$kibiras ?? self::$kibiras = new self;
    }

    private function __construct(){}
    private function __clone(){}
    private function __sleep(){}
    private function __wakeup(){}

    public function __invoke($x)
    {
        
        $uuid = Uuid::uuid4();

        printf(
            "UUID: %s\nVersion: %d\n",
            $uuid->toString(),
            $uuid->getFields()->getVersion()
        );
        
        return "Pats tu $x";
    }



    public function prideti1Akmeni()
    {
        self::$akmenuKiekisVisuoseKibiruose++;
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu($kiekis)
    {
        self::$akmenuKiekisVisuoseKibiruose+=$kiekis;
        $this->akmenuKiekis+=$kiekis;
    }

    public function kiekPririnktaAkmenu()
    {
        _d($this->akmenuKiekis, 'akmenai--->');
        _d(self::$akmenuKiekisVisuoseKibiruose, 'visi akmenai--->');
    }

}