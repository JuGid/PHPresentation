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

### What does it use ?

 - `PHP` as main language
 - `HTML/CSS` for rendering in addition to `Twig` for templating
 - `PHPUnit` for testing (when it will be done, sorry)

### Example

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

### Documentation

You can find the minimalist documentation here : [PHPresentation docs website](https://jugid.github.io/PHPresentation/)
### More
This is not even the first release. I have much things to do before a v1.0.0. I have a [Project](https://github.com/JuGid/PHPresentation/projects/1) to help me on Github

PHPresentation will be improved each week.

[You can also visit my website](https://jugid.Fr)

*Last thing : Sorry for my english writing skill...*

