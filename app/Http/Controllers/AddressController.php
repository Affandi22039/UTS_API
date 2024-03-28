<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Requests\AddressRegistrationRequest;
use App\Http\Resources\AddressResource;
use App\Http\Requests\AddressUpdateRequest;

class AddressController extends Controller
{
    public function store(AddressRegistrationRequest $request)
{
    $address = Address::create([
        'contact_id' => $request->contact_id,
        'address' => $request->address,
        'city' => $request->city,
        'country' => $request->country,
    ]);

    return response()->json(['message' => 'Address registered successfully', 'address' => $address], 201);
}
    public function index()
{
    $addresses = Address::all();
    return AddressResource::collection($addresses);
}
public function update(AddressUpdateRequest $request, Address $address)
{
    $address->update($request->validated());

    return response()->json(['message' => 'Address updated successfully', 'address' => $address]);
}   

public function destroy(Address $address)
{
    $address->delete();

    return response()->json(['message' => 'Address deleted successfully'], Response::HTTP_NO_CONTENT);
}
}
