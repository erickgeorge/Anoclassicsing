@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                     <ul class="alert alert-danger" style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li><?php echo $error; ?></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Property</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('postproperty') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control" name="desc" value="{{ old('description') }}" required autocomplete="name" autofocus></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Size</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="size" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Rate</label>

                            <div class="col-md-6">
                                <select class="form-control" name="rate" required>
                                    <option selected  value="">Choose Rate</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Price</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control" name="price" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="In Tshs Format">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Available Quantity</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control" name="quantity" value="{{ old('name') }}" required autocomplete="name" autofocus min="0">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Color</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="color" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Category</label>

                            <div class="col-md-6">
                                <select class="form-control" name="categ" required>
                                    <option selected value="">Choose Category</option>
                                    @foreach($categ as $cat)
                                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Cover Photo</label>

                            <div class="col-md-6">
                                <input id="name" type="file" class="form-control" name="coverphoto" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
