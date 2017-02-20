@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'page/administrator/update','id'=>'page_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($page) ?  Crypt::encrypt($page->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-newspaper-o"></i>  {!! Lang::get('page::app.page') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('page/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="widget p-lg">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							{!! Form::text('name',isset($page)?$page->name:null, ['class' => 'form-control input-lg','id'=>'title','placeholder'=>Lang::get('page::app.page name'),'maxlength'=>100]) !!}
						</div>
						<div class="form-group">
							{!! Form::select('parent_id',$page_dropdown,isset($page)?$page->parent_id:0, ['class' => 'form-control input-lg','id'=>'parent_id']) !!}
						</div>
						<div class="form-group">
							{!! Form::textarea('content',isset($page)?$page->content:null, ['class' => 'form-control input-lg','id'=>'content','placeholder'=> Lang::get('page::app.content'),'rows' => 20]) !!}
						</div>
						<div class="form-group">
							{!! Form::textarea('short_content',isset($page)?$page->short_content:null, ['class' => 'form-control input-lg','id'=>'short_content','placeholder'=> Lang::get('page::app.short content'),'rows' => 10]) !!}
						</div>
						<div class="form-group">
							{!! Form::select('related_page[]',$page_related,$related_page, ['class' => 'chosen form-control input-lg','id'=>'parent_id','data-placeholder'=> Lang::get('page::app.related page'),'multiple' => true]) !!}
						</div>
						<div class="form-group">
							{!! Form::text('order',isset($page)?$page->order:null, ['class' => 'form-control input-lg','id'=>'order','placeholder'=>Lang::get('page::app.order'),'maxlength'=>6]) !!}
						</div>
						<div class="form-group">
							{!! Form::select('related_navigation[]',$navigation_related,$related_navigation, ['class' => 'chosen form-control input-lg','id'=>'parent_id','data-placeholder'=> Lang::get('page::app.related url'),'multiple' => true]) !!}
						</div>
						<div class="form-group">
							{!! Form::text('meta_keyword',isset($page)?$page->meta_keyword:null, ['class' => 'form-control input-lg','id'=>'meta_keyword','placeholder'=>Lang::get('page::app.meta keyword'),'maxlength'=>255]) !!}
						</div>
						<div class="form-group">
							{!! Form::textarea('meta_description',isset($page)?$page->meta_description:null, ['class' => 'form-control input-lg','id'=>'meta_keyword','placeholder'=>Lang::get('page::app.meta description'),'maxlength'=>255]) !!}
						</div>
						<div class="form-group">
							{!! Form::select('template',$blade_template,(isset($page) ? $page->template : null), ['class' => 'form-control input-lg','id'=>'parent_id','data-placeholder'=> Lang::get('page::app.related page')]) !!}
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
	{!! Form::close() !!}
@endsection

@push('css')
<link href="{!! Theme::asset('administrator::libs/bower/jquery-chosen/chosen.min.css') !!}" rel="stylesheet" />
@endpush
@push('scripts')
	<script src="{!! Theme::asset('administrator::libs/bower/jquery-chosen/chosen.jquery.min.js') !!}"></script>
	<script src="{!! url('vendor/unisharp/laravel-ckeditor/ckeditor.js') !!}"></script>
	<script type="text/javascript">
		$(".chosen").chosen();
		CKEDITOR.config.extraPlugins = 'justify,colorbutton,link';
		CKEDITOR.replace( 'content', {
			toolbarGroups: [
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ,'colors'] },
				{ name: 'styles' },
				{ name: 'insert' },
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup'] },
				{ name: 'links', groups : [ 'link','unlink','anchor' ]},
				{ name: 'tools', groups: [ 'Maximize' ] },
				{ name: 'mode' },
			],
			filebrowserImageBrowseUrl: '{!! url("/") !!}/filemanager?type=Images',
			filebrowserImageUploadUrl: '{!! url("/") !!}/filemanager/upload?type=Images&_token={{csrf_token()}}',
			filebrowserBrowseUrl: '{!! url("/") !!}/filemanager?type=Files',
			filebrowserUploadUrl: '{!! url("/") !!}/filemanager/upload?type=Files&_token={{csrf_token()}}'
		});
		
		CKEDITOR.replace( 'short_content', {
			toolbarGroups: [
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ,'colors'] },
				{ name: 'styles' },
				{ name: 'insert' },
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup'] },
				{ name: 'links', groups : [ 'link','unlink','anchor' ]},
				{ name: 'tools', groups: [ 'Maximize' ] },
				{ name: 'mode' },
			],
		});
	</script>

    <script type="text/javascript">
		$(function() {
			$('#page_form').on('submit', function(event) {
				event.preventDefault();
				$("#divLoading").addClass('show');
				//ckeditor 
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}

				$.ajax({
					type : $(this).attr('method'),
					url : $(this).attr('action'),
					data : $(this).serialize(),
					dataType : "json",
					cache : false,
					beforeSend : function() { console.log($(this).serialize());},
					success : function(response) {
						if(response.success == false) {
							$(".help-block").remove();
							$.each(response.message, function( index,message) {
								var element = $('<p>' + message + '</p>').attr({'class' : 'help-block text-danger'}).css({display: 'none'});
								$('#'+index).after(element);
								$(element).fadeIn();
							});
						}
						else {
							$.alert(response.message);
							$(".help-block").remove();
							window.location = response.redirect;
						}
						
						$("#divLoading").removeClass('show');
					},
					error : function() {
						$("#divLoading").removeClass('show');
					}
				});
				return false;
			});
		});
	</script>
@endpush
