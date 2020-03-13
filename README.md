![Logo](https://github.com/JuGid/PHPresentation/blob/master/docs/logo_phpresentation.png)

> This is a training project. Feel free to help me improving this by sending Pull requests

### How to use it ?
- Download files or clone this repository
- Run `composer install`
- Create your PHPresentation in `index.php` file
- Run the PHP Internal server in ~/PHPresentation `php -S localhost:8000`
- Open `http://localhost:8000` in your favorite browser

### Why PHPresentation ?
This is a training project to improve my design pattern skills and PHP knowledge.
**I will be happy if you can help me in this quest**.
PHPresentation can be used if you have a presentation to do and you don't have so much time to create it. It's easy, fast and pretty (for me it is)

### What it uses ?

 - `PHP` as main language
 - `HTML/CSS` for rendering in addition to `Twig` for templating
 - `PHPUnit` for testing (when it will be done, sorry)

### Example

    <?php
    //Necessary to import dependencies
    require_once __DIR__ . '/vendor/autoload.php';
    
    use PHPresentation\PHPresentation;
    use PHPresentation\Utils\Paginator;
    
    $presentation = new PHPresentation();
    $presentation->name('My pretty presentation');
    $presentation->author('User Name');
    $presentation->version(0,0,1);
    
    //Create a new section in the presentation
    $presentation->createSection("First section")
                 ->createSlide() //Create a new slide
                 ->title('This is a text') // Add text to the slie
                 ->text('This is another text')
                 ->text('And this is too !');
    // Get the last Section of the presentation
    $presentation->last()
                 ->createSlide()
                 ->title('You can create lists') // Add title to the slide
                 ->list(['Element 1', 'Element 2', 'Element 3']); //Add list to the slide
    $presentation->createSection("Second section")
                 ->createSlide()
                 ->title('This is a title')
                 ->block('Block titre 1', 'Block content 1') // Add block to the slide
                 ->block('Block titre 2', 'Block content 2')
                 ->block('Block titre 3', 'Block content 3')
                 ->text('And this is a text component');
    
    /**
    Paginator is a class to help navigation inside the slide. It is necesarry to render the presentation. Thanks to it, you can navigate using arrows on your keyboard.
	   */
    $paginator = new Paginator($presentation);
    $paginator->render();

### More
This is not even the first release. I have much things to do before a v1.0.0. I have a [Project](https://github.com/JuGid/PHPresentation/projects/1) to help me on Github

PHPresentation will be improved each week.

[You can also visit my website](https://jugid.Fr)

*Last thing : Sorry for my english writing skill...*

