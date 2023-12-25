@extends('Layouts.Master')


@section('content')
    <div class="product-section mt-100 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">تعديل</span> المنتجات</h3>
                        <p>يمكنك من خلال هذه الصفحة التعديل على أي منتج</p>
                    </div>
                </div>
            </div>
        </div>




        <div class="contact-from-section  mb-150" style="direction: rtl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">

                        <div id="form_status"></div>
                        <div class="contact-form">
                            <form method="POST" action="/storeproduct" id="fruitkha-contact"
                                onsubmit="return valid_datas( this );" enctype="multipart/form-data">
                                @csrf()

                                <p>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        @foreach ($allcategroies as $item)
                                            @if ($product->category_id == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <span class="text-danger">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>

                                <p>
                                    <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                    <input type="text" placeholder="الاسم" name="name" id="name"
                                        style="width: 100%" required value="{{ $product->name }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>
                                <p style="display:flex">
                                    <input type="number" placeholder="السعر" name="price" id="price"
                                        style="width: 50%; margin-left: 1%" required value="{{ $product->price }}"> <span
                                        class="text-danger">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="number" placeholder="الكمية" name="quantity" id="quantity"
                                        style="width: 50%" required value="{{ $product->quantity }}"> <span
                                        class="text-danger">
                                        @error('quantity')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    {{-- <input type="text" placeholder="Subject" name="subject" id="subject"> --}}
                                </p>
                                <p>
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="وصف المنتج" required>
                                         {{ $product->description }}
                                    </textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>

                                <p> <input type="file" name="photo" id="photo" class="form-control"
                                        accept="image/*" onchange="displaySelectedImage(event)">

                                    <span class="text-danger">
                                        @error('photo')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>

                                <P class="text-center">
                                    <img src="{{ asset($product->imagepath) }}" height="250" width="250" id="selectedphoto">

                                    <script>
                                        function displaySelectedImage(event) {
                                            const imageInput = document.getElementById('photo');
                                            const selectedImage = document.getElementById('selectedphoto');

                                            if (imageInput.files && imageInput.files[0]) {
                                                const reader = new FileReader();

                                                reader.onload = function (e) {
                                                    selectedImage.src = e.target.result;
                                                };

                                                reader.readAsDataURL(imageInput.files[0]);
                                            }
                                        }
                                    </script>
                                </P>
                                <p><input type="submit" value="Save" style="width: 20%"></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
