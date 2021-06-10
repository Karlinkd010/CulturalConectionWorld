<?php

namespace App\Http\Controllers;

use App\Models\modelo_pro;
use App\Models\modelopedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;
use SebastianBergmann\Environment\Console;

class carritoControler extends Controller
{
    public function pedido(Request $request){


 DB::table('tblpedidos')->insert(
       ['ciudad' => $request->ciudad, 'estado' => $request->estado,'municipio' => $request->municipio,'colonia' => $request->colonia,'intcantidad' => $request->cantidad,'fltprecio' => $request->pre,'id_usuario'=>
       $request->idu,'id_pro' => $request->idpro
         ] );
   //  return response()->json( $datosFoto);
   return redirect ()->route('home');

     }
    public function detallepro($id){
       // $prode=modelo_pro::where('intid_productos',$id)->first($id);

       if ( !Auth::check() ) {
         
           
        return redirect()->route('login');
       }Else{

        
       $valor_almacenado = session('idCarroCompra');

       $producto=modelo_pro::find($id);
       
       return view("producto.detallepro",compact('producto'));
       }
      
        // $producto=producto::all();
       
        //return $detacurso;
        //return view("vista.detallepro");
         // $prode=producto::where('slug',$id)->first();
//        return view("vista.detallepro",compact('producto'));
        //
    }


    //
}
