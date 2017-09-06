@extends('layouts.single')

@section('content')

<section class="section">
    <div class="container">
        <!-- <div class="card-image m-b-20">
            <figure class="image is-16by9">
                <img src="{{  $recipe->image_url_full ? $recipe->image_url_full :  'http://bulma.io/images/placeholders/1280x960.png' }}" alt="">
            </figure>
        </div> -->

        <div class="card-image m-b-20">
            <figure class="owl-carousel  is-16by9">
                @if($recipe->uploads->count())
                    @foreach($recipe->uploads as $upload)
                        <img src="{{ asset('/images/'. $upload->filename) }}" alt="">
                    @endforeach
                @endif
            </figure>
        </div>

      <!--   <figure class="owl-test is-16by9">
            @if($recipe->uploads->count())
                @foreach($recipe->uploads as $upload)
                    <img src="{{ asset('/images/'. $upload->filename) }}" alt="">
                @endforeach
            @endif
        </figure> -->

        <div class="columns">
            <div class="column is-two-thirds">
                <h1 class="title">Zubereitung</h1>
                <p class="m-b-15">
                    {!! $recipe->description !!}
                </p>
                <!-- <h3 class="title is-3 m-t-20">Zutaten</h3>

                <ul>
                    @foreach($recipe->ingredients as $ingredient)
                        <li>{{$ingredient->name}}: {{ $ingredient->unit }} {{ $ingredient->einheit }}</li>
                    @endforeach
                </ul> -->
            <div class="columns m-t-20">
                <div class="column is-half ">
                    <nav class="panel">
                        <p class="panel-heading">
                            Zutaten
                        </p>
                        @foreach($recipe->ingredients as $ingredient)
                            <p class="panel-block">
                                {{$ingredient->name}}: {{ $ingredient->unit }} {{ $ingredient->einheit }}
                            </p>
                        @endforeach
                    </nav>
                </div>
            </div>

            </div>
            <div class="column">
                <div class="box">
                    @if($recipe->categories->count())
                        <h3 class="subtitle">Kategorien</h3>
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        @foreach($recipe->categories as $category)
                                            <a href="#"><span class="tag is-info m-r-5 is-small">{{ $category->name }}</span></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    @endif
                    <hr>
                    @if($recipe->tags->count())
                        <h3 class="subtitle">Anlässe</h3>
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        @foreach($recipe->tags as $tag)
                                            <a href="{{route('single.tag', $tag->slug)}}"><span class="tag is-primary m-r-5 is-small">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    @endif
                    <hr>
                    <h3 class="subtitle">Aktionen</h3>
                        <div class="level">
                            <div class="level-left">
                                <a href="{{ route('account.recipes.edit', $recipe) }}" class="level-item is-small button is-primary">
                                    <span class="icon is-small">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                            </div>
                        </div>
                        <clock></clock>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('single')
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            responsiveClass:true,

        });
    });
</script>

@endpush
