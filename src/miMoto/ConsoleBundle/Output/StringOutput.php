<?php

/*
 * This file is part of the ConsoleBundle.
 *
 * (c) Laszlo Korte <me@laszlokorte.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace miMoto\ConsoleBundle\Output;

use Symfony\Component\Console\Output\Output;


/**
 * StringOutput
 *
 * Collects console output into a string.
 */
class StringOutput extends Output
{
    protected $buffer = '';

    public function doWrite($message, $newline)
    {
        $this->buffer .= $message . ($newline===TRUE ? PHP_EOL : '');
    }

    public function getBuffer() {
        return $this->buffer;
    }
}
