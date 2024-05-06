@extends('layout.theme')

@section('post')

<style>
    .table-responsive{
        border: 2px solid rgb(246, 43, 43);
        border-radius: 12px;
        overflow-x: auto;
    }
</style>
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
