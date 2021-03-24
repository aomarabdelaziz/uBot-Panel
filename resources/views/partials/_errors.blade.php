@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </ul>
    </div>



@endif
