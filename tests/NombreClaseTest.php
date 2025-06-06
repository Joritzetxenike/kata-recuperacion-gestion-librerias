<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\NombreClase;
use PHPUnit\Framework\TestCase;

class NombreClaseTest extends TestCase
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
