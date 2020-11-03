<?php

namespace App\Services\Contracts;


use Illuminate\Http\Request;

interface IBaseService
{
    public function index();

    public function store(Request $request);

    public function view($id);

    public function update(Request $request, $id);

    public function delete($id);
}
