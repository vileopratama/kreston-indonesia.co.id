@extends('kreston::page')
@section('breadcrumbs', Breadcrumbs::render('page',$page->slug))
@section('content')
    <div class="row">
        <article class="content col-sm-12 col-md-9">
            {!! isset($page) ? $page->content : null !!}
        </article><!-- .content -->

        <div id="sidebar" class="sidebar col-sm-12 col-md-3">
			@if(count($page_links)>0)
            <aside class="widget menu">
                <header>
                    <h3 class="title">{!! $page->name !!}</h3>
                </header>
                <nav>
					<ul>
						@include('page::sidebar', array('items' => $page_links->roots()))
                    </ul>
                    
                </nav>
            </aside><!-- .menu-->
			@endif
			
			
			
			
        </div><!-- .sidebar -->
    </div>
@endsection


