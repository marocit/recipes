@extends('account.layouts.default')

@section('account.content')
<b-tabs size="is-large"  class="block">
<b-tab-item label="Rezept">

<h1 class="title m-t-20">Make changes to {{ $recipe->name }}</h1>
<form action="{{ route('account.recipes.update', $recipe) }}" method="post" class="form">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <!-- <div class="field">
        <div id="file" class="dropzone"></div>
    </div> -->


    <drop
        recipe_id= {{ $recipe->id }}
        csrf="{{ csrf_token() }}"
    ></drop>
    <!-- <input type="hidden" name="live" value="false"> -->

    <div class="field">
        <p class="control">
            <label for="live" class="checkbox">
                <input type="checkbox" name="live" id="live" {{ $recipe->live ? 'checked' : '' }}>
                Live
            </label>
        </p>
    </div>
    <div class="field">
        <label for="name" class="label">Name</label>
        <p class="control">
            <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
            value="{{ old('name') ? old('name') : $recipe->name }}">
        </p>
        @if($errors->has('name'))
            <p class="help is-danger">
                {{ $errors->first('name') }}
            </p>
        @endif
    </div>

    <!-- <div class="field">
        <label for="slug" class="label">Slug</label>
        <p class="control">
            <input type="text" name="slug" id="slug" class="input {{ $errors->has('slug') ? 'is-danger' : '' }}"
            value="{{ old('slug') ? old('slug') : $recipe->slug }}">
        </p>
        @if($errors->has('slug'))
            <p class="help is-danger">
                {{ $errors->first('slug') }}
            </p>
        @endif
    </div> -->

      <div class="field">
        <label for="description" class="label">Beschreibung</label>
        <div class="control">
            <textarea name="description" id="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{old('description') ? old('description') : $recipe->description }}
            </textarea>
        </div>
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

</b-tab-item>

    <b-tab-item label="Zutaten">
        <h1 class="title m-t-20">Zutaten für {{ $recipe->name }}</h1>
        <Ingredient
        :recipe={{ $recipe->id }}
        >
        </Ingredient>
    </b-tab-item>

    <b-tab-item label="Kategorien">
        <h1 class="title m-t-20">Kategorien für {{ $recipe->name }}</h1>
        {!! Form::model($recipe,['class' => 'form', 'method' => 'PATCH', 'route' => ['recipes.category.update', $recipe->id], 'files' =>true]) !!}

            <div class="field">
                <div class="control is-expanded">
                    {!! Form::label('name') !!}
                    <p class="select is-multiple is-primary">
                        {!! Form::select('categories[]', $categories , null, ['id' => 'category_id', 'size' => 15, 'class' => '', 'multiple']) !!}
                    </p>
                </div>
            </div>

            <div class="field is-grouped">
                <p class="control">
                    {!! Form::submit('Update', ['class' => 'button is-primary']) !!}

                </p>
            </div>
        {!! Form::close() !!}
    </b-tab-item>

    <b-tab-item label="Anlässe">
    <div class="columns">
        <div class="column is-half">
            <h1 class="title m-t-20">Anlass für {{ $recipe->name }}</h1>
            {!! Form::model($recipe,['class' => 'form', 'method' => 'PATCH', 'route' => ['recipes.tag.update', $recipe->id], 'files' =>true]) !!}

                <div class="field">
                    <div class="control is-expanded">
                        {!! Form::label('name') !!}
                        <p class="select is-multiple is-primary">
                            {!! Form::select('tags[]', $tags , null, ['id' => 'tag_id', 'size' => 15, 'class' => '', 'multiple']) !!}
                        </p>
                    </div>
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        {!! Form::submit('Update', ['class' => 'button is-primary']) !!}

                    </p>
                </div>
            {!! Form::close() !!}
        <test :recipe={{ $recipe->id }} class="m-b-100"></test>
        </div>
            <amount :recipe={{ $recipe->id }}></amount>



    </div>
    <div class="columns">

    </div>
    </b-tab-item>

</b-tabs>



@endsection

@section('scripts')
    <script type="text/javascript">
    // let drop = new Dropzone('#file', {
    //     createImageThumbnails: true,
    //     addRemoveLinks: true,
    //     url: '{{ route('upload.store', $recipe) }}',
    //     headers: {
    //         'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
    //     }
    // })

     $('#category_id').select2({
      placeholder: 'Wähle eine Kategorie',
      tags: true
    });

    $('#tag_id').select2({
    placeholder: 'Wähle eine Kategorie',
    tags: true
    });

    $('#tags').select2({
      placeholder: 'Wähle einen Anlass',
      tags: true
    });
    </script>
@endsection
