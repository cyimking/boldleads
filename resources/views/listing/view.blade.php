@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($edit))
            <!-- //TODO -->
        @else
            <div class="card">
                <div class="card-header">
                    Listing Details
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
                            <td>{{ $listing->first_name }}</td>
                            <td>{{ $listing->last_name }}</td>
                            <td>{{ $listing->email }}</td>
                            <td>{{ $listing->phone_number }}</td>
                            <td><address>{{ $listing->address }}</address></td>
                            <td>{{ $listing->home_square_footage }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
