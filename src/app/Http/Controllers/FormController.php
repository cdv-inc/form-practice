<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\FormValidator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use App\Models\UserInformation;

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



    //追記
    public function createForm1(Request $request){
        
        $form_data = $request->session()->get('form_data');
        //var_dump($form_data);
        return view('form1',compact('form_data'));
    }

    public function postForm1(Request $request){
        $validator = FormValidator::validateForm1($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $form_data = $request->input();
        if (!$form_data) {
            return view('form1',compact('form_data'));
        }
        $request->session()->put('form_data', $form_data);
        
        return redirect()->route('create.form2');
        
    }

    public function createForm2(Request $request){

        if (session()->missing('form_data')) {
            return redirect()->route('create.form1');
        }
        $form_data = $request->session()->get('form_data');
        if (!$form_data) {
            return response('値はありません。');
        }
        //var_dump($form_data); 
        return view('form2',compact('form_data'));
    }


    public function postForm2(Request $request){
        
        $form_data2 = $request->input();

        if (!$form_data2) { 
            return view('form2',compact('form_data2'));
        }
        $request->session()->put('form_data2', $form_data2);
        return redirect()->route('create.form3');    
    }



    public function createForm3(Request $request){

        // if (session()->missing('form_data')) {
        //     return redirect()->route('create.form1');
        // }
        // $form_data = $request->session()->get('form_data');
        // if (!$form_data) {
        //     return response('値はありません。');
        // }
        // //dd($form_data); 
        $form_data = $request->session()->get('form_data');
        $form_data2 = $request->session()->get('form_data2');

        return view('result', compact('form_data', 'form_data2'));
    }


    public function postForm3(Request $request){
        // $form_data2 = $request->input();
        // if (!$form_data2) {
        //     return view('form2',compact('form_data2'));
        // }
        // dd($form_data2);
        // $request->session()->put('form_data', $form_data2);

        // return redirect()->route('create.form3');    
    }


    public function save(Request $request)
    {
        //form2のトークン取得
        $form_data2 = $request->session()->get('form_data2');
        $form_data2_token = $form_data2['_token'];
        // 実行前のトークンを保存
        //$baseToken = "aaa";
        $baseToken = $request->session()->token();
        $request->session()->put('baseToken', $baseToken);

        if ($baseToken === $form_data2_token) {
            echo "トークンが同じなので保存します。";
        } else {
            echo "トークンが違うのでトップページに移動しました。";
            return redirect()->route('toppage')->with('error', 'トークンが違うためトップページに移動しました。');
        }
        
        $userInformation = new UserInformation();
        $userInformation->zip_code = $request->input('zip_code');
        $userInformation->prefecture = $request->input('prefecture');
        $userInformation->ward = $request->input('ward');
        $userInformation->street_number = $request->input('street_number');
        $userInformation->building_number = $request->input('building_number');
        $userInformation->department = $request->input('department');
        $userInformation->depth = $request->input('depth');
        $userInformation->width = $request->input('width');
        $userInformation->height = $request->input('height');

        //データベースに保存できたらセッションデータクリア 失敗したらトップページにエラーメッセージを表示
        if ($userInformation->save()) {
            $request->session()->flush(); // 保存が成功した場合にセッションデータをクリア
        } else {
            return redirect()->route('toppage')->with('error', 'データの保存に失敗しました');
        }
        //$request->session()->regenerateToken();
        $baseToken = $request->session()->token();
        // 成功したらリダイレクトやメッセージ表示など適切な処理を追加してください

        // 3. メソッド呼び出し後のトークンを保存
        $newToken = $request->session()->token();
        //トークンの比較と表示
        if ($baseToken === $form_data2_token) {
            echo "トークンは変わっていません";
        } else {
            echo "トークンが変わりました";
        }
        
        return redirect()->route('thankyou')->with('success', 'データが保存されました');

    
    }

    public function thankyou()
    {
        // $sessionData = session()->all();
        // var_dump($sessionData);
        // exit;
        return view('thankyou');
        //return view('thankyou')->with('sessionData', $sessionData);
    }
   
    public function toppage()
    {
        echo('トークンが違うためトップページに移動しました');
        return view('toppage');
    }

    public function resetFormData(){
        session()->forget('form_data');
        // 他の処理やリダイレクトなど必要な処理を追加することもできます
    
        // リダイレクトの例:
        return redirect()->route('create.form1');
    }
}
