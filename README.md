# Prison Latch

![PrisonLatch](http://www.resizer.es/photos/chema2.png "PrisonLatch")

## Installation

Clone the repository.

	https://github.com/fourcoders/prison-latch.git

Go to the directory.

	cd prison-latch

Download composer (Only if you don´t have it).

	curl -sS https://getcomposer.org/installer | php

Execute composer for dependences.

	php composer.phar install

Create database and generate the scheme.

	php app/console doctrine:database:create
	php app/console doctrine:schema:update --force

Load the default questions.

	php app/console latch:questions:load

Run with the embed php server.

	cd web
	php -S localhost:8000

Visit in your prefer browser.

	http://localhost:8000 

## TRY IT NOW

## http://www.fourcoders.com/prison-latch
