<?php

namespace NG\Model;

class AbstractBeanTest extends \PHPUnit_Framework_TestCase {
    public function testBean() {
        $data = new \stdClass();
        $data->foo = 'bar';
        $bean = new Test($data);
        $this->assertEquals('bar', $bean->foo);
        $this->assertNull($bean->bar);
        $this->setExpectedException('Exception');
        $bean->bar = 'baz';
    }
}