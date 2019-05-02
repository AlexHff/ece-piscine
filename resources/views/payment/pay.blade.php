@extends('layouts.app')
@section('title', 'Payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Payment <img src="http://i76.imgup.net/accepted_c22e0.png" style="margin-left: 20px"></div>

                <div class="card-body">
                    <form  method="POST" action="{{ route('payment.validation') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Card number</label>
                            <input type="text" class="form-control{{ $errors->has('card_number') ? ' is-invalid' : '' }}" name="card_number" placeholder="4242 4242 4242 4242">
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group" id="expiration-date">
                                    <label>Expiration Date</label><br>
                                    <select class="form-control{{ $errors->has('expiration_month') ? ' is-invalid' : '' }}" name="expiration_month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select class="form-control{{ $errors->has('expiration_year') ? ' is-invalid' : '' }}" name="expiration_year">
                                        <option value="19"> 2019</option>
                                        <option value="20"> 2020</option>
                                        <option value="21"> 2021</option>
                                        <option value="22"> 2022</option>
                                        <option value="23"> 2023</option>
                                        <option value="24"> 2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label>CVC</label>
                                    <input type="number" class="form-control{{ $errors->has('cvc') ? ' is-invalid' : '' }}" name="cvc" placeholder="123">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Pay now ${{ Cart::total() }}</button>
                    </form>
                    @if ($errors->any())
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection