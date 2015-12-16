@extends('panelViews::mainTemplate')
@section('page-wrapper')
<script src="{{asset("common.js")}}"></script>
<form name="roundsetup" action="/panel/settings/edit/{{$event->id}}" method="post">
<div class="row">
		<div class="col-xs-4">
		<div>
		<h3>Category Settings for <b>{{$event->name}}</b></h3>
		<select multiple="multiple" size="10" name="catlistbox[]">
		@foreach ($categories as $cat)
		 <option value="{{ $cat->id }}" {{($cat->isSelected)?'selected="selected"':''}}>{{ $cat->name }}</option>
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