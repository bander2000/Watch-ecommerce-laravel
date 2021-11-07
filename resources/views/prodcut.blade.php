@extends('layout.layout')

@section('title')
{{ $product->name }}
@endsection

@section('header')
@include('header')
@endsection

@section('content')


    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="{{asset('storage/'.$product->image)}}" alt="product" />
            </div>
            
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>


           
            <div class="product-section-price">{{ $product->presentPrice() }}</div>

            <div>{!! $stockLevel !!}</div>


            <p>
                {!! $product->description !!}
            </p>

            <p>&nbsp;</p>

            @if ($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}"  />
                    <input type="hidden" name="name" value="{{ $product->name }}"  />
                    <input type="hidden" name="price" value="{{ $product->price }}"  />
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            @endif
        </div>
    </div> <!-- end product-section -->

    @include('might-like')

@endsection