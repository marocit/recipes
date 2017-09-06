@extends('layouts.tag')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title has-text-centered primary">Einkaufsliste für das Event: {{$tags->name}}</h1>
                <h2 class="subtitle has-text-centered">
                    @foreach($recipes as $recipe)

                        <small>{{$recipe->name}}</small><br>

                    @endforeach
                </h2>
                <ul>
                    @foreach($table as $name=>$tests)
                    <li>
                        {{$tests->name}}
                        <strong>{{$tests->unit}}</strong> {{$tests->einheit}}

                    </li>


                    @endforeach
                </ul>
            </div> <!-- END Card-content !-->
            <footer class="card-footer">
                <strong class="card-footer-item">Zutaten: {{$zutaten}}</strong>
                <a class="card-footer-item">Edit</a>
            </footer>
        </div>
    </div>

@endsection
