@extends('layouts.app')

@section('content')
<h5>Events {{ $event->name }}</h5>
<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" placeholder="Enter name" disabled>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug" value="{{ $event->slug }}" disabled>
            </div>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Go back</a>
        </form>
    </div>
</div>
@endsection