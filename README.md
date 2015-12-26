# Plates for PHPTransformers

[Plates](http://platesphp.com/) support for [PHPTransformers](http://github.com/phptransformers/phptransformer).

## Install

Via Composer

``` bash
$ composer require macfja/phptransformer-plates
```

## Usage

``` php
$engine = new PlatesTransformer();
echo $engine->render('Hello, {$name}!', array('name' => 'phptransformers');
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.