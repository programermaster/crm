@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Client') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('title') is-invalid @enderror"
                                       name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                       name="last_name" value="{{ old('title') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <fieldset class="border p-2">
                            <legend  class="w-auto">Cash Loan</legend>
                            <div class="row mb-3">

                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror"
                                           name="amount" value="{{ old('amount') }}"  autocomplete="amount" autofocus>

                                    @error('amount')
                                    <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-2">
                            <legend  class="w-auto">Home Loan</legend>
                            <div class="row mb-3">
                                <label for="property_value" class="col-md-4 col-form-label text-md-end">{{ __('Property Value') }}</label>

                                <div class="col-md-6">
                                    <input id="property_value" type="text" class="form-control @error('property_value') is-invalid @enderror"
                                           name="property_value" value="{{ old('property_value') }}"  autocomplete="property_value" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="down_payment_amount" class="col-md-4 col-form-label text-md-end">{{ __('Down payment amount') }}</label>

                                <div class="col-md-6">
                                    <input id="down_payment_amount" type="text" class="form-control @error('down_payment_amount') is-invalid @enderror"
                                           name="down_payment_amount" value="{{ old('down_payment_amount') }}"  autocomplete="down_payment_amount" autofocus>

                                    @error('down_payment_amount')
                                    <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <button type="submit" onclick="location.href={{route('clients.index');}}" class="btn btn-primary">
                                    {{ __('Go Back') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
