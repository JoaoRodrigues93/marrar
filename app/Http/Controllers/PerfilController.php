<?php namespace App\Http\Controllers;
session_start();

use App\Estudante;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Input;
use Validator;

use App\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller {

    public function buscarPerfil() {
        //App::abort(404);
        $perfil = Auth::user();

        return view('perfil')->with(array('perfil'=>$perfil));
    }

    public function buscarEditPerfil() {
        $perfil = Auth::user();
        return view('editar-perfil')->with(array('perfil'=>$perfil));
    }

    public function HabilitarEditarPerfil(Request $request) {
        return redirect('editar-perfil/');
    }

    public function EditarPerfil(Request $request){

/*        $imageTypes = array(
            1 => 'GIF',
            2 => 'JPEG',
            3 => 'PNG',
            4 => 'SWF',
            5 => 'PSD',
            6 => 'BMP',
            7 => 'TIFF_II',
            8 => 'TIFF_MM',
            9 => 'JPC',
            10 => 'JP2',
            11 => 'JPX',
            12 => 'JB2',
            13 => 'SWC',
            14 => 'IFF',
            15 => 'WBMP',
            16 => 'XBM',
            17 => 'ICO');*/

        $id= $request->input('id');
        $perfil = Estudante::find($id);
        $perfil -> nome  = $request -> input('nome');
        $perfil -> apelido  = $request -> input('apelido');
        //Not Used Anymore for Showing Purposes and Saving...
        //$perfil -> username = $request -> input('nome-do-utilizador');
        //$perfil -> password = $request -> input('password');
        $perfil -> email  = $request -> input('email');
        $perfil -> telefone  = $request -> input('telefone');
        $perfil -> cidade  = $request -> input('provincia');
        $perfil -> escola  = $request -> input('escola');
        $perfil-> dataNascimento = $request -> input('date');
        $perfil -> sexo  = $request -> input('sexo');
        $perfil -> descricao  = $request -> input('descricao');

            if ($request->hasFile('image')) {
                //$destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                //Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'bmp') {
                    $fileName = $perfil->id . '-' . rand(11111, 99999) . '.' . $extension; // renameing image
                    /*
                    $request->file('image')->move(
                        base_path() . '/public/images/catalog/', $fileName
                    );
                    */
                    $image = Input::file('image');
                    $path = public_path('images\perfil\img-' . $fileName);

                    //Calculos para resize
                    list($width, $height) = getimagesize($image);
                        if ($width > $height) {
                            Image::make($image->getRealPath())->resize(512, null, function ($constraint) {$constraint->aspectRatio();})->save($path);
                        }
                    else {
                        if ($width > $height) {
                            Image::make($image->getRealPath())->resize(null, 512, function ($constraint) {$constraint->aspectRatio();})->save($path);
                        }
                        else
                            Image::make($image->getRealPath())->resize(512, 512)->save($path);
                    }


                    //Image::make(sprintf('public/images/catalog/%s', $fileName))->resize(200, 200)->save();

                    $perfil->foto = "/images/perfil/img-" . $fileName;
                    Session::flash('message', 'Dados gravados com sucesso');
            }else {
                $perfil ->save();

                // sending back with message
                //Session::flash('success', 'Upload successfully');
                Session::flash('message', 'Imagem incompactivel!');
                return redirect('editar-perfil/');
                }
            }


//        $this->validate($request, [
////            'title' => 'required',
//            'image' => 'required'
//        ]);

//        if ($request->hasFile('image')) {
//
//            $imgName = $perfil->username . '.' .
//                $request->file('image')->getClientOriginalExtension();
//
//            $request->file('image')->move(
//                base_path() . '/public/images/catalog/', $imgName
//            );
//
//            $perfil -> foto  = "/images/catalog/".$imgName;
//        }

//        $image = new Image();
//        $this->validate($request, [
//            'image' => 'required'
//        ]);
//        if($request->hasFile('image')) {
//            $file = Input::file('image');
//            $name = time(). '-' .$file->getClientOriginalName();
//            $image->filePath = $name;
//
//            $file->move(public_path().'/images/', $name);
//        }
//        $image->save();



        $perfil ->save();

        return redirect('perfil/');

    }
}
