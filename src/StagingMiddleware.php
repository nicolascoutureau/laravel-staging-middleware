<?php

namespace Nicolasc\StagingMiddleware;

class StagingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->response = $next($request);

        if(config('app.env') !== 'production'){
            $this->response->headers->set('x-robots-tag', 'noindex', true);
        }

        return $this->response;
    }
}
