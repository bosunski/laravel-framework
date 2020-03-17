<?php
require "vendor/autoload.php";

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use React\MySQL\QueryResult;

global $container;
$container = new Container;

global $loop;
$container->instance(LoopInterface::class, $loop = Factory::create());
$factory = new \React\MySQL\Factory($loop);

global $connection;
$connection = $factory->createLazyConnection('root:@localhost/iot');

$capsule = new Capsule($container);

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'iot',
    'username'  => 'root',
    'password'  => 'sfsafsf',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
//$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

//Capsule::schema()->create('users', function (Blueprint $table) {
//    $table->increments('id');
//    $table->string('email')->unique();
//    $table->timestamps();
//});

class User extends Illuminate\Database\Eloquent\Model {
    protected $hidden = [
        'id',
    ];
}

//$loop->addTimer(1, function () {
//            $user = User::where('emailx', 'bosunski@gmail.com')->first()
//                ->then(function (User $user) {
//                    var_dump($user['name']);
//                });
//});

$user = User::all()
    ->then(function (Collection $user) {
        var_dump($user);
    }, function ($e) {
        var_dump($e->getMessage());
    });

echo "dfgdfg";

//$loop->addTimer(1, function () {
//    echo "Something Adawatt", PHP_EOL;
//});


$loop->run();
