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

    public function receivesZeroBookToLoanReturnsEmptyString()
    {
        $response =  $this->library->operations("prestar:");

        $this->assertEquals("", $response);
    }

    /**
     * @test
     *
     */
    public function receivesOneBookToLoanReturnsBook()
    {
        $response =  $this->library->operations("prestar: hola");

        $this->assertEquals("hola x1", $response);
    }
    /**
     * @test
     *
     */
    public function receivesSameBookTwiceToLoanReturnsBook()
    {
        $response =  $this->library->operations("prestar: hola 2");

        $this->assertEquals("hola x2", $response);
    }
    /**
     * @test
     *
     */
    public function receivesSameBookTwiceInDifferentOperationsToLoanReturnsBook()
    {
        $response =  $this->library->operations("prestar: hola 2");
        $response =  $this->library->operations("prestar: hola");

        $this->assertEquals("hola x3", $response);
    }
    /**
     * @test
     *
     */
    public function receivesDifferentBookToLoanReturnsBooks()
    {
        $response =  $this->library->operations("prestar: hola 2");
        $response =  $this->library->operations("prestar: paco");

        $this->assertEquals("hola x2, paco x1", $response);
    }
    /**
     * @test
     *
     */
    public function receivesClearRegisterOperationClearsAllLoanBooks()
    {
        $response =  $this->library->operations("limpiar");

        $this->assertEquals("", $response);
    }

    /**
     * @test
     *
     */
    public function receivesExistingBookToReturnItClearsFromLoanBooksList()
    {
        $response =  $this->library->operations("prestar: hola");
        $response =  $this->library->operations("devolver: hola");

        $this->assertEquals("", $response);
    }
    /**
     * @test
     *
     */
    public function receivesBookToReturnWhenItIsNotLoanedErrorMessageReturned()
    {
        $response =  $this->library->operations("devolver: hola");

        $this->assertEquals("El libro indicado no está en préstamo", $response);
    }
    /**
     * @test
     *
     */
    public function receivesLoanedOneBookToReturnItWhenTwoBooksAreLoaned()
    {
        $response =  $this->library->operations("prestar: hola 2");
        $response =  $this->library->operations("devolver: hola");

        $this->assertEquals("hola x1", $response);
    }
    /**
     * @test
     *
     */
    public function receivesNoBookToReturnItReturnsListOfLoanBooks()
    {
        $response =  $this->library->operations("prestar: hola 2");
        $response =  $this->library->operations("devolver:");

        $this->assertEquals("hola x2", $response);
    }
    /**
     * @test
     *
     */

    public function upperCaseTitleIsSameAsLowerCase()
    {
        $response =  $this->library->operations("prestar: Hola");

        $this->assertEquals("hola x1", $response);
    }
}
