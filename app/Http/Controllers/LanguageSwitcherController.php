<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Inertia;

class LanguageSwitcherController extends Controller
{
    public function switchLanguage(Request $request): RedirectResponse
    {
        // Retrieve the desired language from the request
        $language = $request->language;

        // Validate the language input (optional, based on your supported languages)
        if (!in_array($language, ['en', 'de'])) { // Only allow English and German
            abort(400, 'Invalid language selected.');
        }

        // Set the application locale
        App::setLocale($language);

        // Store the locale in the session
        session()->put('locale', $language);

        // Share translations with Inertia
        Inertia::share('translations', [
            'dashboard' => [
                'greeting' => trans('dashboard.greeting', ['name' => auth()->user()->name ?? 'Guest'])
            ]
        ]);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
