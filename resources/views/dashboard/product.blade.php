@extends('layouts.app_dashboard')

@section('content')
<div class="container py-4">

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card shadow-sm border-0">

                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">إضافة منتج عسل</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('save_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">اسم المنتج</label>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}">

                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">نوع العسل</label>
                            <input type="text"
                                   name="type"
                                   class="form-control @error('type') is-invalid @enderror"
                                   value="{{ old('type') }}">

                            @error('type')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">السعر</label>
                            <input type="number"
                                   name="price"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price') }}">

                            @error('price')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الخصم</label>
                            <input type="number"
                                   name="discount"
                                   class="form-control @error('discount') is-invalid @enderror"
                                   value="{{ old('discount') }}">

                            @error('discount')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الصورة</label>
                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/*">

                            @error('image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-warning w-100 fw-bold">
                            حفظ المنتج
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm border-0">

                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <span>المنتجات</span>
                    <span class="badge bg-warning text-dark">
                        {{ $product->count() }}
                    </span>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>النوع</th>
                                <th>السعر</th>
                                <th>خصم</th>
                                <th>الصورة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($product as $item)
                            <tr>
                                <td>{{ $item->id }}</td>

                                <td class="fw-bold">{{ $item->name }}</td>

                                <td>{{ $item->type }}</td>

                                <td>{{ $item->price }} ر.س</td>

                                <td>
                                    @if($item->discount)
                                        <span class="badge bg-success">{{ $item->discount }}%</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td>
                                    <img src="{{ asset('images/'.$item->image) }}"
                                         width="60"
                                         height="60"
                                         class="product-img">
                                </td>

                                <td>
                                    <div class="d-flex gap-1 justify-content-center">

                                        <a href="{{ route('edit_product',$item->id) }}"
                                           class="btn btn-sm btn-primary">
                                            تعديل
                                        </a>

                                        <a href="{{ route('delete_product',$item->id) }}"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                            حذف
                                        </a>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>

{{-- نجوم --}}
<style>
.product-img {
    object-fit: cover;
    object-position: center;
    border-radius: 8px;
}
</style>

@endsection