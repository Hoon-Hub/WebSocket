<?php

require __DIR__.'/vendor/autoload.php';

\Ratchet\Client\connect('wss://echo.websocket.org:443')->then(function($conn){
    $conn->on('message', function($msg) use ($conn) {
        echo "Received: {$msg} \n";
        $conn->close();
    });

    $conn->send('Hello World!');
}, function ($e) {
    echo "Couldn't connected: {$e->getMessage()}\n";
});