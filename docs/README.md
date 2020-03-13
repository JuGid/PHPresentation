
# Welcome to PHPresentation

PHPresentation allow you to create slides with PHP. It uses components that you may create and pull request it on our GitHub.

## Installation

For the moment, you can only download the github project and follow the instructions contained in the README :
- Download files or clone this repository
- Run `composer install`
- Create your PHPresentation in `index.php` file
- Run the PHP Internal server in ~/PHPresentation `php -S localhost:8000`
- Open `http://localhost:8000` in your favorite browser

## Example
You can find an example in file index.php. It uses every components with some options.

# Documentation
Components source code is [src/Utils/Components](https://github.com/JuGid/PHPresentation/tree/master/src/Utils/Components) and uses templates in [src/templates/core](https://github.com/JuGid/PHPresentation/tree/master/src/templates/core)
## Start and finish a PHPresentation
The minimal required code in index.php is :

    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    
    use PHPresentation\PHPresentation;
    use PHPresentation\Utils\Paginator;
    
    $presentation = new PHPresentation();
    $presentation->name('PHPresentation name');
    $presentation->author('Me');
    
    /*
    Your presentation here
    */
    
    $paginator = new Paginator($presentation);
    $paginator->render();

### To create a new section and slide
You can use the following code to create a new section and a new slide in it

    $presentation->createSection("Example", "Description of this example")
                 ->createSlide();

You can add some slide to the last section :

    $presentation->lastSection()
                 ->createSlide();
***While adding a component returns the slide where the component is implemented, you have to call this code below to create a new slide in a section.***

Slides have also some options :

    $presentation->createSection("Example", "Description of this example")
                 ->createSlide()
                 ->contentCentered() //Center the content on page
                 ->textCentered(); //Center the text in each component

### Add components
You can now add components, for example :

    $presentation->createSection("Purpose", "Description of this presentation")
                 ->createSlide()
                 ->text('This is an example')
                 ->code('<p>Another component with code</p>');


# Components
## PHPBlock
You can create block with a title and a content.
**Use it**

    ->block('Normal block title', 'Centered block content', [options]);

**Options allowed**

    'text_align'=>['center', 'left', 'right'],
	'title_align'=>['center', 'left', 'right'],
	'align'=>['center', 'left', 'right']

## PHPButton
You can create button with a text and a link.

**Use it**

    ->button('http://google.Fr', 'Google', [option])

**Options allowed**
	
    'new_tab'=> [true, false],
    'badge'=>null,
    'bacolor'=>['light', 'primary', 'danger', 'warning', 'success']

## PHPCard
Display a card with a grey background to highlight text.

**Use it**

    ->card('This is a card with content with shadow', [options])

**Options allowed**

    'text_align'=>['center', 'left', 'right'],
    'shadow'=>[true, false]

## PHPCode
Display code in a card.

**Use it**

    ->code('<p>This is a code sample</p>');

**Options allowed**

    no options

## PHPGrid
PHPGrid can display a grid of components.
PHPGrid has a special syntax since you add components to it. You have to declare when you begin/end the grid and same for each row.

*If you don't end row, components will always be add to the began row.*

**Use it**

    $presentation->createSection("The section", "The description of this section")
                 ->createSlide()
                 ->beginGrid(2) //2 is the number of columns
                   ->beginRow()
                     ->text('New grid text')
                     ->block('Title', 'Block content')
                   ->endRow()
                   ->beginRow()
                     ->block('Hello world', 'Hello world content')
                     ->text('This is a text')
                   ->endRow()
                 ->endGrid();

**Options allowed**

    no options

## PHPImage
Display a picture and can add link to it.

**Use it**

    ->image('/src/templates/assets/images/example.png', [options]);

**Options allowed**

    'link'=>null,
    'new_tab'=>[true, false]

## PHPLink
Display a link.

**Use it**

    ->link("https://github.com/JuGid/PHPresentation", 'Our Github', [options]);

**Options allowed**

    'link'=>null,
    'new_tab'=>[true, false]

## PHPList
Display a list of elements.

**Use it**

    ->list(['Element 1', 'Element 2', 'Element 3'], [options ]);

**Options allowed**

    'content'=>null,
    'style'=>['alpha', 'roman', 'decimal', 'square', 'circle', 'number']

## PHPText
Display a text
**Use it**

    ->text('This is a text');

**Options allowed**

    'content'=>null,
    'text_align'=>['center', 'right', 'left']

## PHPTitle
Display a title.

**Use it**

    ->title('Title example');

**Options allowed**

    'content'=>null,
    'text_align'=>['center', 'left', 'right']
