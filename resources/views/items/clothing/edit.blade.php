@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit clothing</div>
                <div class="card-body">
                    <form  method="POST" action="/items/{{ $item->id }}/clothing" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description" value="{{ $item->description }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Price" value="{{ $item->price }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="units">Units</label>
                            <input type="number" class="form-control{{ $errors->has('units') ? ' is-invalid' : '' }}" name="units" placeholder="Units" value="{{ $item->units }}" min="0">
                        </div>
                        <label for="size">Size</label>
                        <select id="size" name="size" class="form-control">
                        <option value="{{ $item->clothing->size }}">{{ $item->clothing->size }}</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select><br>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" value="{{ $item->image }}">
                        </div>
                        <div class="form-group">
                            <label for="image2">Image 2</label>
                            <input type="file" name="image2" value="{{ $item->image2 }}">
                        </div>
                        <div class="form-group">
                            <label for="video">Link to video</label>
                            <input type="text" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" placeholder="Video" value="{{ $item->video }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @if ($errors->any())
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
