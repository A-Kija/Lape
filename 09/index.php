<?php
echo '<pre>';
$hash = md5(time());
echo $hash;
echo '<br>';
// function h1(string|array $data) : void php v.8
function h1($data) : string
{
    // return '*';
    print_r($data);
    if (is_array($data)) {
        $data = $data[0];
    }
    return '<h1 style="display:inline-block;">'.$data.'</h1>';
}



$hash = preg_replace_callback('/(\d+)/', 'h1', $hash);

echo $hash;