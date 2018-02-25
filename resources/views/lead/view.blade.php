@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($edit))
            <!-- TODO -->
        @else
            <div class="card">
                <div class="card-header">
                    Lead Details
                </div>
                <div class="card-body">
                    <table class="table table-stripe table-bordered">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Home Square Footage</th>
                        </tr>
                        <tr>
                            <td>{{ $lead->first_name }}</td>
                            <td>{{ $lead->last_name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->phone_number }}</td>
                            <td><address>{{ $lead->address }}</address></td>
                            <td>{{ $lead->home_square_footage }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
