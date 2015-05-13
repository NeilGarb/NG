<?php

namespace NG\Validate;

class EmailTest extends \PHPUnit_Framework_TestCase {
    public function testIsValid() {
        $email = new Email();
        $this->assertFalse($email->isValid(null));
        $this->assertFalse($email->isValid(''));
        $this->assertFalse($email->isValid('foo'));
        $this->assertFalse($email->isValid('foo@'));
        $this->assertFalse($email->isValid('foo@bar'));
        $this->assertFalse($email->isValid('foo@bar.'));
        $this->assertFalse($email->isValid('foo@.bar'));
        $this->assertFalse($email->isValid('foo@.bar.baz'));
        $this->assertFalse($email->isValid('@bar.baz'));
        $this->assertFalse($email->isValid('foo qux@bar.baz'));
        $this->assertFalse($email->isValid(' foo@bar.baz'));
        $this->assertFalse($email->isValid('foo@bar.baz '));
        $this->assertTrue($email->isValid('foo@bar.baz'));
        $this->assertTrue($email->isValid('foo+comment@bar.baz'));
        $this->assertTrue($email->isValid('123456@bar.baz'));
    }
}