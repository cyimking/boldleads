@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($listings) > 0)
            <div class="table">
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Submitted</th>
                        <th></th>
                    </tr>
                    @foreach ($listings as $listing)
                        <tr>
                            <td>{{ $listing->first_name }}</td>
                            <td>{{ $listing->last_name }}</td>
                            <td>{{ $listing->email }}</td>
                            <td>{{ date('M j,Y @ G:i:s A', strtotime($listing->created_at)) }}</td>
                            <td><a href="/listings/{{ $listing->id  }}"> View </a> </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        {{ $listings->links() }}

        @else
            <div class="panel">
                <div class="panel-heading">
                    Important!
                </div>
                <div class="panel-body">
                    No listings...
                </div>
            </div>
        @endif
    </div>
@endsection
