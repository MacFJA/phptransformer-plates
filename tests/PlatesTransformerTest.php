<?php

namespace PhpTransformers\Plates\Test;


use League\Plates\Engine;
use PhpTransformers\Plates\PlatesTransformer;

class PlatesTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $engine = new PlatesTransformer();
        $this->assertEquals('plates', $engine->getName());
    }

    public function testRenderFile()
    {
        $engine = new PlatesTransformer(array('directory' => 'tests/Fixtures'));

        $actual = $engine->renderFile('template', array('name' => 'Linus'));

        $this->assertEquals('Hello, Linus!', $actual);
    }

    public function testRender()
    {
        $engine = new PlatesTransformer();

        $actual = $engine->render(
            file_get_contents('tests/Fixtures/template.php'),
            array('name' => 'Linus')
        );

        $this->assertEquals('Hello, Linus!', $actual);
    }

    public function testConstructor()
    {
        $plates = new Engine(getcwd());

        $engine = new PlatesTransformer(array('plates' => $plates));

        $actual = $engine->renderFile('tests/Fixtures/template', array('name' => 'Linus'));

        $this->assertEquals('Hello, Linus!', $actual);
    }

    public function testExtension()
    {
        $engine = new PlatesTransformer(array('directory' => getcwd(), 'extension' => 'plates'));

        $actual = $engine->renderFile('tests/Fixtures/template', array('name' => 'Linus'));

        $this->assertEquals('Hello, Linus!', $actual);
    }
}
