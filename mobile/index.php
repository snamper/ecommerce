<?php

/**
 * ECTouch E-Commerce Project
 *
 * @package  ECTouch
 * @author   Carson <docxcn@gmail.com>
 */

define('IN_ECTOUCH', true);
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Application Configuration
|--------------------------------------------------------------------------
*/

require __DIR__ . '/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/

base\App::run();
