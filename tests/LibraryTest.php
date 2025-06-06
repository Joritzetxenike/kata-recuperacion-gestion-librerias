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

    public function receivesNoBookToLoanReturnsEmptyString()
    {
        $this->assertEquals("", $this->library->operations("prestar"));
    }

    /**
     * @test
     *
     */
    public function receivesOneBookToLoanReturnsListOfLoanedBooks()
    {
        $this->assertEquals("hola x1", $this->library->operations("prestar hola"));
    }
    /**
     * @test
     *
     */
    public function receivesSameBookTwiceToLoanReturnsListOfLoanedBooks()
    {
        $this->assertEquals("hola x2", $this->library->operations("prestar hola 2"));
    }
    /**
     * @test
     *
     */
    public function receivesSameBookTwiceInDifferentOperationsToLoanReturnsListOfLoanedBooks()
    {
        $this->library->operations("prestar hola 2");

        $this->assertEquals("hola x3", $this->library->operations("prestar hola"));
    }
    /**
     * @test
     *
     */
    public function receivesDifferentBookToLoanReturnsListOfLoanedBooks()
    {
        $this->library->operations("prestar hola 2");

        $this->assertEquals("hola x2, paco x1", $this->library->operations("prestar paco"));
    }
    /**
     * @test
     *
     */
    public function receivesClearRegisterOperationClearsAllLoanedBooks()
    {
        $this->assertEquals("", $this->library->operations("limpiar"));
    }

    /**
     * @test
     *
     */
    public function receivesExistingBookToReturnItClearsFromLoanedBooksList()
    {
        $this->library->operations("prestar hola");

        $this->assertEquals("", $this->library->operations("devolver hola"));
    }
    /**
     * @test
     *
     */
    public function receivesBookToReturnWhenItIsNotLoanedErrorMessageReturned()
    {
        $this->assertEquals("El libro indicado no está en préstamo", $this->library->operations("devolver hola"));
    }
    /**
     * @test
     *
     */
    public function receivesLoanedOneBookToReturnItWhenTwoBooksAreLoaned()
    {
        $this->library->operations("prestar hola 2");

        $this->assertEquals("hola x1", $this->library->operations("devolver hola"));
    }
    /**
     * @test
     *
     */
    public function receivesNoBookToReturnItReturnsListOfLoanedBooks()
    {
        $this->library->operations("prestar: hola 2");

        $this->assertEquals("hola x2", $this->library->operations("devolver"));
    }
    /**
     * @test
     *
     */

    public function upperCaseTitleIsSameAsLowerCase()
    {
        $this->assertEquals("hola x1", $this->library->operations("prestar: Hola"));
    }
}
