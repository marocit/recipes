@extends('layouts.home')

@section('content')

<div class="columns is-multiline is-desktop m-t-100">
    @foreach($recipes as $recipe)
        <div class="column is-one-quarter">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        @if($recipe->image_url_full)
                            <img src="{{  $recipe->image_url_full  }}" alt="">
                        @else
                            <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
                        @endif
                    </figure>
                </div>
                <div class="card-content">
                    <h3 class="has-text-centered title is-4"><a href="{{route('home.show', $recipe->slug)}}">{{ $recipe->name }}</a></h3>
                      <div class="content">
                        <!-- <div class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    @foreach($recipe->tags as $tag)
                                        <a href="{{route('single.tag', $tag->slug)}}"><span class="tag is-info m-r-5 is-small">{{ $tag->name }}</span></a>
                                    @endforeach
                                </div>
                            </div>
                        </div> -->
                        <h4 class="">Anlässe</h4>
                        <div class="tags">
                            @foreach($recipe->tags as $tag)
                                <a href="{{route('single.tag', $tag->slug)}}"><span class="tag is-info m-r-5 is-small">{{ $tag->name }}</span></a>
                            @endforeach
                        </div>

                        <h4 class="">Kategorien</h4>
                        <div class="tags">
                            @foreach($recipe->categories as $category)
                                <a href="#"><span class="tag is-info m-r-5 is-small">{{ $category->name }}</span></a>
                            @endforeach
                        </div>
                            <!-- {!! $recipe->excerpt !!} -->

                      </div>
              </div> <!-- END Card-content !-->
          </div>
      </div>
    @endforeach
</div>


@endsection
