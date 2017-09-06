@extends('account.layouts.default')

@section('account.content')

<h1 class="title">Rezept hinzufügen</h1>
<form action="{{route('account.recipes.store')}}" method="post" class="form">
    {{ csrf_field() }}

    <!-- <div class="field">
        <div id="file" class="dropzone"></div>
    </div> -->

    <div class="field">
        <label for="name" class="label">Name</label>
        <p class="control">
            <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}">
        </p>
        @if($errors->has('name'))
            <p class="help is-danger">
                {{ $errors->first('name') }}
            </p>
        @endif
    </div>

    <div class="field">
        <label for="slug" class="label">Slug</label>
        <p class="control">
            <input type="text" name="slug" id="slug" class="input {{ $errors->has('slug') ? 'is-danger' : '' }}">
        </p>
        @if($errors->has('slug'))
            <p class="help is-danger">
                {{ $errors->first('slug') }}
            </p>
        @endif
    </div>

      <div class="field">
        <label for="description" class="label">Beschreibung</label>
        <p class="control">
            <textarea name="description" id="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"></textarea>
        </p>
        @if($errors->has('description'))
            <p class="help is-danger">
                {{ $errors->first('description') }}
            </p>
        @endif
    </div>

    <div class="field is-grouped">
        <p class="control">
            <button class="button is-primary">Submit</button>
        </p>
    </div>
</form>
@endsection
