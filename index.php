<?php
require_once __DIR__ . '/vendor/autoload.php';

use PHPresentation\PHPresentation;
use PHPresentation\Utils\Paginator;

$presentation = new PHPresentation();
$presentation->name('My pretty presentation');
$presentation->author('User Name');
$presentation->version(0,0,1);

$presentation->createSection("First section", "And this is the description")
             ->createSlide()
             ->title('Text example')
             ->text('This is another text')
             ->text('And this is too !');
$presentation->createSection("Example section", "This section present every components")
             ->createSlide()
             ->title('This is a title')
             ->text('This is a text');
$presentation->last()
             ->createSlide()
             ->title('Block example')
             ->block('Block titre 1', 'Block content 1')
             ->block('Block titre 2', 'Block content 2')
             ->block('Block titre 3', 'Block content 3');
$presentation->last()
             ->createSlide()
             ->title('Code example')
             ->code('<p>This is a code sample</p>');
$presentation->last()
             ->createSlide()
             ->title('Card example')
             ->card('This is a card with content');
$presentation->last()
             ->createSlide()
             ->title('Image example')
             ->image('/src/templates/assets/images/example.png');
$presentation->last()
             ->createSlide()
             ->title('Link example')
             ->link("https://github.com/JuGid/PHPresentation", 'Our Github');
$presentation->last()
             ->createSlide()
             ->title('List example')
             ->list(['Element 1', 'Element 2', 'Element 3']);
/*
$presentation->last()
             ->createSlide()
             ->beginGrid(2)
               ->beginRow()
                 ->text('New grid text')
                 ->block('Title', 'Block content')
               ->endRow()
               ->beginRow()
                 ->block('Hello world', 'Hello world content')
                 ->block('Block title', 'Block content')
               ->endRow()
             ->endGrid()
*/
$paginator = new Paginator($presentation);
$paginator->render();
