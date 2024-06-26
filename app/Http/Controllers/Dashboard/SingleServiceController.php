<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\Services\SingleServiceRepository;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $services;
    public function __construct(SingleServiceRepository $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        return $this->services->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->services->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->services->update($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->services->destroy($id);

    }
}
