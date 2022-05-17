@extends('layouts.app')

@section('content')
<a href="{{ route('events.index') }}" class="btn btn-secondary my-3">Events</a>
<h5>JSON PLACEHOLDER</h5>

<div id="output"></div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        async function fetchData(){
            try{
                const url = 'https://jsonplaceholder.typicode.com/posts';
                const res = await axios.get(url);
                let output = '';
                res.data.forEach(data => {
                    console.log(data.title);
                    output +=  `<li>${data.title}</li>`;
                });

                $('#output').append(output);
            }
            catch(e){
                console.log(e);
            }
        }

        fetchData();
    });
</script>
@endpush