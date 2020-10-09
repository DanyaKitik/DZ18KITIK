<?php

namespace App\Http\Middleware;

use App\Models\Link;
use Closure;
use Illuminate\Http\Request;

class UpdateDelete
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() == null) {
            return redirect()
                ->route('home')
                ->withErrors(['not_allowed' => 'Your are not logged in.']);
        }
        if ($request->user()->id !== null) {
            $link = Link::find($request->id);
            if ($request->user()->cannot('interact', $link)) {
                return redirect('/')
                    ->withErrors(['not_allowed' => 'You can`t interact with this link.']);
            }
        }
        return $next($request);
    }
}
