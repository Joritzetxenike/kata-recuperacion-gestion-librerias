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
    public function prueba()
    {
        $nombreClase = new NombreClase();

        $response = $nombreClase->unoEsUno();

        $this->assertEquals(1,$response);
    }

}
