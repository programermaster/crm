@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-bottom: 50px">
            <a href="{{route("clients.create")}}">Create Client</a>
        </div>

        <div class="col-md-12" style="margin-bottom: 50px">
            <div class="col-md-6" style="">
                <a href="{{route('report.export')}}" class="btn btn-primary">
                    {{ __('Export') }}
                </a>
            </div>
        </div>
        <table class="table table-striped table-bordered col-md-12 ">
            <thead>
                <th>Product Type</th>
                <th>Product Value</th>
                <th>Creation date</th>
            </thead>
            <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <td>@if(isset($product->property_value)) Home Loan @else Cash Loan @endif</td>
                        <td>@if(!empty($product->amount)) {{$product->amount}} @else {{$product->property_value . "-" . $product->down_payment_amount }} @endif</td>
                        <td>{{$product->created_at}}
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
