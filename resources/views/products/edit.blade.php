@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品情報更新</h1>

    <form method="POST" action="/products/{{ $product->id }}" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="product-name">商品名</label>
            <input type="text" name="name" id="product-name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="product-description">商品説明</label>
            <textarea name="description" id="product-description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="product-price">価格</label>
            <input type="number" name="price" id="product-price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="product-category">カテゴリ</label>
            <select name="category_id" class="form-control" id="product-category">
                @foreach ($categories as $category)
                @if ($category->id == $product->category_id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label class="col-2 d-flex justify-content-start">画像</label>
            @if(env('APP_ENV') === 'local')
                @if ($product->image !== null)
                <img src="{{ asset('storage/products/'.$product->image) }}" id="product-image-preview" class="img-fluid w-25">
                @else
                <img src="#" id="product-image-preview">
                @endif
            @endif
            @if(env('APP_ENV') === 'production')
                @if ($product->image !== null)
                <img src="{{ secure_asset('storage/products/'.$product->image) }}" id="product-image-preview" class="img-fluid w-25">
                @else
                <img src="#" id="product-image-preview">
                @endif
            @endif
            <div class="d-flex flex-column ml-2">
                <small class="mb-3">600px×600px推奨。<br>商品の魅力が伝わる画像をアップロードして下さい。</small>
                <label for="product-image" class="btn samazon-submit-button">画像を選択</label>
                <input type="file" name="image" id="product-image" onChange="handleImage(this.files)" style="display: none;">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn samazon-submit-button">更新</button>
        </div>
    </form>

    <a href="/products" class="btn btn-success">商品一覧に戻る</a>
</div>
<script type="text/javascript">
    function handleImage(image) {
        let reader = new FileReader();
        reader.onload = function() {
            let imagePreview = document.getElementById("product-image-preview");
            imagePreview.src = reader.result;
        }
        console.log(image);
        reader.readAsDataURL(image[0]);
    }
</script>
@endsection