<?php
require_once __DIR__ . '/vendor/autoload.php';

use PHPresentation\PHPresentation;
use PHPresentation\Utils\Paginator;

$presentation = new PHPresentation();
$presentation->name('My pretty presentation');
$presentation->author('User Name');
$presentation->version(1,4,2);

$presentation->createSection("First section", "And this is the description")
             ->createSlide()
             ->title('Text example')
             ->text('This is another text')
             ->text('And this is too !');
$presentation->createSection("Example section", "This section presents every components")
             ->createSlide()
             ->title('This is a title')
             ->text('This is a text');
$presentation->last()
             ->createSlide()
             ->title('Block example')
             ->block('Block titre 1', 'Block content 1', [
               'text_align'=>'center'
             ])
             ->block('Block titre 2', 'Block content 2', [
               'title_align'=>'right'
             ])
             ->block('Block titre 3', 'Block content 3', [
               'align'=>'center'
             ]);
$presentation->last()
             ->createSlide()
             ->title('Code example', [
               'text_align'=>'center'
             ])
             ->code('<p>This is a code sample</p>');
$presentation->last()
             ->createSlide()
             ->title('Card example')
             ->card('This is a card with content with shadow', [
               'text_align'=> 'center',
               'shadow'=>true
             ])
             ->card('This is a card with content without shadow', [
               'text_align'=> 'center'
             ]);
$presentation->last()
             ->createSlide()
             ->title('Image example')
             ->image('/src/templates/assets/images/example.png', [
               'link'=>"http://google.fr"
             ]);
$presentation->last()
             ->createSlide()
             ->title('Link example')
             ->link("https://github.com/JuGid/PHPresentation", 'Our Github', [
               'new_tab'=>true
             ]);
$presentation->last()
             ->createSlide()
             ->title('List example')
             ->list(['Element 1', 'Element 2', 'Element 3'],[
               'style'=>'alpha'
             ]);
$presentation->last()
             ->createSlide()
             ->title('Grid example')
             ->beginGrid(2)
               ->beginRow()
                 ->text('New grid text',[
                   'text_align'=>'center'
                 ])
                 ->block('Title', 'Block content')
               ->endRow()
               ->beginRow()
                 ->block('Hello world', 'Hello world content')
                 ->card('This is a card in a PHPGrid')
               ->endRow()
             ->endGrid();
$presentation->last()
             ->createSlide()
             ->title('Button example')
             ->button('http://google.Fr', 'Google',[
               'new_tab'=>true,
               'badge'=>'badge option',
               'bacolor'=>'warning'
             ]);

$paginator = new Paginator($presentation);
$paginator->render();
