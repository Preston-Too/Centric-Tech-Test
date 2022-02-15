@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <div hidden>
                    
                                <input id="user" value={{ Auth::user()->first_name}}/>
                    </div>
                    <table class="table" id="emptbl">
                        <thead>
                            <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($users as $user)
                            <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td><input class="btn btn-danger" type="button" value="delete" onclick="deleteRows(this)" style="font-size:14px;"/></td>
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
<script type="text/javascript">
    function deleteRows(e){
        var table = document.getElementById("emptbl");
        var rowCount = table.rows.length;
		var row = table.deleteRow(rowCount-1);
		rowCount--;

}
</script>
