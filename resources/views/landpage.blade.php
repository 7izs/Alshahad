@extends('layouts.app')

@section('content')

<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold text-dark position-relative pb-2">
                 منتجات العسل المتاحة
                <span class="position-absolute bottom-0 start-0 bg-warning"
                      style="height: 3px; width: 60px;"></span>
            </h2>
            <span class="badge bg-dark rounded-pill px-3 py-2">
                عدد المنتجات: {{ $products->count() }}
            </span>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($products as $product)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm custom-card-hover">
                    <img src="{{ asset('images/'.$product->image) }}"
                         class="card-img-top"
                         style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center p-4">

                        <h5 class="fw-bold mb-2">
                            {{ $product->name }}
                        </h5>

                        <p class="text-muted mb-2">
                            {{ $product->type }}
                        </p>

                        <p class="fw-bold mb-2">
                             {{ $product->price }} ر.س
                        </p>

                        @if($product->discount)
                            <span class="badge bg-success mb-2">
                                خصم {{ $product->discount }}%
                            </span>
                        @endif

                    </div>

                    <div class="card-footer bg-transparent border-0 text-center pb-4">

                        <a href="{{ route('products.show', $product->id) }}"
                           class="btn btn-outline-warning rounded-pill px-4 btn-sm fw-bold">
                            عرض التفاصيل 
                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<style>
.custom-card-hover {
    transition: all 0.3s ease-in-out;
}

.custom-card-hover:hover {
    transform: translateY(-10px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.15) !important;
}
</style>

@endsection