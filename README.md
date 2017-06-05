## Cookie
Cookie Library for Cable Framework


```php 
$container = \Cable\Container\Factory::create();
$container->add('request', \Symfony\Component\HttpFoundation\Request::createFromGlobals());

$container->addProvider(\Cable\Cookie\CookieServiceProvider::class);
$container->singleton('response', \Symfony\Component\HttpFoundation\Response::create());
$cookie = $container['cookie'];

var_dump($cookie);


```

## Session

```php 

$container = \Cable\Container\Factory::create();

$container->addProvider(\Cable\Session\SessionServiceProvider::class);
$container->singleton('response', \Symfony\Component\HttpFoundation\Response::create());
$session = $container['session'];

$flash = $container['flashbag'];

```