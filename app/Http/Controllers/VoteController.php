<?php

namespace App\Http\Controllers;

use App\Services\VoteService;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{
    protected $voteService;

    /**
     * __construct
     *
     * @param  mixed $voteService
     * @return void
     */
    public function __construct(VoteService $voteService)
    {
        $this->voteService = $voteService;
    }
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('votes', $this->voteService->getData());
    }
}
