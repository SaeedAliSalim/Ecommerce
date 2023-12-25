@extends('Layouts.Master')
@section('content')
    <div class="product-section mt-10 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>

                            @foreach ($categories as $item)
                            <li data-filter="._{{$item -> id}}">{{$item -> name}}</li>
                            @endforeach
                            <li class="active" data-filter="*">الكل</li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">

                @foreach ($products as $item)
                <div class="col-lg-4 col-md-6 text-center _{{$item -> category_id}}">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{$item -> imagepath}}"
                                style="max-height: 250px;min-height: 250px"
                                    alt=""></a>
                        </div>
                        <h3>{{$item -> name}}</h3>
                        <p class="product-price"><span>Price: </span>  {{$item -> price}}$ </p>
                        <p class="product-price"><span>Quantity: </span>  {{$item -> quantity}}$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> إضافة إلى السلة</a>

                        {{-- <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger">
                            <i class="fas fa-trash-alt mr-2"></i>حذف الصنف</a>

                            <a href="/editproduct/{{ $item->id }}" class="btn btn-warning">
                                <i class="fas fa-tag mr-2 "></i>تعديل الصنف</a> --}}
                        </div>

                </div>

                @endforeach

            </div>
            {{ $products->onEachSide(1)->links('') }}


        </div>
    </div>
@endsection


