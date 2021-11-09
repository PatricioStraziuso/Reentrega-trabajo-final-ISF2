<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanente extends EmpleadoTest
{
    public function crear($nombre = "Cosme", $apellido = "Fulanito", $dni = 99999999, $salario = 5000)
    {
        $ep = new App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, new DateTime('2021-11-02'));
       return $ep;
    }
    public function testFechaIngreso()
    {
        $e = $this->crear();
        $this->assertEquals('00-11-02', date_format($e->getFechaIngreso(), 'y-m-d'));
    }

    public function testCalcularComision()
    {
        $e = $this->crear();
        $this->assertEquals('20%', $e->calcularComision());
    }

    public function testCalcularIngresoTotal()
    {
        $e = $this->crear();
        $this->assertEquals('6000', $e->calcularIngresoTotal());
    }

    public function testCalcularAntiguedad()
    {
        $e = $this->crear();
        $this->assertEquals('21', $e->calcularAntiguedad());
    }

    public function testFechaIngresoNulaAntiguedadCero()
    {
        $e = new App\EmpleadoPermanente("Cosme", "Fulanito", 99999999, 5000);
        $fecha = new \DateTime();
        $this->assertEquals(date_format($fecha, 'y-m-d'), date_format($e->getFechaIngreso(), 'y-m-d'));
        $this->assertEquals('0', $e->calcularAntiguedad());
    }

    public function testFechaDeIngresoPosteriorAActual()
    {
        $this->expectException(\Exception::class);
        $e = new App\EmpleadoPermanente("Cosme", "Fulanito", 99999999, 5000, new DateTime('2030-12-01'));
    }
}