<?php

namespace Tests\Unit;

use App\Cart\CarritoItem;
use App\Models\Pelota;
use PHPUnit\Framework\TestCase;

/**
 * @property  item
 */
class CarritoItemTest extends TestCase
{
    /**@var CarritoItem*/
    protected $carrito;
    private $item;

    protected function setUp(): void
    {
        $this->item = new CarritoItem();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertInstanceOf(CarritoItem::class, $this->item);
    }

    public function test_set_pelota_to_carrito()
    {
        $pelota = $this->getPelota();

        $this->item->setProducto($pelota);

        $this->assertEquals($pelota,$this->item->getProducto());
    }

    public function test_carrito_vacio_default_cantidad_uno()
    {
        $pelota = $this->getPelota();

        $this->item->setProducto($pelota);

        $this->assertEquals(1,$this->item->getCantidad());
    }

    public function test_set_cantidad()
    {
        $esperado = 3;

        $this->item->setCantidad($esperado);

        $this->assertEquals($esperado,$this->item->getCantidad());
    }

    public function test_subtotal()
    {
        $pelota = $this->getPelota();

        $esperado = 6;

        $this->item->setProducto($pelota);
        $this->item->setCantidad($esperado);

        $subtotal = $this->item->getSubtotal();

        $this->assertEquals($esperado * $pelota->precio,$subtotal);
    }

    public function getPelota()
    {
        $pelota = new Pelota();
        $pelota->id = 1;
        $pelota->precio = 250000;
        return $pelota;
    }
}
