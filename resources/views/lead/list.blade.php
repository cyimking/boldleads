@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($leads) > 0)
            <div class="table">
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Submitted</th>
                        <th></th>
                    </tr>
                    @foreach ($leads as $lead)
                        <tr>
                            <td>{{ $lead->first_name }}</td>
                            <td>{{ $lead->last_name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ date('M j,Y @ G:i:s A', strtotime($lead->created_at)) }}</td>
                            <td><a href="/leads/{{ $lead->id  }}"> View </a> </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        {{ $leads->links() }}

        @else
            <div class="panel">
                <div class="panel-heading">
                    Important!
                </div>
                <div class="panel-body">
                    No leads...
                </div>
            </div>
        @endif
    </div>
@endsection
