<?php


namespace App\Cart;


class Carrito
{
    /**
     * @var array|CarritoItem[]
     */
    protected $pelotas = [];

    /**
     * @param CarritoItem $nuevaPelota
     */
    public function agregarPelota(CarritoItem $nuevaPelota): void
    {
        foreach ($this->pelotas as $key => $pelota){
            if($pelota->getProducto()->id === $nuevaPelota->getProducto()->id){
                $pelota->setCantidad($pelota->getCantidad() + 1);
                return;
            }
        }
        $this->pelotas[] = $nuevaPelota;
    }

    /**
     * @return array|CarritoItem[]
     */
    public function getPelotas() : array
    {
        return $this->pelotas;
    }

    /**
     * @param $id
     */
    public function quitarPelota($id): void
    {
        foreach ($this->pelotas as $key => $pelota){
            if($pelota->getProducto()->id === $id){
                unset($this->pelotas[$key]);
                $this->pelotas =  array_values($this->pelotas);
            }
        }
    }

    /**
     * @return float|int
     */
    public function getTotal()
    {
       $total =  0;
       foreach ($this->pelotas as $pelota){
           $total += $pelota->getSubtotal();
       }
       return $total;
    }
}
