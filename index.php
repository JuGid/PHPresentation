<?php
require_once __DIR__ . '/vendor/autoload.php';

use PHPresentation\PHPresentation;
use PHPresentation\Utils\Paginator;

$presentation = new PHPresentation();
$presentation->name('Présentation de test');
$presentation->author('Julien GIDEL');
$presentation->version(0,0,1);

$presentation->createSection("Première section de test")
             ->createSlide()
             ->title('Ceci est un titre')
             ->text('Bienvenue sur la page test')
             ->text('Et voici un nouveau text');
$presentation->last()
             ->createSlide()
             ->title('Test de liste')
             ->list(['Nouvelle', 'Liste', 'Element']);
$presentation->createSection("Seconde section")
             ->createSlide()
             ->title('Un second titre')
             ->block('Block titre 1', 'Block content 1')
             ->block('Block titre 2', 'Block content 2')
             ->block('Block titre 3', 'Block content 3')
             ->text('Et voici un nouveau text component');

$paginator = new Paginator($presentation);
$paginator->render();
