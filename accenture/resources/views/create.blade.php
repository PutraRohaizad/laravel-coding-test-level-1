@extends('layouts.app')

@section('content')
<h5>Creare new events</h5>

<div class="card">
    <div class="card-body">
        <form id="create">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
            </div>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Go back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection

@push('js')
    <script>
        $('#create').on('submit', async function(e){
            e.preventDefault();
            if(confirm('Are you sure?')){
                const url = '/api/v1/events';
                const form = $('#create')[0];
                const formData = new FormData(form);
                try{
                    let res = await axios.post(url, formData);
                    if(res){
                        alert('Successful created');
                       form.reset();
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