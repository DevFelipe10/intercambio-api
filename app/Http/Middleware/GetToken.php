<?php

namespace App\Http\Middleware;

use App\Http\Resources\ErrorResource;
use App\Services\Interfaces\ITokenService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetToken
{

    public function __construct(
        protected ITokenService $tokenService
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Autenticate user
        $token = $this->tokenService->autenticate();

        if (!$token) {
            /**
             * @status 401
             */
            return new ErrorResource(
                "Erro de autenticação",
                Response::HTTP_UNAUTHORIZED
            );
        }

        // Add token to request attributes so it can be used in other controllers or services.
        $request->attributes->add(['token' => $token]);

        return $next($request);
    }
}
