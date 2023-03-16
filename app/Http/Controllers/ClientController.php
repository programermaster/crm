<?php

namespace App\Http\Controllers;


use App\Http\Requests\Client\Request;
use App\Http\Requests\Pagination\Request as PaginationRequest;
use App\Http\Services\ClientService;

class ClientController extends Controller
{
    /**
     * Display a listing of books.
     *
     * @param  PaginationRequest  $request
     * @param  ClientService  $service
     */
    public function index(PaginationRequest $request, ClientService $service)
    {
        return view('client.clients', with(array(
            'clients'=>$service->fetchAll($request)
        )));
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  Request  $request
     * @param  ClientService  $service
     */
    public function store(Request $request, ClientService $service)
    {
        $service->store($request);

        return redirect()->route('clients.index');
    }

    /**
     * Display the author.
     *
     * @param  int  $id
     * @param ClientService
     */
    public function edit(int $id, ClientService $service)
    {
        return view('client.edit', with(array(
            'client'=>$service->fetch($id),
        )));
    }

    /**
     *  Show form for add new book .
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Update the book in storage.
     *
     * @param  Request  $request
     * @param  Book $book
     * @param  ClientService  $service
     */
    public function update(Request $request, int $id, ClientService $service)
    {
        $service->update($request, $id);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the book from storage.
     *
     * @param  int  $id
     * @param  ClientService  $service
     */
    public function destroy(int $id, ClientService $service)
    {
        return $service->destroy($id);
    }
}
