<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\FormValidator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail
;
class FormController extends Controller
{
    public function submitForm1(Request $request)
    {
        $validator = FormValidator::validateForm1($request);
        //dd($department);
        //return view('form2', compact('selectedDepartment'));　こいつのせいで悩んだナニコレ
        //return view('form2');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $department = $request->input('Department');
        session(['selectedDepartment' => $department]);
        $selectedDepartment = session('selectedDepartment');
        Session::put('form1_values', $request->all());//セッションにデータを一時保存
        return view('form2'); 
    }
    
    public function submitForm2(Request $request)
    {
        // フォーム2の処理を行う
        Session::put('form2_values', $request->all());//セッションにデータを一時保存 
        return view('/form3');
    }

    public function showForm3()
    {
        // セッションからフォーム1とフォーム2の値を取得
        $form1Values = Session::get('form1_values');
        $form2Values = Session::get('form2_values');

        // フォーム3で表示する値をセット
        $data = [
            'form1Values' => $form1Values,
            'form2Values' => $form2Values,
        ];

        return view('form4', $data);
    }

    public function sendEmail(Request $request)
    {
        // メール送信の処理を実装
        $email = 'touhama323@gmail.com'; // ユーザーのメールアドレスを取得（例示）

        // メールを送信
        Mail::to($email)->send(new ConfirmationEmail());

        // 送信後の処理（例えば、完了画面へのリダイレクトなど）
        return redirect()->route('confirmation');
    }
}
