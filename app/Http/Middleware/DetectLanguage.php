<?php

namespace App\Http\Middleware;

use App\Helpers\LanguageHelper;
use Closure;
use Illuminate\Http\Request;

class DetectLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->merge(['languageDetected' => false]);

        if($request->has('from') && $request->has('sourceText') && $request->from === 'detect') {
            $request->merge(['from' => LanguageHelper::DetectLanguage($request->sourceText)]);
            $request->merge(['languageDetected' => true]);
        }

        return $next($request);
    }
}
