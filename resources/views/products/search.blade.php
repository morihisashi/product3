@extends('layouts.app')

@section('content')
<div class="container">
    <body>
        <h1>検索結果</h1>
        <a>{{$search_name}}</a>
        
        <a href="/products" class="btn btn-success">商品一覧に戻る</a>
    
    </body>
</div>
@endsection