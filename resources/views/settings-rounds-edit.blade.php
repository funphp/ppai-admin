@extends('panelViews::mainTemplate')
@section('page-wrapper')
<script src="{{asset("common.js")}}"></script>
<div class="col-xs-4">
	<select name="category" onchange="showRound('{{$event->id}}',this.value);">
		@foreach ($event->categories as $cat)
			<option value="{{ $cat->id }}" {{($category->id===$cat->id)?'selected="selected"':''}}>{{ $cat->name }}</option>
		@endforeach

	</select>
</div>
<form name="roundsetup" action="/panel/rounds-settings/edit/{{$event->id}}/{{$category->id}}" method="post">
<div class="row">
		<div class="col-xs-4">
		<div>
		<h3>Rounds Settings for <b>{{$category->name}}</b></h3>
		<select multiple="multiple" size="10" name="roundlistbox[]">
		@foreach ($rounds as $round)
		 <option value="{{ $round->id }}" {{($round->isSelected)?'selected="selected"':''}}>{{ $round->name }}</option>
		@endforeach
      
    </select>
    </div>
    <div class="clearfix"></div>
    <button type="submit" class="btn btn-default btn-block">Update</button>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
</div>
</div>
</form>

<!-- Code -->

@stop