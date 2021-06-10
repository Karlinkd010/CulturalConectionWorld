<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelo_artesano extends Model
{
    protected $table='tblartesanos';
    protected $filas=['intid_artesano','vchnombre','vchapellidoP','vchapellidoM','vchdireccion','vchtelefono','vchcorreo_electronico','vchCurp','vchRFC','vchcodigo_postal','Foto'];
    protected $primarykey='intid_artesano';
    public $timestamps=false;
}
