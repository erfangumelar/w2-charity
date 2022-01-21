@extends('layouts.app')

@section('title', 'Kategori')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></li>  
    <li class="breadcrumb-item active">Edit</li>  
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
      <form action="{{ route('category.update', $category->id) }}" method="post">
        @csrf
        @method('put')
        
        <div class="card">            
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-dark" type="reset">Reset</button>
              <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection
