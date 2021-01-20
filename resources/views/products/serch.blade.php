@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-9">
        <div class="container">
            @if ($category !== null)
                <a href="/">トップ</a> > <a href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                <h1>{{ $category->name }}の検索結果：{{$products->count()}}件</h1>
            @endif
        </div>
        <div class="container mt-4">
            <div class="row w-100">
                @foreach($products as $product)
                <div class="col-3">
                    <a href="{{route('products.show', $product)}}">
                        @if ($product->image !== "")
                        <img src="{{ asset('storage/products/'.$product->image) }}" class="h-10 img-fluid">
                        @else
                        <img src="{{ asset('img2/janpsyuugou.jpg')}}" class="h-10 img-fuild">
                        @endif
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="samazon-product-label mt-2">
                                {{$product->name}}<br>
                                <label>￥{{$product->price}}</label>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
         {{ $products->links() }}
    </div>
</div>
@endsection