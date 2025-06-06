<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Library;
use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase
{
    private Library $library;
    protected function setUp(): void
    {
        parent::setUp();
        $this->library = new Library();
    }

    /**
     * @test
     *
     */

    public function receivesZeroBookReturnsEmptyString()
    {
        $response =  $this->library->operations("prestar:");

        $this->assertEquals("", $response);
    }

    /**
     * @test
     *
     */
    public function receivesOneBookReturnsBook()
    {
        $response =  $this->library->operations("prestar: hola");

        $this->assertEquals("hola x1", $response);
    }
    /**
     * @test
     *
     */
    public function receivesSameBookTwiceReturnsBook()
    {
        $response =  $this->library->operations("prestar: hola 2");

        $this->assertEquals("hola x2", $response);
    }
    /**
     * @test
     *
     */
    public function receivesSameBookTwiceInDifferentOperationsReturnsBook()
    {
        $response =  $this->library->operations("prestar: hola 2");
        $response =  $this->library->operations("prestar: hola");

        $this->assertEquals("hola x3", $response);
    }



}
