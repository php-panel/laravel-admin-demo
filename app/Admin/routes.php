<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\EditorsController;
use Ladmin\Facades\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');

    $router->resources([

        'tags'                  => \App\Admin\Controllers\TagController::class,
        'users'                 => \App\Admin\Controllers\UserController::class,
        'images'                => \App\Admin\Controllers\ImageController::class,
        'posts'                 => \App\Admin\Controllers\PostController::class,
        'post-comments'         => \App\Admin\Controllers\PostCommentController::class,
        'videos'                => \App\Admin\Controllers\VideoController::class,
        'articles'              => \App\Admin\Controllers\ArticleController::class,
        'painters'              => \App\Admin\Controllers\PainterController::class,
        'categories'            => \App\Admin\Controllers\CategoryController::class,
        'messages'              => \App\Admin\Controllers\MessageController::class,
        'multiple-images'       => \App\Admin\Controllers\MultipleImageController::class,

        'movies/in-theaters'    => \App\Admin\Controllers\Movies\InTheaterController::class,
        'movies/coming-soon'    => \App\Admin\Controllers\Movies\ComingSoonController::class,
        'movies/top250'         => \App\Admin\Controllers\Movies\Top250Controller::class,

        'world/country'         => \App\Admin\Controllers\World\CountryController::class,
        'world/city'            => \App\Admin\Controllers\World\CityController::class,
        'world/language'        => \App\Admin\Controllers\World\LanguageController::class,

        'china/province'        => \App\Admin\Controllers\China\ProvinceController::class,
        'china/city'            => \App\Admin\Controllers\China\CityController::class,
        'china/district'        => \App\Admin\Controllers\China\DistrictController::class,

        'subway/cities'         => \App\Admin\Controllers\Subway\CityController::class,
        'subway/lines'          => \App\Admin\Controllers\Subway\LineController::class,
        'subway/stops'          => \App\Admin\Controllers\Subway\StopController::class,

        'documents'             => \App\Admin\Controllers\DocumentController::class,
    ]);

    $router->group(['prefix' => 'editors'], function ($router) {
        $router->get('markdown',    EditorsController::class . '@markdown');
        $router->get('wang-editor', EditorsController::class . '@wangEditor');
        $router->get('summernote', EditorsController::class . '@summernote');
        $router->get('json', EditorsController::class . '@json');
    });

    $router->group(['prefix' => 'code-mirror'], function ($router) {
        $router->get('clike', \App\Admin\Controllers\CodemirrorController::class . '@clike');
        $router->get('php', \App\Admin\Controllers\CodemirrorController::class . '@php');
        $router->get('js', \App\Admin\Controllers\CodemirrorController::class . '@js');
        $router->get('python', \App\Admin\Controllers\CodemirrorController::class . '@python');
    });

    $router->group(['prefix' => 'lightbox'], function ($router) {
        $router->get('lightbox', \App\Admin\Controllers\LightboxController::class . '@lightbox');
        $router->get('gallery', \App\Admin\Controllers\LightboxController::class . '@gallery');
    });

    $router->post('posts/release', \App\Admin\Controllers\PostController::class . '@release');
    $router->post('posts/restore', \App\Admin\Controllers\PostController::class . '@restore');
    $router->get('api/users', \App\Admin\Controllers\PostController::class . '@users');

    $router->get('china/cascading-select', \App\Admin\Controllers\China\ChinaController::class . '@cascading');

    $router->get('api/world/cities', \App\Admin\Controllers\World\ApiController::class . '@cities');
    $router->get('api/world/countries', \App\Admin\Controllers\World\ApiController::class . '@countries');
    $router->get('api/china/city', \App\Admin\Controllers\China\ChinaController::class . '@city');
    $router->get('api/china/district', \App\Admin\Controllers\China\ChinaController::class . '@district');

    $router->get('forms/form-1', \App\Admin\Controllers\FormController::class . '@form1');
    $router->get('forms/form-2', \App\Admin\Controllers\FormController::class . '@form2');
    $router->get('forms/form-3', \App\Admin\Controllers\FormController::class . '@form3');
    $router->get('forms/form-4', \App\Admin\Controllers\FormController::class . '@form4');
    $router->get('forms/settings', \App\Admin\Controllers\FormController::class . '@settings');
    $router->get('forms/register', \App\Admin\Controllers\FormController::class . '@register');

    $router->get('widgets/table', \App\Admin\Controllers\WidgetsController::class . '@table');
    $router->get('widgets/box', \App\Admin\Controllers\WidgetsController::class . '@box');
    $router->get('widgets/info-box', \App\Admin\Controllers\WidgetsController::class . '@infoBox');
    $router->get('widgets/tab', \App\Admin\Controllers\WidgetsController::class . '@tab');
    $router->get('widgets/notice', \App\Admin\Controllers\WidgetsController::class . '@notice');
    $router->get('widgets/editors', \App\Admin\Controllers\WidgetsController::class . '@editors');



    $router->get('chartjs', \App\Admin\Controllers\ChartjsController::class . '@index');
});
