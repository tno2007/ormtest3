<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new FrameworkX\App();

$app->get('/', function () {

    R::setup( 'mysql:host=localhost;dbname=ormtest3',
        'ormtest3', 'V13gcLGAT/FXBHtU' ); //for both mysql or mariaDB

    $book = R::dispense( 'book' );

    R::close();

    // V13gcLGAT/FXBHtU

    return React\Http\Message\Response::plaintext(
        "Hello wörld!\n"
    );
});

$app->get('/users/{name}', function (Psr\Http\Message\ServerRequestInterface $request) {
    return React\Http\Message\Response::plaintext(
        "Hello " . $request->getAttribute('name') . "!\n"
    );
});

$app->run();