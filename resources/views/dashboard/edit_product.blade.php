@extends('layouts.app_dashboard')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white text-center fw-bold"
                     style="background-color: #2D2800;">
                    تعديل بيانات منتج العسل 
                </div>
                <div class="card-body">
                    <form action="{{ route('update_product', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">اسم المنتج</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   value="{{ $product->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">نوع العسل</label>
                            <input type="text"
                                   class="form-control"
                                   name="type"
                                   value="{{ $product->type }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">السعر</label>
                            <input type="number"
                                   class="form-control"
                                   name="price"
                                   value="{{ $product->price }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الخصم</label>
                            <input type="number"
                                   class="form-control"
                                   name="discount"
                                   value="{{ $product->discount }}">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">الصورة الحالية</label><br>

                            <img src="{{ asset('images/'.$product->image) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 12px;"
                                 class="mb-2">

                            <input type="file"
                                   class="form-control"
                                   name="image"
                                   accept="image/*">
                        </div>

                        <button type="submit"
                                class="btn w-100 text-white fw-bold"
                                style="background-color: rgb(110, 59, 161);">

                            تحديث المنتج 
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection