<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Route
{
    // お問い合わせフォーム表示
    public function index()
    {
        return view('page.contact');
    }

    // お問い合わせ保存処理
    public function save(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            // メール送信先のアドレス（管理者など）
            $toEmail = 'your-email@example.com'; // ここを実際の送信先メールアドレスに変更

            // メール送信
            Mail::to($toEmail)->send(new ContactFormMail($validated));

            return redirect()->route('page.contact')->with('success', 'お問い合わせが送信されました。');
        } catch (\Exception $e) {
            return redirect()->route('page.contact')->with('error', 'エラーが発生しました。後ほど再度お試しください。');
        }
    }
}