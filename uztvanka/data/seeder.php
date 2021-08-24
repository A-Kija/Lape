<?php

$users = [
    ['id' => 1, 'name' => 'Petras', 'email' => 'petras@petras.com', 'pass' => md5('123')],
    ['id' => 2, 'name' => 'Ona', 'email' => 'ona@ona.com', 'pass' => md5('123')],
    ['id' => 3, 'name' => 'Bebras', 'email' => 'bebras@bebras.com', 'pass' => md5('123')],
];
$users = json_encode($users);
file_put_contents(__DIR__.'/users.json', $users);