@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Izmeni korisnika
    </div>

    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Ime*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="email">Email*</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="password">Šifa*</label>
                <input type="text" id="password" name="password" class="form-control" value="{{ old('password', isset($user) ? $user->password : '') }}" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                <label for="role">Uloga*</label>
                <select name="role[]" class="form-control" id="role" multiple >
                    @foreach($roles as $id => $role)
                        <option {{ in_array($id, $user->role->pluck('id')->toArray()) ? 'selected' : null }} value="{{ $id }}">{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('role'))
                    <em class="invalid-feedback">
                        {{ $errors->first('role') }}
                    </em>
                @endif
            </div>
            <div>
                <button class="btn btn-danger" type="submit" >Sačuvaj</button>
            </div>
        </form>
    </div>
</div>
@endsection