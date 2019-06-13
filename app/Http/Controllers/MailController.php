<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
class MailController extends Controller
{
    public function sendMail(Request $request){
        $data = ['hoten' => $request->input('name'),'email'=>$request->input('email'),'tinnhan'=>$request->input('message')];
        Mail::send('mail.lienhe',$data,function($message){
            $message->from('doduonglongmtp1998@gmail.com','Long');
            $message->to('longdoduong98@gmail.com','WTF')->subject('Day la chuong trinh test Mail');
        });
    }
}
