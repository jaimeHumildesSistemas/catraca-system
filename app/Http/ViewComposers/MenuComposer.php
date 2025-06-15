<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MenuComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $menus = collect();

        if ($user) {
            // Se o usuário tem múltiplos roles:
            $menus = $user->roles()->with('menus')->get()
                ->pluck('menus')
                ->flatten()
                ->unique('id')
                ->values();
        }

        $view->with('menus', $menus);
    }
}
