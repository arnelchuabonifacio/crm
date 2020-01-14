@extends('layouts.app')

@section('content')
    <div class="box">
        <h1 class="title is-1">
            {{ $project->title }}
        </h1>
        <div class="body">
            {{ $project->description }}
        </div>
    </div>
    <h2 class="title is-5">Project status</h2>
    <div class="columns">
        <div class="column is-one-fifth">
                <div class="box has-text-centered">
                    <div class="title is-5">
                        {{ $project->status->title }}
                    </div>
                    <div class="subtitle is-2">
                    </div>
                </div>
        </div>
    </div>
@endsection