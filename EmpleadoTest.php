<?php

abstract class EmpleadoTest extends \PHPunit\Framework\TestCase
{ 
    public function testSePuedeObtenerNombreApellido(){
    $e = $this->crear("Cosme", "Fulanito");
    $this->assertEquals("Cosme Fulanito", $e->getNombreApellido());
}
    public function testSePuedeObetenerDNI(){
        $e = $this->crear();
        $this->assertEquals("99999999", $e->getDNI());
    }
    public function testSePuedeObetenerSalario(){
        $e = $this->crear();
        $this->assertEquals("5000", $e->getSalario());    
    }
    public function testSePuedeSetearyObtenerSector(){
        $e = $this->crear();
        $e->setSector('Sector');
        $this->asserEquals("Sector", $e->getSector());
    }
    public function testToString(){
        $e = $this->crear();
        $this->assertequals("Cosme Fulanito 99999999 5000", $e->_toString());
    }
    public function testNoSePuedeConstruirSinNombreEmpleado(){
        $this->expectException(\Exception::class);
        $e = $this->crear('');
    }
    public function testNoSePuedeContruirSinApellidoEmpleado(){
        $this->expectException(\Exception::class);
        $e = $this->crear('Cosme', '');
    }
    public function testNoSePuedeConstruirSinDNIEmpleado(){
        $this->exceptException(\Exception::class);
        $e = $this->crear('Cosme', 'Fulanito', '');
    }
    public function testNoSePuedeConstruirSinSalarioEmpleado(){
        $this->exceptException(\Exception::class);
        $e = $this->crear('Cosme', 'Fulanito', '99999999', '');
    }
    public function testDNINoSePuedenUsarLetras(){
        $this->exceptException(\Exception::class);
        $e = $this->crear('Cosme', 'Fulanito', 'Prueba');
    }
    public function testDNINoSePuedenUsarCaracteresEspeciales(){
        $this->exceptException(\Exception::class);
        $e = $this->crear('Cosme', 'Fulanito', '&%@#');
    }
    public function testSectorNoEspecificado(){
       $e = $this->crear();
       $this->assertEquals("No especificado", $e->getSector());
    }
}
