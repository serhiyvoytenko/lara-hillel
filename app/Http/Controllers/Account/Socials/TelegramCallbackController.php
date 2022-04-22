<?php

namespace App\Http\Controllers\Account\Socials;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use pschocke\TelegramLoginWidget\Facades\TelegramLoginWidget;

class TelegramCallbackController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {

        if($telegramUser = TelegramLoginWidget::validate($request)) {
//            dd($telegramUser);
            Auth::user()?->update([
                'telegram_id' => $telegramUser->get('id')
            ]);

            return redirect()->back()->with('success', 'Congratulations. You\'re successfully added our chat bot.');
        }
        return redirect()->back()->with('warn', 'error');
    }
}
