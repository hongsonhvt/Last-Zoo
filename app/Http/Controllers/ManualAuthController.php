<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManualAuthController extends Controller
{
    public function ask(){
        return view('Zoo.ManualAuth.login');
    }
    public function signin(Request $request){

        $this->formValidate($request)->validate();

        $adminInformations = AdminRepos::getAllAdmins();
        $a_username = $request->input('a_username');
        $a_password_hash = $request->input('a_password_hash');
        $index = 0;
        foreach($adminInformations as $adminInformation){
            if(($adminInformation->a_username) == $a_username && ($adminInformation->a_password_hash) == sha1($a_password_hash)) {
//                $index = 0;
                Session::put('a_username', $request->input('a_username'));
                return redirect()->route('admin.index');

            }
            else{
                $index += 1;
            }
        }
        if($index != 0){
            return redirect()->action('ManualAuthController@ask')

//            return redirect()
//                ->action('ClientController@index')
//            ->with('msg', 'Sign up successfully: '.$newc_Id.' has been inserted');
                ->with('msg', 'Wrong username or password!, Please Re-Sign In!');
        }

//        Session::put('a_username', $request->input('a_username'));
//        return redirect()->route('admin.index');
    }

    public function signout(){
        if (Session::has('a_username')){
            Session::forget('a_username');
        }
        return redirect()->action('ManualAuthController@ask');

    }

    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'a_username' => ['required'],
                'a_password_hash' => ['required'],
            ],
            [
                //change validation message
                'a_username.required' => 'Please input username',
                'a_password_hash.required' => 'Please input password',
            ]
        );
    }
}
