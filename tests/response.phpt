<?php

test("outputting a response", function ($t) {
    $test_output_methods = [
        'code' => function ($status_code) {
            echo $status_code . "\n";
        },
        'header' => function ($header) {
            echo $header . "\n";
        },
        'body' => function ($body) {
            echo $body;
        },
    ];

    $response = new \The\Response();
    $response->withStatus(200);
    $response->withHeader('Content-Type', 'application/json');
    $response->write(json_encode(['a' => 'apple']));
    ob_start();
    $response->output($test_output_methods);
    $output = ob_get_clean();
    
    $expected = <<<OUTPUT
200
Content-Type: application/json
{"a":"apple"}
OUTPUT;
    $t->equals($output, $expected);
});
