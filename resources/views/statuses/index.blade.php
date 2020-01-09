@extends('layouts.app')

@section('content')
        <div class="level-right" style="margin-bottom: 1.5rem;">
            @can('projects.create')
                <a href="{{ route('statuses.create') }}" class="level-item button is-success">New Status</a>
            @endcan
        </div>
    {{ $table->display() }}
@endsection