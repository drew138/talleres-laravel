@extends('layouts.app')
@section('title', $data["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($data["orders"] as $order)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $product['id']]) }}" class="btn bg-primary text-white">{{ $product["name"] }}</a>
            </div>
            <p>{{ __('orders.total') }}: {{ $order->getTotal()}}
                <p />
            <p>{{ __('orders.is_') }}: {{ $order->getTotal()}}
                <p />
            <form action="{{ route('order.destroy', ['id'=> $order->getId()]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    {{ __('reviews.delete') }}
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
