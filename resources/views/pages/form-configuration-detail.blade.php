@extends('template')

@section('content')
    <div class="container">
        @if ($formDetail != null)
            <h1>Update Form: {{$formDetail->Title}}</h1>
        @else
            <h1>Add new Form</h1>
        @endif
    </div>

    <form-configuration form-id="{{$formDetail->ID ?? 0}}">
    </form-configuration>
@endsection
