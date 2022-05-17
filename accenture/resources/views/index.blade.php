@extends('layouts.app')

@section('content')
<h5>List of events</h5>
<a href="{{ route('events.create') }}" class="btn btn-secondary my-3">New record</a>
<a href="{{ route('external-api') }}" class="btn btn-secondary my-3">JSON PLACEHOLDER API</a>

<div class="table-responsive">
    <table class="table table-card table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->name }}</td>
                <td>
                    <span class="badge badge-primary">
                        {{ $event->slug }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('events.show', $event) }}" class="btn btn-secondary">Show</a>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-info">Edit</a>
                    <button onclick="deleteEvent({{ $event }})" class="btn btn-secondary">Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10">
                    <div class="alert-warning p-3">No Record</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="m-3">
    {{ $events->links("pagination::bootstrap-4") }}
</div>
@endsection

@push('js')
<script>
    async function deleteEvent(event){
            if(confirm('Are you sure?')){
                const url = `/api/v1/events/${event.id}`;
                const form = $('#edit')[0];
                try{
                    let res = await axios.delete(url);
                    if(res){
                        alert(`Successful deleted ${event.name}`);
                        location.reload();
                    }
                }
                catch(e){
                console.error(e);
                alert('There is an error');
                const errors = e.response.data.errors;
                const arrayErrors = Object.keys(e.response.data.errors);
                    arrayErrors.forEach(index => {
                    alert(errors[index][0]);
                });
                }
            }
        }
</script>
@endpush