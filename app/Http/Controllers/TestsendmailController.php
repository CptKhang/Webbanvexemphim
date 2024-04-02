<?php

namespace App\Http\Controllers;

use App\Mail\TestSendmail;
use Illuminate\Http\Request;
use Mail;

class TestsendmailController extends Controller
{
    function index()
    {
        //code gui mail
        $ten ="cong ty ABC";
        $data=['tenct'=>$ten, 'diachi'=>'180 cao lo']; 
        Mail::to('diepbaokhanh1811@gmail.com')->send(new TestSendmail($data));
        echo 'da gui thanh cong';
    }
}
