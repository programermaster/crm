<?php

namespace App\Http\Services;

use App\Http\Requests\Client\Request;
use App\Http\Requests\Pagination\Request as PaginationRequest;
use App\Http\Traits\FilterCollection;
use App\Models\CashLoan;
use App\Models\Client;
use App\Models\HomeLoan;
use Database\Seeders\HomeloanTableSeeder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ClientService
{
    use FilterCollection;

    /**
     * Fetch Books collection.
     *
     * @param  PaginationRequest  $request
     * @return LengthAwarePaginator
     */
    public function fetchAll(PaginationRequest $request): LengthAwarePaginator
    {
        $query = $this->getFilters($request);
        $builder = Client::query();

        $this->filterByQuery($builder, [ 'first_name', 'last_name'], $query->get('filter'));

        return $this->getResultPerPage($builder, $query);
    }

    /**
     * Fetch Book
     * @param $id
     * @return Book
     */
    public function fetch(int $id):Client
    {
        return Client::query()->findOrFail($id);
    }

    /**
     * Update Book.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Book
     */
    public function update(Request $request, int $id):Client
    {
        return tap(Client::query()->findOrFail($id), function(Client $client) use ($request){
            $client->update($request->validated());

            if(!empty($request->amount)) {
                if($client->cash_loan()->count()) {
                    $client->cash_loan()->update([
                        "amount" => $request->amount
                    ]);
                }
                else{
                    CashLoan::query()->create([
                        "adviser_id"=>Auth::id(),
                        "client_id"=>$client->id,
                        "amount" => $request->amount,
                    ]);
                }
            }
            else {
                $client->cash_loan()->delete();

                if (!empty($request->property_value) && !empty($request->down_payment_amount)) {
                    if ($client->home_loan()->count()) {
                        $client->home_loan()->update([
                            "property_value" => $request->property_value,
                            "down_payment_amount" => $request->down_payment_amount
                        ]);
                    } else {
                        HomeLoan::query()->create([
                            "adviser_id" => Auth::id(),
                            "client_id" => $client->id,
                            "property_value" => $request->property_value,
                            "down_payment_amount" => $request->down_payment_amount
                        ]);
                    }
                } else {
                    $client->home_loan()->delete();
                }
            }
        });
    }

    /**
     * Create new Book.
     *
     * @param  Request  $request
     * @return Book
     */
    public function store(Request $request):Client
    {
        $client = Client::query()->create($request->validated());

        if(!empty($request->amount)) {

            CashLoan::query()->create([
                "adviser_id"=>Auth::id(),
                "client_id"=>$client->id,
                "amount" => $request->amount,
            ]);
        }

        if(!empty($request->property_value)  && !empty($request->down_payment_amount)) {
            HomeLoan::query()->create([
                "adviser_id" => Auth::id(),
                "client_id" => $client->id,
                "property_value" => $request->property_value,
                "down_payment_amount" => $request->down_payment_amount
            ]);
        }

        return $client;
    }

    /**
     * Soft-delete Book.
     *
     * @param  int  $id Book ID
     */
    public function destroy(int $id): bool
    {
        $client = Client::query()->findOrFail($id);

        return $client->delete();
    }
}
