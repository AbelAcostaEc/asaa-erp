<?php

namespace Modules\Administration\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Livewire\Actions\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrationController extends Controller
{
    public function logout(Request $request)
    {
        $logout = new Logout();
        $logout();
        // Se redirecciona al login
        return redirect('/');
    }
}
