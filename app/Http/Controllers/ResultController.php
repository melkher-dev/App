<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Services\ResultService;

class ResultController extends Controller
{
    protected $resultService;

    /**
     * __construct
     *
     * @param \App\Services\ResultService $resultService
     */
    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('results', $this->resultService->getResult());
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return bool
     */
    public function store(StoreResultRequest $request): \Illuminate\Routing\Redirector
    {
        $this->resultService->saveResult($request->only(
            'country_id',
            'weapon_id',
            'amount'
        ));

        return redirect('/results');
    }
}
