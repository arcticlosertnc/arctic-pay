<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
                if($user->image)
                    $name = $user->image;  //Se ja exitir uma imagem a nova imagem continuara com o mesmo nome 
                else
                    $name = $user->id.kebab_case($user->name);  //Cria o nome da imagem conforme o id do usuario e o seu nome {kebab_case retira os espaços e caracters especiais}
            
                $extenstion  = $request->image->extension(); // Pega a extensão da imagem 

                $nameFile = "{$name}.{$extenstion}"; //Cria o nome da nova imagem 

                $data['image'] = $nameFile ; 

                $upload  = $request->image->storeAs('users',$nameFile); //Faz o upload dentro da pasta users

                if (!$upload)
                    return redirect()
                            ->back()
                            ->with('error','Falha ao fazer upload da imagem!');






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
