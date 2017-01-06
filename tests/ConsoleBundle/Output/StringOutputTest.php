<?php

/*
 * This file is part of the ConsoleBundle.
 *
 * (c) Laszlo Korte <me@laszlokorte.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\ConsoleBundle\Output;

use miMoto\ConsoleBundle\Output\StringOutput;

class StringOutputTest extends \PHPUnit_Framework_TestCase
{

    public function testWriteRead()
    {
        $output = new StringOutput();

        $text = 'foo';

        $output->write($text);
        $this->assertSame($text, $output->getBuffer(), 'Output gets buffered');
    }

}