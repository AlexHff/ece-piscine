@extends('layouts.app')
@section('title', 'My Cart')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Cart</div>

                <div class="card-body">
                @if (Cart::count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">Item name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                    <tr>
                                    <td>
                                        <a href="{{ url('items/'.$item->id) }}">
                                            <img src="{{ $item->options->image }}" alt="[item-image]" style="max-height:100px; max-width:100px;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('items/'.$item->id) }}" style="color:inherit; text-decoration: none">
                                        {{ $item->name }}
                                        </a>
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>${{ $item->total }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.delete') }}">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                            </div>
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                    <td><strong>Total</strong></td>
                                    <td><strong>${{ Cart::total() }}</strong></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <a href="/payment/pay"><button type="button" class="btn btn-primary">Proceed to checkout</button></a>
                @else
                    <p>Your cart is empty.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
