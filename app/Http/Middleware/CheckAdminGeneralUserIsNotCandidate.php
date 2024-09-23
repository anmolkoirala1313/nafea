<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminGeneralUserIsNotCandidate
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user is not logged in
        if (!$user) {
            return redirect()->route('login'); // Redirect to login page if not authenticated
        }

        // Check if the user is an admin or general and not a candidate
        if (($user->user_type == 'admin' || $user->user_type == 'general') && !$user->is_candidate) {
            return $next($request); // Allow access if user is admin or general and not a candidate
        }

        // Flush the session and redirect to login page if access is denied
        Auth::logout();
        Session::flash('error','Unauthorized access. Mismatched credentials, try again.');
        return redirect()->route('backend.login');
    }
}
