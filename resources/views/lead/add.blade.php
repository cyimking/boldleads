@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row text-center mt-5">
            <div class="col-12 lg">
                <h1>Get more listings and buyers.</h1>
                <p>Last year alone, we helped thousands of agents generate over 800,000 buyer and seller leads.</p>
            </div>
            <div class="col-12 mt-3">
                <h1>Get more listings <br> and buyers in your city. </h1>
                <p>Generate buyer and seller leads, automate your follow-up and grow your business.</p>
            </div>
        </div>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Check Availability in Your Area!
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action' => ['LeadController@store']])!!}

                        <div class="form-group">
                            {{ Form::label('first_name', null, ['class' => 'control-label']) }}
                            {{ Form::text('first_name', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('last_name', null, ['class' => 'control-label']) }}
                            {{ Form::text('last_name', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', null, ['class' => 'control-label']) }}
                            {{ Form::email('email', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone_number', null, ['class' => 'control-label']) }}
                            {{ Form::text('phone_number', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <!-- TODO: Connect to Google's API for accurate information -->
                        <div class="form-group">
                            {{ Form::label('address', null, ['class' => 'control-label']) }}
                            {{ Form::text('address', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('home_square_footage', null, ['class' => 'control-label']) }}
                            {{ Form::text('home_square_footage', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        {{ Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg'] )  }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
