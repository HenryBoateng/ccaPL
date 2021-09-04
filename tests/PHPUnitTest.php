<?php
use Mockery as m;
use PHPUnitTest\Framework\TestCase;

class PHPUnitTest extends \PHPUnit\Framework\TestCase{

public function testStrMatch()
{
  require 'compiler.php';

  $random = 'cca';

  $this->assertMatch ($output, shell_exec(
      "$ccaJFP -e $filePath 2>&1");
}
 ?>
