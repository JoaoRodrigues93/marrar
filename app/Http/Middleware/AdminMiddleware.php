<?php namespace App\Http\Middleware;

use Closure;
use App\Estudante;
use Auth;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if(!$request->user())
        {
            return redirect('/');}
        else

        if ($request->user()->type != 'A')
        {
            return redirect('home');
        }


		return $next($request);
	}

}
