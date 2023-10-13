<?php

namespace App\Repositories;

interface BaseInterface
{
    public function index($request);

    public function show($id);

    public function store($request);

    public function update($id, $request);

    public function delete($id);
}
