<?php

namespace App\Http\Controllers;

use App\Services\WeaponService;
use App\Http\Requests\StoreWeaponRequest;

class WeaponController extends Controller
{
    protected $weaponService;

    /**
     * construct
     *
     * @param \App\Services\WeaponService $weaponService
     */
    public function __construct(WeaponService $weaponService)
    {
        $this->weaponService = $weaponService;
    }

    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('weapons', $this->weaponService->getWeapon());
    }

    /**
     * store
     *
     * @param \App\Http\Requests\StoreWeaponRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreWeaponRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->weaponService->saveWeapon($request->only(
            'weapon'
        ));

        return redirect()->route('weapons');
    }
}
