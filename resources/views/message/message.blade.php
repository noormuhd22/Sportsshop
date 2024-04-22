@extends('layout.theme')

@section('post')
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($message as $messages)
            <tr>
                <td>{{ $messages->email }}</td>
                <td>{{ $messages->mobile }}</td>
                <td>{{ $messages->message }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
