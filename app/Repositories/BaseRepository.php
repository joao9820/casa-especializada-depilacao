<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository {

    private $model;

    function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(){
        return $this->model->all();
    }

     /**
     * Add a basic where clause to the query.
     *
     * @param  \Closure|string|array|\Illuminate\Database\Query\Expression  $column
     * @param  mixed  $operator
     * @param  mixed  $value
     * @param  string  $boolean
     * @return Builder
     */
    public function where($column, $operator = null, $value = null, $boolean = 'and'){
        return $this->model->where($column, $operator, $value, $boolean);
    }

}
