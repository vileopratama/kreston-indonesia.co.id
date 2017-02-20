@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'article/administrator/update','id'=>'article_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($post) ?  Crypt::encrypt($post->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-articlepaper-o"></i>  {!! Lang::get('article::app.article') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('article/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
							{!! Form::text('title',isset($post)?$post->title:null, ['class' => 'form-control input-lg','id'=>'title','placeholder'=>lang::get('article::app.title'),'maxlength'=>100]) !!}
						</div>
						<div class="form-group">
							{!! Form::select('category_id',$category_dropdown,isset($post)?$post->category_id:null, ['class' => 'form-control input-lg','id'=>'category_id','placeholder'=>lang::get('news::app.please select a category')]) !!}
						</div>
						<div class="form-group">
							{!! Form::textarea('content',isset($post)?$post->content:null, ['class' => 'form-control input-lg','id'=>'content','placeholder'=>lang::get('article::app.content'),'rows' => 20]) !!}
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
	{!! Form::close() !!}
@endsection

@push('scripts')
	<script src="{!! url('vendor/unisharp/laravel-ckeditor/ckeditor.js') !!}"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'content', {
			filebrowserImageBrowseUrl: '{!! url("/") !!}/filemanager?type=Images',
			filebrowserImageUploadUrl: '{!! url("/") !!}/filemanager/upload?type=Images&_token={{csrf_token()}}',
			filebrowserBrowseUrl: '{!! url("/") !!}/filemanager?type=Files',
			filebrowserUploadUrl: '{!! url("/") !!}/filemanager/upload?type=Files&_token={{csrf_token()}}'
		});
	</script>

    <script type="text/javascript">
		$(function() {
			$('#article_form').on('submit', function(event) {
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
