<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest
{
  public function crear($nombre = "Cosme", $apellido = "Fulanito", $dni = 99999999, $salario = 5000, $array = array(25, 25, 40))
  {
      $ev = new App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $arry);
      return $ev;
  }
  public function testCalcularComision()
  {
      $e = $this->crear();
      $this->assertEquals(1.5, $e->calcularComision());
  }
  public function testCalcularIngresoTotal()
  {
      $e = $this->crear();
      $this->assertEquals(5001.5, $e->calcularIngresoTotal());
  }
  public function testMontoVentasNegativo()
  {
      $this->expectException(\Exception::class);
      $e = $this->crear("Cosme", "Fulanito", 99999999, 5000, array(25, -25, 40));
  }
}

