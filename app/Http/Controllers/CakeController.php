<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCakeRequest;
use App\Http\Requests\UpdateCakeRequest;
use App\Http\Resources\CakeCollection;
use App\Http\Resources\CakeResource;
use App\Models\Cake;

class CakeController extends Controller
{
    public function index()
    {
        $cakes = Cake::paginate(10);
        return new CakeCollection($cakes);
    }

    public function store(StoreCakeRequest $request)
    {
        $data = $request->safe()->all();
        $cake = Cake::create($data);

        return new CakeResource($cake);
    }

    public function show(Cake $cake)
    {
        return new CakeResource($cake);
    }

    public function update(UpdateCakeRequest $request, Cake $cake)
    {
        $data = $request->safe()->all();
        $cake->update($data);

        return response()->json([], 204);
    }
    public function destroy(Cake $cake)
    {
        $cake->delete();

        return response()->json([], 204);
    }
}
