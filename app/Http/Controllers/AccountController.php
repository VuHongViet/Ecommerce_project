<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Auth;
use Hash;
class AccountController extends Controller
{
    // public function getLogin(){
    //     return view('account.login');
    // }
    public function postLogin(Request $request){
        if(Session('cart')){
            $arr = [
                'username' => $request->name,
                'password' => $request->password
            ];
            if(Auth::guard('account')->attempt($arr)){
                $account = Auth::guard('account')->user();
                session_start();
                $_SESSION['name'] = $account['username'];
                if($account['level'] == 1){
                    return view('webmoi.getOrder',['account'=>$account]);
                }
                if($account['level'] == 0){
                    return redirect()->route('getAdd');
                }
            }else{
                echo "Tài khoản và mật khẩu chưa chính xác";
            }
        }else{
            return redirect()->route('getIndex');
        }
    }
    // public function getRegister(){
    //     return view('account.register');
    // }
    public function postRegister(Request $request){
        Account::create([
            'username' => $request['name'],
            'password' => Hash::make($request['password']),
            'level' => 1
        ]);
        echo "Dang ki thanh cong";
        return redirect()->route('getIndex')->with(['message'=>'Dang ki thanh cong']);
    }
    public function getLogout(){
        Auth::guard('account')->logout();
        return redirect()->route('getIndex');
    }
    public function getList(){
        $count = Account::all()->count();
        $account = Account::select('id','username','level')->get()->toArray();
        return view('account.listAccount',compact('count','account'));
    }
}
