<?php
require_once __DIR__ . '/vendor/autoload.php';

use PHPresentation\PHPresentation;
use PHPresentation\Utils\Paginator;

$presentation = new PHPresentation();
$presentation->logo('https://github.com/JuGid/PHPresentation/raw/master/docs/logo_phpresentation.png');
$presentation->name('PHPresentation demo');
$presentation->author('Julien GIDEL');
$presentation->version(1);

$presentation->createSection("Purpose", "Description of this presentation")
             ->createSlide()
             ->title('What is this ?')
             ->text('This presentation is a demo to show every components with possible options')
             ->title('Links')
             ->link('https://github.com/JuGid/PHPresentation', 'Visit the Github', [
               'new_tab'=>true,
             ])
             ->text('or')
             ->link('https://github.com/JuGid/PHPresentation/issues', 'Send pull requests', [
               'new_tab'=>true
             ]);
$presentation->createSection("Examples", "This section presents every components")
             ->createSlide()
             ->title('This is a title')
             ->text('This is a normal text')
             ->text('This is centered text', [
               'text_align'=>'center'
             ])
             ->text('This is a "righted" text', [
               'text_align'=>'right'
             ]);
$presentation->lastSection()
             ->createSlide()
             ->title('Block example')
             ->block('Normal block title', 'Centered block content', [
               'text_align'=>'center'
             ])
             ->block('Right block title', 'Normal block content', [
               'title_align'=>'right'
             ])
             ->block('Centered title block', 'Centered block content', [
               'align'=>'center'
             ]);
$presentation->lastSection()
             ->createSlide()
             ->title('Code example', [
               'text_align'=>'center'
             ])
             ->code('<p>This is a code sample</p>');
$presentation->lastSection()
             ->createSlide()
             ->title('Card example')
             ->card('This is a card with content with shadow', [
               'text_align'=> 'center',
               'shadow'=>true
             ])
             ->card('This is a card with content without shadow', [
               'text_align'=> 'center'
             ]);
$presentation->lastSection()
             ->createSlide()
             ->title('Image example')
             ->text('This is a picture with link (always on new tab)')
             ->image('/src/templates/assets/images/example.png', [
               'link'=>"http://google.fr"
             ])
             ->text('And this is a picture without link')
             ->image('/src/templates/assets/images/example.png');
$presentation->lastSection()
             ->createSlide()
             ->title('Link example')
             ->link("https://github.com/JuGid/PHPresentation", 'Our Github', [
               'new_tab'=>true
             ]);
$presentation->lastSection()
             ->createSlide()
             ->title('List example')
             ->beginGrid(3)
              ->beginRow()
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'none'
                ])
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'roman'
                ])
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'alpha'
                ])
              ->endRow()
              ->beginRow()
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'square'
                ])
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'circle'
                ])
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'decimal'
                ])
              ->endRow()
              ->beginRow()
                ->list(['Element 1', 'Element 2', 'Element 3'],[
                  'style'=>'normal'
                ])
              ->endRow()
             ->endGrid();
$presentation->lastSection()
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
                 ->card('This is a card in a PHPGrid with shadow and a long text that takes more than a line', [
                   'shadow'=>true
                 ])
               ->endRow()
             ->endGrid();
$presentation->lastSection()
             ->createSlide()
             ->title('Button example')
             ->text('This is a button with a badge and badge color')
             ->button('http://google.Fr', 'Google',[
               'new_tab'=>true,
               'badge'=>'badge option',
               'bacolor'=>'warning'
             ])
             ->text('This is a button with badge, no color')
             ->button('http://google.Fr', 'Google',[
               'new_tab'=>true,
               'badge'=>'badge option'
             ])
             ->text('This is a normal button')
             ->button('http://google.fr', 'Google')
             ->text('And all button options')
             ->beginGrid(3)
             ->beginRow()
               ->button('http://google.Fr', 'Google',[
                 'new_tab'=>true,
                 'badge'=>'1',
                 'bacolor'=>'primary'
               ])
               ->button('http://google.Fr', 'Google',[
                 'new_tab'=>true,
                 'badge'=>'2',
                 'bacolor'=>'danger'
               ])
               ->button('http://google.Fr', 'Google',[
                 'new_tab'=>true,
                 'badge'=>'3',
                 'bacolor'=>'warning'
               ])
             ->endRow()
             ->beginRow()
               ->button('http://google.Fr', 'Google',[
                 'new_tab'=>true,
                 'badge'=>'4',
                 'bacolor'=>'success'
               ])
               ->button('http://google.Fr', 'Google',[
                 'new_tab'=>true,
                 'badge'=>'5',
                 'bacolor'=>'light'
               ])
             ->endRow()
             ->endGrid()
             ;
$presentation->createSection('Credits', 'Some credits for myself')
             ->createSlide()
             ->contentCentered()
             ->textCentered()
             ->text('Created by Julien GIDEL')
             ->text('This is a training project');
$paginator = new Paginator($presentation);
$paginator->render();
