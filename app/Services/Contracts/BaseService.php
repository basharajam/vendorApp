<?php

namespace App\Services\Contracts;


use App\Repositories\Contracts\IBaseRepository;
use Illuminate\Http\Request;

abstract class BaseService implements IBaseService
{
    protected $repository;

    public function __construct(IBaseRepository $repository)
    {
        $this->repository = $repository ;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request)
    {
        return $this->repository->create($request->all());
    }

    public function view($id)
    {
        return $this->repository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request->all(),$id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
