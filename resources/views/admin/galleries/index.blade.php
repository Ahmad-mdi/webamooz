@extends('admin.layouts.app')

@section('links')
    <link rel="stylesheet" href="/admin/css/dropzone.css">
@endsection

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title"><b class="text-warning">{{$product->name}}</b></p>
                <div class="table__box">
                    <form action="{{route('product.gallery.store',$product->id)}}" method="post" class="dropzone">
                        @csrf
                        <div class="fallback">
                            <input type="file" name="file" multiple >
                        </div>
                    </form>
                </div>
                <br>
                <div class="text-info">این محصول دارای {{$product->galleries->count()}} تصویر میباشد</div>
            </div>

            @foreach($product->galleries as $gallery)
                <div class="col-6 bg-white box__title">
                        <div class="card">
                            <img width="100" src="{{str_replace('public','/storage',$gallery->path)}}" alt="{{$gallery->product->name}}">
                        </div>
                        <div class="card-body">
                            <a href="#">delete</a>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/admin/js/dropzone.js"></script>
@endsection
