@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Available Forms</h1>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{url('/form-config/0')}}" class="btn btn-info">Add new Form</a>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Version</th>
                    <th>Mapped To</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($allForms as $vueForm)
                    <tr>
                        <td>{{$vueForm->ID}}</td>
                        <td>{{$vueForm->Title}}</td>
                        <td>{{$vueForm->Version}}</td>
                        <td>{{$vueForm->mappedRoute->path ?? "Unmapped"}}</td>
                        <td>
                            <a href="{{url('/form-config/' . $vueForm->ID)}}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
