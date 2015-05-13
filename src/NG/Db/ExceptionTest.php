<?php

namespace NG\Db;

class ExceptionTest extends \PHPUnit_Framework_TestCase {
    public function testException()
    {
        $e = new Exception('foo', 'bar');
        $this->assertEquals('foo', $e->getMessage());
        $this->assertEquals('bar', $e->getQuery());
        $this->assertEquals(0, $e->getCode());
    }
}