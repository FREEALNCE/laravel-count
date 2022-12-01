@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('message'))

<div class="alert alert-{{Session::get('message_type')}} alert-dismissible fade show" role="alert">
  <strong>{{Session::get('message')}}</strong>
</div>

@endif