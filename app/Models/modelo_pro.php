<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelo_pro extends Model
{
    protected $table="tblproductos";
    protected $filable=['id','vchnombre_producto','intexistencia','fltpresio','Foto','id_user'];
    protected $primarykey='id';
    public $timestamps=false;
}
