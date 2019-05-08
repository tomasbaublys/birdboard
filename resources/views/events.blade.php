@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">

        <header class="flex items-center mb-3 pb-4">
        	<div class="flex justify-between items-end w-full">
        		<a href="/events/create" class="button" @click.prevent="$modal.show('new-event')">New Event</a>
        	</div>
        </header>

        <div class="panel-body" >
            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}
        </div>
        
    </div>
    <new-event-modal></new-event-modal>
@endsection