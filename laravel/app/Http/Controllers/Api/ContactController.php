<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact =  QueryBuilder::for(Contact::class)
            ->allowedFilters([
                AllowedFilter::exact('is_active'),
            ])
            ->paginate($req->limit ?? 15)
            ->appends(request()->query());
        return new ContactCollection($contact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $image = $request->file('path');
        $qwe = Storage::disk('s3')->put('path', $image);
        $fullUrl = Storage::disk('s3')->url($qwe);
        $contact_store['path'] = $fullUrl;
        $contact_store = Contact::create($request->validated());

        return new ContactRequest($contact_store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ContactResource(Contact::findOrFail($id));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $validateArr = $request->validated();
        if(!$validateArr['path'] || $validateArr['path'] === 'null') {
            $validateArr['path'] = $contact['path'];
        } else {
            $image = $request->file('path');
            $qwe = Storage::disk('s3')->put('path', $image);
            $fullUrl = Storage::disk('s3')->url($qwe);
            $validateArr['path'] = $fullUrl;
        }
        $contact->update($validateArr);
        return new ContactResource($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
