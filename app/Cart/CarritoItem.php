<?php


namespace App\Cart;


class CarritoItem
{
    protected $pelota;
    /**
     * @var int
     */
    private $cantidad;

    public function setProducto($pelota): void
    {
        $this->pelota = $pelota;
        $this->cantidad = $this->cantidad ?? 1;
    }

    public function getProducto()
    {
        return $this->pelota;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getSubtotal()
    {
        return $this->getProducto()->precio * $this->getCantidad();
    }
}
