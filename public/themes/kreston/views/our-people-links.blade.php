@foreach($items as $item)
    <li class="@if($item->hasChildren()) {!! 'parent' !!} @endif @if(Request::url()== url($item->url()) || url($item->url())== session('people_office_url')) {!! 'active' !!} @endif">
        <a href="{!! $item->url() !!}">
			@if($item->hasChildren())
			<span class="open-sub"></span>{!! $item->title !!}
			@else
				{!! $item->title !!}
			@endif
        </a>
        @if($item->hasChildren())
            <ul class="sub">
				@include('kreston::our-people-links', array('items' => $item->children()))
            </ul>
        @endif
    </li>
@endforeach

