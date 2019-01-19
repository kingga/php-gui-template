# PHP GUI Framework Boiler Plate
Until I can get around to writing an installer for this, please just download the repository.

## Setup
**Download**
```bash
git clone https://github.com/kingga/php-gui-template
cd php-gui-template
rm -rf .git # Linux/OS X
del /F /S /Q /A .git # Windows
rmdir .git # Windows
composer install
```

**Run**
```bash
php app.php
## Or for PHAR file.
php app.phar
```

**Build**
```bash
php gtool build
```

___

## Overview
I'm not going to go into detail about MVC's as I expect you have some knowledge about them but I will give you a very simple idea of what they are.

### Helpers
This boiler plate comes with a command line tool which allows you to quickly make things with your application. One command you may be familiar with already is the `build` command. Some other useful commands include:

```bash
# NOTE: Long descriptions are optional.
php gtool make controller ControllerName "Long Description"
php gtool make model ModelName "Long Description"
```

### M - Model
**The layer between the application and the database**

To create a model, navigate to the Classes/Models directory and create a new file, ideally this should be named after the table. E.g. AppInfo becomes app_info. Add this basic structure to the file:

```php
<?php
namespace Classes\Models;

use Kingga\Gui\Database\Model;

class TableName extends Model
{
}

```

On the odd case where you might want to name the class something other than the table you can define the property 'table'. E.g.

```php
class FooModel extends Model
{
    protected $table = 'foo';
}
```

### V - View
**The design/visible section of the code, e.g. an HTML file**

Views are still a work in progress but they are currently my main priority after other work commitments. To create a basic view, go into the `resources/views` directory and create a new file named `first.view.xml` and fill it with the following content.

```xml
<use class="Gui\Components\Window"></use>
<use class="Gui\Components\Label"></use>
<Window width="640" height="480" title="Hello, view!">
    <Label left="10" top="10">Hello, world!</Label>
</Window>
```

Then call it using the renderers `render` method.

```php
$renderer->render('first');

// Or in a controller.
$request->getRenderer()->render('first');
```

### C - Controller
**Controllers control the flow of the application**

The final piece of the puzzle is the controller; to create a controller navigate to the `Classes/Controllers` folder and add a new file `FirstController.php` and the following content to it.

```php
<?php

namespace Classes\Controllers;

use Kingga\Gui\Routing\Request;

class FirstController
{
    public function index(Request $request)
    {
        $request->getRenderer()->render('first');
    }
}

```

Now to actually run this go to your `routes.php` file in the base directory and add the following.

```php
$router->create(function (RouteGroup $group) {
    // ...
    $group->route('first', 'FirstController@index');
    // ...
});
```

And then call the route from within the `MainController@main` method.

***Note: that the main route is the starting point of the application.***

```php
class MainController
{
    public function main(Request $request)
    {
        $request->getRouter()->handle('first');
    }

    // ...
}
```

Now try to run your application.

___

## TODO
* A more details tutorial for each area needs to be built.
