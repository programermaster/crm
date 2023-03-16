@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-bottom: 50px">
            <a href="{{route("clients.create")}}">Create Client</a>
        </div>

        <div class="col-md-12" style="margin-bottom: 50px">
            <form method="get" action="">
                Search : <input type="text" name="filter" value="{{app('request')->input('filter')}}" />
            </form>
        </div>

        <table class="table table-striped table-bordered col-md-12 ">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Cash loan</th>
                <th>Home loan</th>
            </thead>
            <tbody>
                    @foreach($clients as $key=>$client)
                    <tr>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>@if($client->cash_loan()->count() > 0) yes @else no @endif </td>
                        <td>@if($client->home_loan()->count() > 0) yes @else no @endif </td>
                        @if(
                        ($client->cash_loan()->count() > 0 && $client->cash_loan->adviser_id == Auth::user()->id) ||
                        ($client->home_loan()->count() > 0 && $client->home_loan->adviser_id == Auth::user()->id))
                        <td><a href="{{route('clients.edit', $client->id)}}">Edit</a></td>
                        <td><a class="delete" data-url="{{route("clients.destroy", $client->id)}}">Delete</a></td>
                        @endif
                    </tr>
                    @endforeach
                    {{ $clients->links() }}
            </tbody>
        </table>
    </div>
</div>
@endsection
