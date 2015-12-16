@extends('panelViews::mainTemplate')
@section('page-wrapper')
<script src="{{asset("common.js")}}"></script>
<div class="row">
		<div class="col-xs-4">
		<select name="category" onchange="showRound('{{$events->id}}',this.value);">
		@foreach ($events->categories as $category)
		 <option value="{{ $category->id }}">{{ $category->name }}</option>
		@endforeach
      
    </select>
		</div>
</div>

<!-- Code -->

@stop