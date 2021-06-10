<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelopedido extends Model
{
    
    protected $table="tblpedidos";
    protected $filable=['intid_pedido','ciudad','estado','municipio','colonia','descripcion','intcantidad','fltprecio','id_usuario','id_pro'];
    protected $primarykey='intid_pedido';
    public $timestamps=false;

}
