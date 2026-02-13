<?php
header('Content-Type: application/json');
$f = 'messages.txt';
if (!file_exists($f)) file_put_contents($f, '[]');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $d = json_decode(file_get_contents('php://input'), true);
    $m = json_decode(file_get_contents($f), true) ?: [];
    $m[] = ['t' => $d['t'], 'u' => $d['u'], 'time' => $d['time'], 'type' => $d['type'] ?? 'text'];
    file_put_contents($f, json_encode(array_slice($m, -100)));
}
echo file_get_contents('messages.txt');
?>