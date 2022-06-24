<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index()
    {
        return view('weapons', [
            'weapons' => Weapon::paginate(10),
        ]);
    }

    public function store(Request $request)
    {
        $weapon = new Weapon();
        $weapon->name = $request->weapon;
        $weapon->save();

        return redirect()->route('weapons');
    }
}
