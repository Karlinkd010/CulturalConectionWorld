<?php

namespace App\Http\Controllers;

use App\Models\modelo_artesano;
use App\Models\modelo_pro;
use App\Models\modelopedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ventaa()
    {
        return view('venta.index');
    }
    public function compra(){
        $modelo_pedido= DB::table('tblpedidos')
        ->join('bd_sistema.users','tblpedidos.id_usuario','=','users.id')
       // `tblpedidos`.`id_pro` = `tblproductos`.`id`
        ->join('bd_sistema.tblproductos','tblpedidos.id_pro','=','tblproductos.id')
        ->where('id_user','=',Auth::user()->id)
        ->select( 
            'tblproductos.vchnombre_producto'
            , 'tblpedidos.ciudad'
            , 'tblpedidos.fltprecio'
            , 'tblpedidos.intcantidad'
            , 'users.name'
            )->get();
///'tblproductos.vchnombre_producto','tblpedidos.ciudad', 'tblpedidos.fltprecio','tblpedidos.intcantidad','users.name'
       
            
           // 'tblproductos.id','vchnombre_producto' ,'intexistencia' ,'tblproductos.Foto','users.name','users.email')
        
       // $modelo_pro=modelopedido::all();
        return view('compra.index',compact('modelo_pedido'));
    }
    public function producto(){
     // $mo= tblproducto()->id;
        $modelo_pro= DB::table('tblproductos')
        ->join('users','tblproductos.id_user','=','users.id')
        ->where('id_user','=',Auth::user()->id)
        ->select( 'tblproductos.id','vchnombre_producto' ,'intexistencia' ,'tblproductos.Foto','users.name','users.email')
        ->get();
       // SELECT `intid_productos` ,`vchnombre_producto` ,`intexistencia` ,`tblproductos`.`Foto`,tblartesanos.`vchnombre`  FROM  tblproductos 
        //INNER JOIN `tblartesanos`
//ON `tblproductos`.`fkintid_artesano`=`tblartesanos`.`intid_artesano` WHERE fkintid_artesano=11;
        $produ=modelo_pro::all();   
         
        //  Auth:  tblproductos()->fkintidtblproductos_artesano=4
        //Auth::user()->id
        
       
        return view('producto.index',compact("modelo_pro"));
 
    }
    /*public function agrega(Request $request){
        $produ=modelo_pro::all();
        $arte=modelo_artesano::all();
        $agregapro=new modelo_pro;
        $agregapro->vchnombre_producto=$request->producto;
        $agregapro->intexistencia=$request->existencia;
        $agregapro->fltpresio=$request->precio;
        
        $agregapro->Foto=$request->foto;
        $agregapro->fkintid_artesano=$request->combo;
        $agregapro->save();
        return view('producto.index',compact("produ"),compact('arte'));
        //return back()->whith('agregar','El Registro se agrego exitosamente');
       


    }*/
}
