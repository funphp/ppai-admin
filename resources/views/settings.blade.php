@extends('panelViews::mainTemplate')
@section('page-wrapper')
<script src="{{asset("common.js")}}"></script>
<div class="row">
		<div class="col-xs-4">
		<select name="event" onchange="showRound(this.value);">
		@foreach ($events as $event)
		 <option value="{{ $event->id }}">{{ $event->name }}</option>
		@endforeach
      
    </select>
		</div>
</div>

<!-- Code -->

@stop