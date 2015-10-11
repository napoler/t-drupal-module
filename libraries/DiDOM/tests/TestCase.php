<?php

namespace Tests;

use PHPUnit_Framework_TestCase;
use DOMDocument;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    public function tearDown()
    {
        if (class_exists('Mockery')) {
            \Mockery::close();
        }
    }

    public function loadFixture($filename)
    {
        $path = __DIR__.'/fixtures/'.$filename;

        if (file_exists($path)) {
            return file_get_contents($path);
        }

        return null;
    }

    public function createDomElement($name, $value = '', $attributes = [])
    {
        $document   = new DOMDocument('1.0', 'utf-8');
        $domElement = $document->createElement($name, $value);

        foreach ($attributes as $name => $value) {
            $domElement->setAttribute($name, $value);
        }

        return $domElement;
    }
}
