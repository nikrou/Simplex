Simplex
=======

# Create your own framework... on top of the Symfony2 Components

This repository is based off the tutorial by [Fabien Potencier](https://github.com/fabpot) entitled "Create your own framework... on top of the Symfony2 Components."

That tutorial is divided in 12 parts. Each part is tagged using version number such as part-1, part-2 and so on.
The idea is to create your own framework, testing it with [atoum](https://github.com/atoum/atoum).

Requirements
------------

This project use severals librairies that need at least PHP 5.3.0

Installation
------------

Clone this repository :
```
$ git clone git@github.com:nikrou/phyxo.git
```

Download the [`composer.phar`](https://getcomposer.org/composer.phar) executable or use the installer.

```
$ curl -sS https://getcomposer.org/installer | php
```

Update dependencies via composer :
```
$ composer.phar install
```

Run
---

You can access each part of the tutorial with (example part 3) :
```
$ git checkout -f part-3
```

Changes
-------

That tutorial is tested with [atoum](https://github.com/atoum/atoum) instead of PHPUnit.

Tests
-----

You can run tests (starting from part 8) :
```
$ ./bin/atoum
```

Content
-------
### part 1 - Why would you like to create your own framework?

### part 2 - The HttpFoundation Component

### part 3 - The Front Controller

### part 4 - The Routing Component

### part 5 - Templating

### part 6 - The HttpKernel Component: the Controller Resolver

### part 7 - The Separation of Concerns

### part 8 - Unit Testing

### part 9 - The EventDispatcher Component

### part 10 - The HttpKernel Component: HttpKernelInterface

### part 11 - The HttpKernel Component: The HttpKernel Class

### part 12 - The DependencyInjection Component
