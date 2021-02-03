@extends('layouts.app')

@section('content')
<div class="container">
    <body>
        <h1>検索結果</h1>
        @if(env('APP_ENV') === 'local')
            @if (count($products) !== 0)
                @foreach($products as $product)
                    <div class="col-3">
                        <a href="{{route('products.show', $product)}}">
                        <img src="{{ asset('storage/products/'.$product->image) }}" class="h-10 img-fluid">
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
            @else
                <a>検索結果がありません</a>
            @endif
        @endif
        @if(config('app.env') === 'production')
            @if (count($products) !== 0)
                @foreach($products as $product)
                    <div class="col-3">
                        <a href="{{route('products.show', $product)}}">
                        <img src="{{ Storage::disk('s3')->url($product->image) }}" id="product-image-preview" class="h-10 img-fluid">
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
            @else
                <a>検索結果がありません</a>
            @endif
        @endif
        <br>
        <a href="/products" class="btn btn-success">商品一覧に戻る</a>
    
    </body>
</div>
@endsection