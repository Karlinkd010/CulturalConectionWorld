<?php

namespace App\Http\Controllers;

use App\Models\modelo_pro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\New_;

use function GuzzleHttp\Promise\all;

class producController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producto.index');
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "index";
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $datosFoto=new modelo_pro();
       $datosFoto=new modelo_pro();
        $datosFoto->vchnombre_producto=$request->producto;
        $datosFoto->intexistencia=$request->existencia;
        $datosFoto->fltpresio=$request->precio;
        
        if ($request->hasFile('Foto')) {
          
           // $file=$request->file('Foto');
            //$extencion=$file->getClientOriginalExtension();
            //$filename=time().'.'.$extencion;
            //$file->move('uploads','public',$filename);
            //->store('uploads','public');
            $datosFoto->Foto=$request->file('Foto')->store('uploads','public');
            //$datosFoto['id_user']=Auth::user()->id;
            //$datosFoto->Foto=$filename;
           // $datosFoto->id_user=$request->Auth::user()->id;
            //$datosFoto;
        }
        $datosFoto->id_user=Auth::user()->id;
           // $datosFoto['Foto']=$request->file('Foto')->store('uploads','public');
            $datosFoto->save();

       
        //DB::table('tblproductos')->insert(
          //      ['vchnombre_producto' => $request->producto, 'intexistencia' => $request->existencia,'fltpresio'=>$request->precio,'Foto'=>$request->Foto,'id_user'=>
            //    Auth::user()->id
              //  ] );
          //  return response()->json( $datosFoto);
          return redirect ()->route('producto');
   
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prode=modelo_pro::where('intid_productos',$id)->first($id);

        
        return view("producto.detallepro",compact('prode'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodo=modelo_pro::findOrFail($id);
        return view('Modal',compact('prodo'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  intid_productos  $idintid_productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  modelo_pro::destroy($intid_productos);
        
       // $aliminar=DB::delete('delete users where name = ?', ['John']);
        
        
       DB::table('tblproductos')->delete($id);
        return redirect ()->route('producto');
//DB::table('users')->where('votes', '>', 100)->delete();
        //
    }
}
