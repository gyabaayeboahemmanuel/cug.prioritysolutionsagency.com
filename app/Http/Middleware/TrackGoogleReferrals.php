<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class TrackGoogleReferrals
{
    public function handle($request, Closure $next)
    {
        $referrer = $request->headers->get('referer');

        if ($referrer && str_contains($referrer, 'google.com')) {
            DB::table('google_referrals')->insert([
                'url' => $request->url(),
                'referrer' => $referrer,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return $next($request);
    }
}
