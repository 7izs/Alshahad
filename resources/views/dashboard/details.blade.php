@extends('layouts.app_dashboard')

@section('content')
<div class="container py-4">

    <div class="row g-4">

        {{-- إضافة تفاصيل --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">

                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">تفاصيل المنتج</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('save_details') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- الاسم --}}
                        <input type="text"
                               name="name"
                               class="form-control mb-1 @error('name') is-invalid @enderror"
                               placeholder="اسم المنتج"
                               value="{{ old('name') }}">

                        @error('name')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        {{-- السعر --}}
                        <input type="number"
                               name="price"
                               class="form-control mb-1 @error('price') is-invalid @enderror"
                               placeholder="السعر"
                               value="{{ old('price') }}">

                        @error('price')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        {{-- الحالة --}}
                        <select name="stock_status"
                                class="form-control mb-1 @error('stock_status') is-invalid @enderror">

                            <option value="متوفر">متوفر</option>
                            <option value="غير متوفر">غير متوفر</option>

                        </select>

                        @error('stock_status')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        {{-- ⭐ التقييم (كما هو بدون أي تغيير) --}}
                        <div class="mb-3">
                            <label class="form-label mb-1">التقييم</label>

                            <div class="stars">
                                <span class="star" data-value="1">★</span>
                                <span class="star" data-value="2">★</span>
                                <span class="star" data-value="3">★</span>
                                <span class="star" data-value="4">★</span>
                                <span class="star" data-value="5">★</span>
                            </div>

                            <input type="hidden"
                                   name="rating"
                                   class="rating-input @error('rating') is-invalid @enderror"
                                   value="{{ old('rating') }}">
                        </div>

                        @error('rating')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        {{-- الوصف --}}
                        <textarea name="description"
                                  class="form-control mb-1 @error('description') is-invalid @enderror"
                                  placeholder="الوصف">{{ old('description') }}</textarea>

                        @error('description')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        {{-- الصورة --}}
                        <input type="file"
                               name="image"
                               class="form-control mb-1 @error('image') is-invalid @enderror"
                               accept="image/*">

                        @error('image')
                            <div class="text-danger small mb-3">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-warning w-100 fw-bold">حفظ</button>

                    </form>

                </div>
            </div>
        </div>

        {{-- عرض التفاصيل --}}
        <div class="col-lg-8">
            @forelse($details as $d)

            <div class="card shadow-sm border-0 mb-3">

                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-3 text-center">
                            <img src="{{ asset('images/'.$d->image) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 12px;">
                        </div>

                        <div class="col-md-6">

                            <h5 class="fw-bold mb-1">{{ $d->name }}</h5>

                            <p class="text-muted mb-2">{{ $d->description }}</p>

                            <div class="d-flex gap-3">
                                <span> {{ $d->price }} ر.س</span>
                                <span><i class="bi bi-star-fill" style="color:#ffc107;"></i>
                                    {{ $d->rating ?? '5.0' }}/5
                                 </span>
                            </div>

                        </div>

                        <div class="col-md-3 text-center">

                            <a href="{{ route('edit_Details',$d->id) }}"
                               class="btn btn-sm btn-primary w-100 mb-2">
                                تعديل
                            </a>

                            <a href="{{ route('delete_details',$d->id) }}"
                               class="btn btn-sm btn-danger w-100">
                                حذف
                            </a>

                        </div>

                    </div>

                </div>
            </div>

            @empty
                <p class="text-center text-muted">لا يوجد تفاصيل حتى الآن</p>
            @endforelse
        </div>

    </div>

</div>

{{-- نجوم --}}
<style>
.star {
    font-size: 26px;
    cursor: pointer;
    color: #ccc;
    transition: 0.2s;
}

.star.active {
    color: gold;
}

</style>

{{--  JS نجوم --}}
<script>
document.querySelectorAll(".stars").forEach(container => {

    const stars = container.querySelectorAll(".star");
    const input = container.nextElementSibling;

    stars.forEach(star => {
        star.addEventListener("click", () => {

            let value = star.dataset.value;
            input.value = value;

            stars.forEach(s => s.classList.remove("active"));

            for (let i = 0; i < value; i++) {
                stars[i].classList.add("active");
            }

        });
    });

});
</script>

@endsection