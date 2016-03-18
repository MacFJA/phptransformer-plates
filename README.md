# Plates for PHPTransformers

[Plates](http://platesphp.com/) support for [PHPTransformers](http://github.com/phptransformers/phptransformer).

## Install

Via Composer

``` bash
$ composer require phptransformers/plates
```

## Usage

``` php
$engine = new PlatesTransformer();
echo $engine->render('Hello, {$name}!', array('name' => 'phptransformers'));
```

### Options

``` php
$engine = new PlatesTransformer(array(
    'directory' => 'path/to/the/templates', // Default to the current working directory
    'extension' => 'plates' // Extensions of templates files (default to no extention filtering)
));

// ...

$plates = new \League\Plates\Engine();
$engine = new PlatesTransformer(array(
    'plates' => $plates // All others options are ignored
));
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.