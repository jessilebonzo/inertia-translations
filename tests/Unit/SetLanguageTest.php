<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\SetLanguage;


it('sets the chosen locale', function () {
    session()->put('language', 'de');

    (new SetLanguage())->handle(new Request(),function($request){
        expect(app()->getLocale())->toBe('de');

        return new Response();
    });
});
