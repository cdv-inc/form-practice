<?php


namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class FormValidator
{
    public static function validateForm1($request)
    {
        $validator = Validator::make($request->all(), [
            'zip21' => 'required|numeric',
            'zip22' => 'required|numeric',
            'pref21' => 'required',
            'addr21' => 'required',
            'strt21' => 'required',
            'Department' => 'required|in:システム,デザイン,染織',
        ]);

        return $validator;
    }
}

