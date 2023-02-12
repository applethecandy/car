<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Locale
{
    const SESSION_KEY = 'locale';

    public function handle(Request $request, Closure $next)
    {
        /** @var Session $session */
        $session = $request->getSession();

        if (! $session->has(self::SESSION_KEY)) {
            $session->set(self::SESSION_KEY, $request->getPreferredLanguage(config('app.locales')));
        }

        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, config('app.locales'))) {
                $session->set(self::SESSION_KEY, $lang);
            }
        }

        app()->setLocale($session->get(self::SESSION_KEY));

        return $next($request);
    }
}
