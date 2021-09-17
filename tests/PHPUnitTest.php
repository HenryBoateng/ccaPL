<?php
use Mockery as m;
use PHPUnitTest\Framework\TestCase;

class PHPUnitTest extends \PHPUnit\Framework\TestCase{
public function testMatch(){

$language = "cca";

$this ->assertEquals($language, "cca");

}
public function testMatchTwo(){

$language = "ccag";

$this ->assertEquals($language, "ccag");

}

public function testMatchThree(){

$language = "ccagx";

$this ->assertEquals($language, "ccagx");

}
}
 ?>
