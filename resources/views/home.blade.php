@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($users as $value)
                        <h2>{{$value->user_name}}</h2>
                    @endforeach
                    <form action="">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
