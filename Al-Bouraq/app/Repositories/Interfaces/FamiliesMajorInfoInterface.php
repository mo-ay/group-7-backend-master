<?php

namespace App\Repositories\Interfaces;

use illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;

interface FamiliesMajorInfoInterface {

    /**
     * @return mixed
     */
     public function index(Model $model);

    /**
     * @param Model $model
     * @param FormRequest $request
     * @return mixed
     */
      public function store(Model $model, FormRequest $request);


    /**
     * @param $id
     * @return mixed
     */
     public function show($id);

    /**
     * @param FormRequest $request
     * @param $id
     * @return mixed
     */
     public function update(FormRequest $request, $id);

    /**
     * @param FormRequest $request
     * @param $id
     * @return mixed
     */
      public function edit(Model $model, FormRequest $request);

    /**
     * @param $id
     * @return mixed
     */
     public function destroy($id);
}
