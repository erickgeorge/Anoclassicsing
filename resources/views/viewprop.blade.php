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
                <div class="card-header">Edit Property</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editpostproperty',[$prop->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$prop->name}}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="desc" value="{{ $prop->description }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Size</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="size" value="{{$prop->size}}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Rate</label>

                            <div class="col-md-6">
                                <select class="form-control" name="rate" required>
                                    <option selected  value="{{$prop->rate}}">{{$prop->rate}}</option>
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
                                <input id="name" type="number" class="form-control" name="price" value="{{ $prop->price}}" required autocomplete="name" autofocus placeholder="In Tshs Format">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Available Quantity</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control" name="quantity" value="{{$prop->quantity}}" required autocomplete="name" autofocus min="0">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Color</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="color" value="{{ $prop->color}}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Category</label>

                            <div class="col-md-6">
                                <select class="form-control" name="categ" required>
                                    <option selected value="{{$prop->category}}">{{$prop->category}}</option>
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
            <hr>
        </div>



        <br>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Other Photo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('postphoto',[$ids]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Other Photo</label>

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
            <hr>
        </div>

        <br>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Photos</div>

                <div class="card-body">

        <table class="table" id="myTable">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
             <tbody>

                <?php $i = 0; ?>

                @foreach($picture as $pic)
                <tr>
                <?php $i++; ?>

                    <td scope="row">{{$i}}</td>
                    <td> <img class="card-img rounded-0 img-fluid" src="../../erick/{{$pic->name}}" style="height:60px; width:60px"></td>
                    <td>
                        <div class="row">
                        <form method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this photo?')"
                              action="{{ route('deletephoto', [$pic->id]) }}">
                            {{csrf_field()}}
                            <button style="width:20px;height:20px;padding:0px;color:red" type="submit"
                                    title="Deactivate" style="color: red;" data-toggle="tooltip"><i
                                        class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach

            </tbody>
        </table>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
