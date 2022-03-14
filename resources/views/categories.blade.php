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
                <div class="card-header"><a href="{{route('add_category')}}"> New Category</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table" id="myTable">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    <?php $i = 0; ?>

                        <tbody>

                            @foreach($categ as $cat)
                            <tr>
                            <?php $i++; ?>

                                <td scope="row">{{$i}}</td>
                                <td>{{$cat->name}}</td>
                                <td>
                                    <div class="row">
                                    <a style="color: green" data-toggle="modal" data-target="#edit{{$i}}" title="Edit"><i class="fas fa-edit"></i></a>

                                    <form method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this category?')"
                                          action="{{ route('deletecateg', [$cat->id]) }}">
                                        {{csrf_field()}}
                                        <button style="width:20px;height:20px;padding:0px;color:red" type="submit"
                                                title="Deactivate" style="color: red;" data-toggle="tooltip"><i
                                                    class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>

                                <div class="modal fade" id="edit{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                       </div>
                                           <div class="modal-body">
                                           <form method="POST" action="{{route('editcateg',[$cat->id])}}" class="col">

                                               @csrf
                                           <div class="form-group ">
                                               <label for="dep_name">Category Name</label>
                                               <input id="name" style="color: black" type="text" required class="form-control" id="name"
                                                      name="name" value="{{$cat->name}}" placeholder="{{$cat->name}}" >
                                           </div>
                                               <button type="submit" class="btn btn-primary">save
                                               </button>

                                         </form>
                                           </div>



                                       <div class="modal-footer">
                                       </div>
                                   </div>
                               </div>
                           </div>
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
