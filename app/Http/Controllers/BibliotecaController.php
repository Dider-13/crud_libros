<?php
namespace App\Http\Controllers;
use App\Models\biblioteca;
use Illuminate\Http\Request;
//para realizar el borrado
use Illuminate\Support\Facades\Storage;
use Response;
use File;
class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['bibliotecas']=biblioteca::paginate(10);
        //return view('bibliotecas.index',$datos);

        //Buscador
        $search = request()->query('search');
        if($search){
            // Query Builder to search in three columns in table books
            $datos['bibliotecas'] = biblioteca::query()
                ->where('Titulo', 'LIKE', "%{$search}%")
                ->orWhere('Autor', 'LIKE', "%{$search}%")
                ->orWhere('DescripcionCorta', 'LIKE', "%{$search}%")
                ->get();

            return view('bibliotecas.index',$datos)->with('search', $search);

            //$books = Book::where('title', 'LIKE', "%{$search}%")->get();
        }else{
            $datos['bibliotecas'] = biblioteca::all();
            return view('bibliotecas.index',$datos);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bibliotecas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       // $datosBiblioteca=request()->all();
      $datosBiblioteca=request()->except('_token');


      $image = $request->file('Portada');
      if ($image) {
          # code...
        $image_path = time(). $image->getClientOriginalName();
        Storage::disk('imagenes')->put($image_path,\File::get($image));
        
         $datosBiblioteca['Portada']=$image_path;

      }
      biblioteca::insert($datosBiblioteca);
      //return  response()->json($datosBiblioteca);
      return redirect('bibliotecas')->with('mensaje','Libro agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function show(biblioteca $biblioteca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $bibliotecas=biblioteca::findOrFail($id);
        return view('bibliotecas.edit', compact('bibliotecas'));
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $datosBiblioteca = request()->except(['_token','_method']);
        $bibliotecas=biblioteca::findOrFail($id);
        $image = $request->file('Portada');
      if ($image) {
          # code...
        
        Storage::disk('imagenes')->delete($bibliotecas->Portada);
        $image_path = time(). $image->getClientOriginalName();
        Storage::disk('imagenes')->put($image_path,\File::get($image));
        
         $datosBiblioteca['Portada']=$image_path;

      }
       //Actualiza la Bd
        biblioteca::where('id','=',$id)->update($datosBiblioteca);

        return view('bibliotecas.edit', compact('bibliotecas')); 

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$bibliotecas = null;
        $bibliotecas=biblioteca::findOrFail($id);
        if ($bibliotecas){
           Storage::delete('public/'.$bibliotecas->Portada);
           $bibliotecas->delete();

        }else{
            $valor = "no tiene valor";
            dd($valor);
        }

        
        return redirect('bibliotecas')->with('mensaje','Libro Borrado con éxito');
    }

    public function mostrarImagen($imagen){
        $file = Storage::disk('imagenes')->get($imagen);

        return Response($file);
    }

    public function libroShow($id){
        $libro = biblioteca::Where('id','=',$id)->first();

        return view('bibliotecas.show',array(
            'libro'=>$libro
        ));
    }
    
}
