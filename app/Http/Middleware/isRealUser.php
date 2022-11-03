<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isRealUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$rolesId)
    {
        $article = Article::find( $request->route()->parameters()['articlesCRUD']);

        foreach ($rolesId as $roleId) {
            if (Auth::user()->id == $roleId && Auth::user()->id != $article->user_id) {
                return redirect()->back();
            } else {
                return $next($request);
            }
        }
    }
}
