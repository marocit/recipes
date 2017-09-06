@extends('account.layouts.default')

@section('account.content')
<h1 class="title">
    Deine Kategorien
</h1>

@if($categories->count())
    @foreach($categories as $category)
        <article class="media">
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>
                           {{ $category->name }}
                        </strong>
                    </p>
                </div>
                <div class="level">
                    <div class="level-left">
                        <a href="{{ route('account.category.edit', $category) }}" class="level-item">Edit</a>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@else
    <p class="has-text-danger">Keine Kategorien vorhanden!</p>
@endif
@endsection
