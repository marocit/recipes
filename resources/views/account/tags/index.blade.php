@extends('account.layouts.default')

@section('account.content')
<h1 class="title">
    Deine Anlässe
</h1>

@if($tags->count())
    @foreach($tags as $tag)
        <article class="media">
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>
                           {{ $tag->name }}
                        </strong>
                    </p>
                </div>
                <div class="level">
                    <div class="level-left">
                        <a href="{{ route('account.tag.edit', $tag) }}" class="level-item">
                            <span class="icon is-small"><i class="fa fa-pencil"></i></span>
                        </a>
                        <tag :tag_id="{{ $tag->id }}"></tag>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@else
    <p class="has-text-danger">Keine Anlässe vorhanden!</p>
@endif
@endsection


