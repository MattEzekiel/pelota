<?php


namespace App\Models;


class Carrito
{
    public $pelotas  = null;
    public $cantidadPelotas = 0;
    public $precioPelotas = 0;

    public function __construct($oldCarrito)
    {
        if($oldCarrito){
            $this->pelotas = $oldCarrito->pelotas;
            $this->cantidadPelotas = $oldCarrito->cantidadPelotas;
            $this->precioPelotas = $oldCarrito->precioPelotas;
        }
    }

    public function add($pelota, $id)
    {
        $storedPelota = ['cantidad' => 0, 'precio' => $pelota->precio, 'item' => $pelota];
        if($this->pelotas && array_key_exists($id, $this->pelotas)) {
            $storedPelota = $this->pelotas[$id];
        }
        $storedPelota['cantidad']++;
        $storedPelota['precio'] = $pelota->precio * $storedPelota['cantidad'];
        $this->pelotas[$id] = $storedPelota;
        $this->cantidadPelotas++;
        $this->precioPelotas += $pelota->precio;
    }

    public function reduceByOne($id)
    {
        $this->pelotas[$id]['cantidad']--;
        $this->pelotas[$id]['precio'] -= $this->pelotas[$id]['item']['precio'];
        $this->cantidadPelotas--;
        $this->precioPelotas -= $this->pelotas[$id]['item']['precio'];

        if($this->pelotas[$id]['cantidad'] <= 0){
            unset($this->pelotas[$id]);
        }
    }


    public function removerPelota($id)
    {
        $this->cantidadPelotas -= $this->pelotas[$id]['cantidad'];
        $this->precioPelotas -= $this->pelotas[$id]['precio'];
        unset($this->pelotas[$id]);
    }
}
