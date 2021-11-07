@extends('layout.layout')

@section('title')
    
@endsection

@section('extra-css')
  <style>
    .pagination
    {
      justify-content: center;
    }
  </style>
@endsection

@section('header')
@include('header')
@endsection


@section('content')
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Watches
        </h2>
      </div>
      <div class="row">

        @php
          $i=0;
        @endphp
        @foreach ($products as $product)
          @if($i==0)
         @php
           $i++
         @endphp
          <div class="col-md-6 ">
            <div class="box">
              <a href="{{ route('shop.show',$product->id) }}">
                <div class="img-box">
                  <img src="{{ asset('storage/'.$product->image) }}" alt="">
                </div>
                <div class="detail-box">
                  <h6>
                    {{ $product->name }}
                  </h6>
                  <h6>
                    Price:
                    <span>
                      {{ $product->presentPrice() }}
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    @if ($product->featured==0)
                      Featured
                    @else
                      New
                    @endif
                  </span>
                </div>
              </a>
            </div>
          </div>
          @else
          <div class="col-sm-6 col-xl-3">
            <div class="box">
              <a href="{{ route('shop.show',$product->id) }}">
                <div class="img-box">
                  <img src="{{ asset('storage/'.$product->image) }}" alt="">
                </div>
                <div class="detail-box">
                  <h6>
                    {{ $product->name }}
                  </h6>
                  <h6>
                    Price:
                    <span>
                      {{ $product->presentPrice() }}
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    @if ($product->featured==0)
                      Featured
                    @else
                      New
                    @endif
                  </span>
                </div>
              </a>
            </div>
          </div>
          @endif
        @endforeach
        
      
      </div>

      <div class="mt-5">
      {{ $products->links() }} 
     </div>

      
    </div>
  </section>
@endsection