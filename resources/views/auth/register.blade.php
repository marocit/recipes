@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <h1 class="title">Let's get ready to recipe</h1>
                <form action="#" method="POST" class="form">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control">
                            <input type="email" name="email" id="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }} value={{ old('email') }}">
                        </p>
                        @if($errors->has('email'))
                            <p class="help is-danger">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }} value={{ old('name') }}">
                        </p>
                        @if($errors->has('name'))
                            <p class="help is-danger">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password" class="label">Choose a password</label>
                        <p class="control">
                            <input type="password" name="password" id="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}">
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password_confirmation" class="label">Confirm</label>
                        <p class="control">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}">
                        </p>
                        @if($errors->has('password_confirmation'))
                            <p class="help is-danger">
                                {{ $errors->first('password_confirmation') }}
                            </p>
                        @endif
                    </div>

                    <div class="field">
                        <p class="control">
                            <button class="button is-primary">
                                Sign up
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
