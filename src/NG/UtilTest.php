<?php

namespace NG;

class UtilTest extends \PHPUnit_Framework_TestCase {
    public function testGetKey() {
        $arr = ['foo' => 'bar'];
        $this->assertNull(Util::getKey($arr, null));
        $this->assertNull(Util::getKey($arr, ''));
        $this->assertNull(Util::getKey($arr, 'bar'));
        $this->assertEquals('bar', Util::getKey($arr, 'foo'));
    }
}