<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Http\Resources\LanguageResource;
use Illuminate\Support\Facades\Config;
use App\Lang\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'translations' => [
                'dashboard.greeting' => __('dashboard.greeting'),
                // Add other translations you need
            ],
            'auth' => [
                'user' => $request->user(),
            ],
            'language' => app()->getLocale(),
            'languages' => [
                'data' => [
                    ['label' => 'English', 'value' => 'en'],
                    ['label' => 'Deutsch', 'value' => 'de']
                ]
            ]
        ]);
    }
}
