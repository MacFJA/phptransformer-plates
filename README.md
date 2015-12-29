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
echo $engine->render('Hello, {$name}!', array('name' => 'phptransformers');
```

### Options

``` php
$engine = new PlatesTransformer(array(
    'directory' => 'path/to/the/templates', // Default to the system temporary directory
    'extension' => 'plates' // Extensions of templates files (Plates' default: "php")
));

// ...

$plates = new \League\Plates\Engine();
$engine = new PlatesTransformer(array(
    'plates' => $plates // All others options are ignored
));
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.