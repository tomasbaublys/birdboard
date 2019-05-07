@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">

        <div class="panel-heading">
               MY Calender    
        </div>

        <div class="panel-body" >
            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}
        </div>
        
    </div>
@endsection