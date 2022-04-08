<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ordenes;
//use PHPUnit\Framework\TestCase;

class EstadisticasTest extends TestCase
{
    public function test_cantidad_de_ventas()
    {
        $ordenes = new Ordenes;
        $this->assertGreaterThan(6,$ordenes->cantidadDeVentas());
        $this->assertIsInt($ordenes->cantidadDeVentas());
    }

    public function test_total_de_ventas()
    {
        $ordenes = new Ordenes;
        $this->assertGreaterThan(15000,$ordenes->totalVentas());
        $this->assertIsNumeric($ordenes->totalVentas());
    }

    public function test_cantidad_de_ventas_hoy()
    {
        $ordenes = new Ordenes;
        $this->assertIsInt($ordenes->cantidadVentasHoy());
    }

    public function test_total_de_ventas_de_hoy()
    {
        $ordenes = new Ordenes;
        $this->assertIsNumeric($ordenes->totalVentasHoy());
    }
}
