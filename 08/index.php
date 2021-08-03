<?php


$a = 0.5;
$b = 0.7;
$c = 15;
$d = -0.7777777;

// deklaracija
function nr1($par1, $par2) {
    $ats = cos($par1) * cos($par2) * sin($par2);
    echo '<br>'.$ats;
    return $ats;
}

function nr2($par1, $par2) {
    $ats = $par1 * tan($par2);
    echo '<br>'.$ats;
    return $ats;
}


//1
$d1 = cos($a) * cos($b) * sin($b);
echo '<br>'.$d1;
//2
$d2 = $d1 * tan($c);
echo '<br>'.$d2;
//3
$d3 = cos($d2) * cos($d) * sin($d);
echo '<br>'.$d3;
//4
$d4 = $d3 * tan($c);
echo '<br>'.$d4;








echo '<br><br><br>';


//1
$d1 = nr1($a, $b); // kvietimas
//2
$d2 = nr2($d1, $c);
//3
$d3 = nr1($d2, $d);
//4
$d4 = nr2($d3, $c);

echo '<br><br><br>';

$valio = 'Valio';

$senas = 'Senas';
$naujesnis = 'Naujasnis';

// Deklaracija
function sudeti(int $vienas, int $du) : array
{
    global $naujesnis;
    echo $GLOBALS['senas'];
    echo $naujesnis;
    // echo $v;
    $ura = 'Ura';
    
    if ($du === 8) {
        return $ura;
    }
    
    $rezultatas = $vienas + $du;
    return [$rezultatas, $ura];
}

//Kvietimas
$labas = 7;

$mas = [77, 23];

$re = sudeti(...$mas);
var_dump($re[0]);

echo $re[1];


function foo() {
    static $index = 0;
    $index++;
    echo "<br>$index<br>";
}

foo();
foo();
foo();

$greet = function($name)
{
    printf("Hello %s", $name);
};
$greet('World');
$greet('PHP');

function antanas($a, $b)
{
    return $a[0] <=> $b[0];
}

$antanina = function($a, $b)
{
    return $a[0] <=> $b[0];
};

$masyvas = [
    ['a','d'],
    ['v','e'],
    ['a','c'],
    ['s','r'],
];
usort(
    $masyvas,
    // function($a, $b){return $a[0] <=> $b[0];}
    // 'antanas'
    // $antanina
    fn($a, $b) => $a[0] <=> $b[0]
);

echo '<pre>';
print_r($masyvas);


$result = 88;
$one = function()
{ 
    // var_dump($result); 
};
 
$two = function() use ($result)
{ 
    var_dump($result); 
};
 
$three = function() use (&$result)
{ 
    var_dump($result); 
};
 
$result++;
 
$one();    // NULL: $result nepasiekiamas
$two();    // int(0): $result nukopijuojamas
$three();    // int(1)


function recursive($num){
    echo "Pradzia: $num<br>";
    if($num < 5){
        //Kviečiame save. Padidiname numerį vienetu.
        recursive($num + 1);
    }
    echo "Pabaiga: $num<br>";
}
$startNum = 1;
recursive($startNum);


