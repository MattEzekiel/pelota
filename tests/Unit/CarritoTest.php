<?php

namespace Tests\Unit;

use App\Cart\CarritoItem;
use App\Models\Pelota;
use PHPUnit\Framework\TestCase;
use App\Cart\Carrito;

class CarritoTest extends TestCase
{
    protected $carrito;

    protected function setUp(): void
    {
        $this->carrito = new Carrito;
    }

    public function test_agregar_pelota(): void
    {
        $carritoItem  = $this->crearPelota(1,50000);
        $this->carrito->agregarPelota($carritoItem);

        $this->assertCount(1,$this->carrito->getPelotas());
        $this->assertEquals($carritoItem,$this->carrito->getPelotas()[0]);
    }

    public function test_agregar_pelotas_dos_distintas(): void
    {
        $carritoItem  = $this->crearPelota(1,50000);
        $this->carrito->agregarPelota($carritoItem);

        $carritoItem2  = $this->crearPelota(2,80000);
        $this->carrito->agregarPelota($carritoItem2);

        $this->assertCount(2,$this->carrito->getPelotas());
        $this->assertEquals($carritoItem,$this->carrito->getPelotas()[0]);
        $this->assertEquals($carritoItem2,$this->carrito->getPelotas()[1]);
    }

    public function test_agregar_pelotas_dos_iguales(): void
    {
        $carritoItem  = $this->crearPelota(1,50000);
        $this->carrito->agregarPelota($carritoItem);

        $carritoItem2  = $this->crearPelota(1,50000);
        $this->carrito->agregarPelota($carritoItem2);

        $this->assertCount(1,$this->carrito->getPelotas());
        $this->assertEquals(1, $this->carrito->getPelotas()[0]->getProducto()->id);
        $this->assertEquals(2, $this->carrito->getPelotas()[0]->getCantidad());
    }

    public function test_quitar_pelota(): void
    {
        $carritoItem  = $this->crearPelota(1,50000);
        $this->carrito->agregarPelota($carritoItem);

        $this->carrito->quitarPelota(1);

        $this->assertCount(0, $this->carrito->getPelotas());
    }

    public function test_quitar_pelota_que_no_remueva_una_pelota_no_incluida(): void
    {
        $carritoItem  = $this->crearPelota(1,50000);
        $this->carrito->agregarPelota($carritoItem);

        $this->carrito->quitarPelota(4);

        $this->assertCount(1, $this->carrito->getPelotas());
    }

    public function test_get_total_de_todo_el_carrito(): void
    {
        $valor1 = 50000;
        $valor2 = 80000;
        $valor3 = 50000;

        $carritoItem  = $this->crearPelota(1,$valor1);
        $carritoItem2  = $this->crearPelota(2,$valor2);
        $carritoItem3  = $this->crearPelota(1,$valor3);

        $this->carrito->agregarPelota($carritoItem);
        $this->carrito->agregarPelota($carritoItem2);
        $this->carrito->agregarPelota($carritoItem3);

        $total = $this->carrito->getTotal();

        $totalEsperado = $valor1 + $valor2 + $valor3;
        $this->assertEquals($totalEsperado,$total);
    }

    public function crearPelota($id,$precio): CarritoItem
    {
        $carritoItem = new CarritoItem();
        $pelota = new Pelota();
        $pelota->id = $id;
        $pelota->precio = $precio;
        $carritoItem->setProducto($pelota);
        return $carritoItem;
    }
}
