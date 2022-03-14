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
                <div class="card-header">Messages</div>

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
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                         <tbody>

                            <?php $i = 0; ?>

                            @foreach($message as $ms)
                            <tr>
                            <?php $i++; ?>

                                <td scope="row">{{$i}}</td>
                                <td>{{$ms->name}}</td>
                                <td>{{$ms->email}}</td>
                                <td><textarea class="form-control">{{$ms->message}}</textarea></td>

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
