@if ($errors->any())
<div class="alert alert-danger text-center" role="alert">
    <strong>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </strong>
</div>
@endif