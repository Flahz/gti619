@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Ajouter un client</h3>
        <br />

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <form method="post" action="{{ url('client') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" />
            </div>

            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" />
            </div>

            <!-- Dropdown pour sélectionner le rôle -->
            <div class="form-group">
                <label for="role">Type de client</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Sélectionner un rôle --</option>
                    <option value="1">Client d’affaire</option>
                    <option value="2">Client résidentiel</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter" />
            </div>
        </form>
    </div>
</div>
@endsection
