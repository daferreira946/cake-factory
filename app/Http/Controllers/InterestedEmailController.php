<?php

namespace App\Http\Controllers;

use App\Http\Modules\InterestedEmails\Events\InterestedEmailsCreatedEvent;
use App\Http\Requests\StoreBatchInterestedEmailsRequest;
use App\Http\Requests\StoreInterestedEmailRequest;
use App\Http\Requests\UpdateInterestedEmailRequest;
use App\Http\Resources\InterestedEmailCollection;
use App\Http\Resources\InterestedEmailResource;
use App\Jobs\SaveEmail;
use App\Models\InterestedEmail;

class InterestedEmailController extends Controller
{
    public function index()
    {
        $interestedEmails = InterestedEmail::orderBy('cake_id')->paginate(20);
        return new InterestedEmailCollection($interestedEmails);
    }

    public function store(StoreInterestedEmailRequest $request)
    {
        $data = $request->safe()->all();
        $interestedEmail = InterestedEmail::create($data);

        event(new InterestedEmailsCreatedEvent($interestedEmail));

        return new InterestedEmailResource($interestedEmail);
    }

    public function storeBatch(StoreBatchInterestedEmailsRequest $request)
    {
        $data = $request->safe()->all();

        $cakeId = $data['cake_id'];
        $emails = $data['emails'];

        foreach ($emails as $item) {
            $data = [
                'cake_id' => $cakeId,
                'email' => $item['email']
            ];
            SaveEmail::dispatch($data);
        }

        return response()->json([], 201);
    }

    public function show(InterestedEmail $interestedEmail)
    {
        return new InterestedEmailResource($interestedEmail);
    }

    public function update(UpdateInterestedEmailRequest $request, InterestedEmail $interestedEmail)
    {
        $data = $request->safe()->all();
        $interestedEmail->update($data);

        return response()->json([], 204);
    }

    public function destroy(InterestedEmail $interestedEmail)
    {
        $interestedEmail->delete();

        return response()->json([], 204);
    }
}
