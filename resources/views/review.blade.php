@extends('Layouts.Master')


@section('content')
    {{-- Start Form --}}


    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">آراء</span> العملاء</h3>
                        <p> نسعد بقتراحاتكم وارائكم </p>
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
                            <form method="POST" action="storereview" id="fruitkha-contact"
                                onsubmit="return valid_datas( this );">
                                @csrf()
                                <p>
                                    <input type="text" placeholder="الاسم" name="name" id="name"
                                        style="width: 100%" required value="{{ old('name') }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>
                                <p style="display:flex">
                                    <input type="text" placeholder="البريد الإلكتروني" name="email" id="email"
                                        required value="{{ old('email') }}"> <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="text" placeholder="الجوال" name="phone" id="phone" required
                                        value="{{ old('phone') }}"> <span class="text-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="text" placeholder="الموضوع" name="subject" id="subject" required
                                        value="{{ old('subject') }}"><span class="text-danger">
                                        @error('subject')
                                            {{ $message }}
                                        @enderror
                                </p>
                                <p>
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="" required>
                                     {{ old('message') }}
                                </textarea>
                                    <span class="text-danger">
                                        @error('message')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>
                                {{-- <input type="hidden" name="token" value="FsWga4&amp;@f6aw"> --}}


                                <p><input type="submit" value="Save" style="width: 50%"></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        {{-- End Form --}}


        {{-- Start Review --}}

        <div class="testimonail-section mt-80 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="testimonial-sliders">

                            {{-- <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>David Niph <span>Local shop owner</span></h3>
                                    <p class="testimonial-body">
                                        " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                        beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                                        iste natus error sit voluptatem accusantium "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div> --}}
                            @foreach ($review as $item)
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="assets/img/avaters/avatar2.png" alt="">
                                    </div>
                                    <div class="client-meta">
                                        <h3>{{$item -> name}} <span>{{$item -> subject}}</span></h3>
                                        <p class="testimonial-body">
                                            " {{$item -> message}} "
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- End Review --}}
    @endsection
