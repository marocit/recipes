@extends('account.layouts.default')

@section('account.content')

<h1 class="title m-t-20">Make changes to {{ $tag->name }}</h1>
<form action="{{route('account.tag.update', $tag)}}" method="post" class="form">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <!-- <div class="field">
        <div id="file" class="dropzone"></div>
    </div> -->

    <div class="field">
        <label for="name" class="label">Name</label>
        <p class="control">
            <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name') ? old('name') : $tag->name }}">
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
            <input type="text" name="slug" id="slug" class="input {{ $errors->has('slug') ? 'is-danger' : '' }}" value="{{ old('slug') ? old('slug') : $tag->slug }}">
        </p>
        @if($errors->has('slug'))
            <p class="help is-danger">
                {{ $errors->first('slug') }}
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
