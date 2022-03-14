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
                <div class="card-header"><a href="{{route('add_property')}}"> New Properties</a></div>

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
                         <tbody>

                            <?php $i = 0; ?>

                            @foreach($prop as $pro)
                            <tr>
                            <?php $i++; ?>

                                <td scope="row">{{$i}}</td>
                                <td>{{$pro->name}}</td>
                                <td>
                                    <div class="row">
                                 <?php $proid = Crypt::encrypt($pro->id); ?>
                                    <a style="color: green" title="View More" href="{{route('viewproperty',[$proid])}}"><i class="fas fa-eye"></i></a>

                                    <form method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this property?')"
                                          action="{{ route('deleteproperty', [$pro->id]) }}">
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
