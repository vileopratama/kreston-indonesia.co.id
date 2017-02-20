@extends('administrator::layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="mail-toolbar m-b-lg">
                <div class="btn-group" role="group">
                    <a href="#" class="btn btn-default">{!! Lang::get('contact-us::app.contact us') !!}</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="{!! url('contact-us/administrator/create') !!}" class="btn btn-primary btn-sm color-white"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
                    <a href="{!! url('contact-us/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> {!! Lang::get("action.refresh") !!}</a>
                </div>

                <div class="btn-group pull-right" role="group">
                    {!! $contacts->appends(\Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($contacts as $key => $contact)
            <div class="col-md-4 col-sm-6" id="row-{!! $contact->id !!}">
                <div class="widget">
                    <header class="widget-header"><h4 class="widget-title widget-primary">{!! $contact->name !!} <span class="badge">{!! $contact->order !!}</span> </h4></header>
                    <hr class="widget-separator">
                    <div class="widget-body p-h-lg">
                        <div class="media">
                            <div class="media-body">
                                <!--<small class="media-meta"><i class="fa fa-user"></i> $contact->contact_name</small>
                                <br/>-->
                                <small class="media-meta"><i class="fa fa-map-marker"></i> {!! $contact->address !!}</small>
                                <br/>
                                <small class="media-meta"><i class="fa fa-map"></i> {!! $contact->city !!} {!! $contact->zip_code !!}</small>
                                <br/>
                                <small class="media-meta"><i class="fa fa-flag"></i> {!! $contact->country !!}</small>
                                <br/>
                                <small class="media-meta"><i class="fa fa-phone"></i> {!! $contact->phone_number !!}</small>
                                <br/>
                                <small class="media-meta"><i class="fa fa-fax"></i> {!! $contact->fax_number !!}</small>
                                <br/>
                                <small class="media-meta"><i class="fa fa-envelope"></i> {!! $contact->email !!}</small>
                                <br/>
                                <small class="media-meta"><i class="fa fa-globe"></i> {!! $contact->website !!}</small>

                            </div>

                        </div>
                    </div>
                    <footer class="widget-footer bg-primary">
                        <span class="small-chart pull-right">
                            <div class="btn-group" role="group">
                                <a href="{!! url('contact-us/administrator/status/'.Crypt::encrypt($contact->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($contact) && $contact->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
                                <a href="{!! url('contact-us/administrator/edit/'.Crypt::encrypt($contact->id)) !!}" class="btn btn-primary btn-sm color-white"><i class="fa fa-plus"></i> {!! Lang::get("action.edit") !!}</a>
                                <a href="#" id="{!! Crypt::encrypt($contact->id) !!}" class="btn btn-primary btn-sm color-white delete" ><i class="fa fa-trash"></i> {!! Lang::get("action.remove") !!}</a>
                            </div>
                        </span>
                    </footer>
                </div>

            </div>
        @endforeach
    </div>

@endsection
@push("scripts")
<script type="text/javascript">
    $(function() {
        $('.delete').on('click', function(event) {
            event.preventDefault();
            $("div#divLoading").addClass('show');
            var id = $(this).attr("id");
            $.confirm({
                title: '{!! Lang::get("action.confirm") !!}',
                content: '{!! Lang::get("action.confirm delete") !!}',
                confirm: function(){
                    $.ajax({
                        type  : "post",
                        url   : "{!! url('contact-us/administrator/delete') !!}",
                        data  : {id : id},
                        dataType: "json",
                        cache : false,
                        beforeSend: function(xhr) {xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf_token"]').attr('content'))},
                        success : function(response) {
                            $("div#divLoading").removeClass('show');
                            if(response.success == true) {
                                $("#row-" + response.id).remove();

                            }

                            $.alert(response.message);
                        },
                        error : function() {
                            $("div#divLoading").removeClass('show');
                        }
                    });

                },
                cancel: function(){
                    $("div#divLoading").removeClass('show');
                }
            });
        });
    });
</script>
@endpush