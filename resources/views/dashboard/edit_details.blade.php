@extends('layouts.app_dashboard')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white text-center fw-bold"
                     style="background-color: #2D2800;">
                    تعديل تفاصيل المنتج 
                </div>
                <div class="card-body">
                    <form action="{{ route('update_details', $details->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">اسم المنتج</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ $details->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">السعر</label>
                            <input type="number" name="price" class="form-control"
                                   value="{{ $details->price }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">حالة التوفر</label>
                            <select name="stock_status" class="form-control">

                                <option value="متوفر"
                                    {{ $details->stock_status == 'متوفر' ? 'selected' : '' }}>
                                    متوفر
                                </option>

                                <option value="غير متوفر"
                                    {{ $details->stock_status == 'غير متوفر' ? 'selected' : '' }}>
                                    غير متوفر
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">التقييم</label>
                            <input type="number" name="rating" class="form-control"
                                   min="1" max="5"
                                   value="{{ $details->rating }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الوصف</label>
                            <textarea name="description" class="form-control"
                                      rows="4">{{ $details->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الصورة الحالية</label><br>

                            <img src="{{ asset('images/'.$details->image) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 10px;"
                                 class="mb-2">

                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <button type="submit"
                                class="btn w-100 text-white fw-bold"
                                style="background-color: #2D2800;">
                            تحديث التفاصيل 
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection