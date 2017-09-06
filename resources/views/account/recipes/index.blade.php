@extends('account.layouts.default')

@section('account.content')
<h1 class="title">
    Deine Rezepte
</h1>

@if($recipes->count())
    @foreach($recipes as $recipe)
        <article class="media">
                <figure class="media-left">
                    <p class="image is-128x128">
                        <img src=" {{ $recipe->image_url ? $recipe->image_url : "http://bulma.io/images/placeholders/128x128.png"}} ">
                        <!-- <img src="http://bulma.io/images/placeholders/128x128.png"> -->
                    </p>
                </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>
                            <a href="{{route('home.show', $recipe)}}">{{ $recipe->name }}</a>
                        </strong>
                        <br>
                        {!! $recipe->excerpt !!}
                    </p>
                </div>
                <div class="level">
                    <div class="level-left">
                        <a href="{{ route('home.show', $recipe) }}" class="level-item">
                            <span class="icon is-small"><i class="fa fa-eye"></i></span>
                        </a>
                        <a href="{{ route('account.recipes.edit', $recipe) }}" class="level-item">
                            <span class="icon is-small"><i class="fa fa-pencil"></i></span>
                        </a>
                        <a href="" class="level-item">
                            <span class="icon is-small"><i class="fa fa-trash-o"></i></span>
                        </a>
                    </div>
                </div>
            </div>

        </article>
    @endforeach
@else
    <p class="has-text-danger">Keine Rezepte vorhanden!</p>
@endif
@endsection
