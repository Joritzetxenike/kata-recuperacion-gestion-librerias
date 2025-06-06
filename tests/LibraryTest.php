<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Library;
use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase
{
    /**
     * @test
     *
     */
    public function receivesZeroBookReturnsEmptyString()
    {
        $library = new Library();

        $response = $library->operations("prestar:");

        $this->assertEquals("", $response);
    }

    /**
     * @test
     *
     */
    public function receivesOneBookReturnsBook()
    {
        $library = new Library();

        $response = $library->operations("prestar: hola");

        $this->assertEquals("hola x1", $response);
    }

}
