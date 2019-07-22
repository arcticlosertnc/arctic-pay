<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Faker\Provider\Image as FakerImage;

class UserController extends Controller
{
    public function profile()
    {
        return view('site.profile.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
       
        $data  =  $request->all();
       
       if ($data['password'] != null )
            $data['password'] = bcrypt($data['password']);
       else 
            unset($data['password']);

        $data['image'] = $user->image;
       
        if($request->hasFile('image')&& $request->file('image')->isValid()) { //Verifica que foi informada uma imagem e se a imagem é valida
              $avatar  = $request->file('image');
              $filename = time() . '.' .$avatar->getClientOriginalExtension(); //Define o nome atraves do tempo que imagem foi upada
              Image::make($avatar)->resize(200,200)->save(public_path('storage/users/' . $filename));

              $data['image'] = $filename;
              


        }
       
        $update = $user->update($data);

        if ($update)
                return redirect()
                        ->route('profile')
                        ->with('success','Sucesso ao atualizar');

        return redirect()
               ->back()
               ->with('error','Falha ao atualizar o perfil...'); 
               
               
               
        
    }

}
