@extends('layouts.app')

@section('content')
<h5>Update Event</h5>

<div class="card">
    <div class="card-body">
        <form id="edit">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $event->name }}">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug" value="{{ $event->slug }}">
            </div>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Go back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection

@push('js')
    <script>
        $('#edit').on('submit', async function(e){
            e.preventDefault();

            if(confirm('Are you sure?')){
                const url = '/api/v1/events/' + "{{ $event->id }}" + '?_method=PUT';
                const form = $('#edit')[0];
                const formData = new FormData(form);
                try{
                    let res = await axios.post(url, formData);
                    if(res){
                        alert('Successful updated');
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
        })
    </script>
@endpush