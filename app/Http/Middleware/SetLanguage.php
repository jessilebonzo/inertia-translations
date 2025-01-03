<?php

namespace App\Http\Middleware;

use App\Lang\Lang;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class SetLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $language = session()->get('language', config('app.locale'));
        $lang = Lang::tryFrom($language) ?? Lang::from(config('app.locale'));
        
        app()->setLocale($lang->value);

        return $next($request);
    }
}
