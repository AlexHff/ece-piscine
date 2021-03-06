@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create clothing</div>
                <div class="card-body">
                    <form  method="POST" action="{{ route('items.clothing.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description" value="{{ old('description') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label><span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="number" step="0.01" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Price"min="0" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="units">Units</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="number" class="form-control{{ $errors->has('units') ? ' is-invalid' : '' }}" name="units" placeholder="Units" min="0" value="{{ old('units') }}">
                        </div>
                        <label for="size">Size</label> <span style="color: red !important; display: inline; float: none;">*</span>
                        <select id="size" name="size" class="form-control">
                            <option value="">Select a size</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select><br>
                        <div class="form-group">
                            <label for="image">Image</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="image2">Image 2</label>
                            <input type="file" name="image2">
                        </div>
                        <div class="form-group">
                            <label for="video">Link to video</label>
                            <input type="text" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" placeholder="Link to video" value="{{ old('video') }}">
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
