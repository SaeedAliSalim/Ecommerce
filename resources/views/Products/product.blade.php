@extends('Layouts.Master')



@section('content')

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products', ['catid' => $item->category_id]) }}"><img
                                        src="{{ asset($item->imagepath) }}" style="max-height: 250px;min-height: 250px"
                                        alt="">
                                </a>

                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }}$ </p>
                            <p class="product-price"><span>{{ $item->description }}</p>

                            <a href="/addproducttocart/{{ $item->id }}" class="cart-btn">
                            <i class="fas fa-shopping-cart"></i>
                                إضف إلى السلة
                            </a>


                            <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger">
                                <i class="fas fa-trash-alt mr-2"></i>حذف الصنف</a>

                            <a href="/editproduct/{{ $item->id }}" class="btn btn-warning">
                                <i class="fas fa-tag mr-2 "></i>تعديل الصنف</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
