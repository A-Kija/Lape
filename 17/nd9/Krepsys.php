<?php

class Krepsys {
    const DYDIS = 500;

    private $pririnkta = 0;


    public function deti(Grybas $grybas) : bool
    {
        if (!$grybas->sukirmijes && $grybas->valgomas) {
            $this->pririnkta += $grybas->svoris;
        }
        return self::DYDIS > $this->pririnkta;
    }



}