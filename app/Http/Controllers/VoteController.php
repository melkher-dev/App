<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Country;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\Constraint\Count;

class VoteController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $data = [];
        $data['countries'] = Country::all();
        $data['weapons'] = Weapon::all();

        return view('votes', $data);
    }
}
