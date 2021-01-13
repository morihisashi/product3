@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新しい商品を追加</h1>

    <form method="POST" action="/products" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="product-name">商品名</label>
            <input type="text" name="name" id="product-name" class="form-control">
        </div>
        <div class="form-group">
            <label for="product-description">商品説明</label>
            <textarea name="description" id="product-description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="product-price">価格</label>
            <input type="number" name="price" id="product-price" class="form-control">
        </div>
        <div class="form-group">
            <label for="product-category">カテゴリ</label>
            <select name="category_id" class="form-control" id="product-category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-image" class="col-2 d-flex justify-content-start">画像</label>
            <img src="#" id="product-image-preview">
            <input type="file" name="image" id="product-image">
        </div>
        <button type="submit" class="btn btn-success">商品を登録</button>
    </form>

    <a href="/products">商品一覧に戻る</a>
</div>
<script type="text/javascript">
    $("#product-image").change(function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("product-image-preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection