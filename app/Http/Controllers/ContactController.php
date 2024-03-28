<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());
    
        return response()->json([
            'message' => 'Contact created successfully',
            'data' => $contact
        ], 201);
    }

    public function index()
{
    $contacts = Contact::all();
    return ContactResource::collection($contacts);
}

public function update(UpdateContactRequest $request, Contact $contact)
{
    $validatedData = $request->validated();

    $contact->update($validatedData);

    return new ContactResource($contact);
}

public function destroy(Contact $contact)
{
    $contact->delete();

    return response()->json([
        'message' => 'Contact deleted successfully'
    ], 200);
}
};

