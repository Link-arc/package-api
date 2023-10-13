<?php

namespace App\Repositories\Eloquent;

use App\Models\Package;
use App\Repositories\BaseInterface;

class PackageRepository implements BaseInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Package;
    }

    public function index($request)
    {
        $packages = $this->model::all();
        return response()->json($packages);
    }

    public function show($id)
    {
        $package = $this->model::find($id);
        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }
        return response()->json($package);
    }

    public function store($request)
    {
        $package = $this->model::create($request->all());

        return response()->json([
            'message' => 'Package created successfully',
            'id' => $package->id,
            'package' => $package
        ], 201);
    }

    public function update($request, $id)
    {
        $package = $this->model::find($id);
        if (!$package) {
            if ($request->isMethod('put')) {
                return $this->store($request);
            }
            return response()->json(['message' => 'Package not found'], 404);
        }

        $package->update($request->all());
        return response()->json([
            'message' => 'Package updated successfully',
            'package' => $package,
        ], 201);
    }

    public function delete($id)
    {
        $package = $this->model::find($id);
        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }
        $package->delete();

        return response()->json(['message' => 'Package deleted']);
    }
}
