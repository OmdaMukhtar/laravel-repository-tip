<?php

namespace App\Repository\Eloquent;

use Exception;

abstract class BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    protected function getModelClass()
    {
        if(!method_exists($this, 'model')){
            throw new Exception('model not defiend !');
        }

        return app()->make($this->model());
    }
}
