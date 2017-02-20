@extends('administrator::layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="mail-toolbar m-b-lg">
                <div class="btn-group" role="group">
                    <a href="#" class="btn btn-default">{!! (isset($event) ? $event->name:'') !!}</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="{!! url('gallery/administrator/create') !!}" class="btn btn-primary btn-sm color-white"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
                    <a href="{!! url('gallery/administrator/upload/'.Crypt::encrypt($event->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.upload") !!}</a>
                    <a href="{!! url('gallery/administrator/status/'.Crypt::encrypt($event->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($event) && $event->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
                    <a href="{!! url('gallery/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
                </div>

                <div class="btn-group pull-right" role="group">
                    {!! $photos->appends(\Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>
	
    <div id="gallery" class="gallery m-b-lg">
        <div class="row">
            @foreach($photos as $key => $photo)
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="gallery-item">
                    <div class="thumb">
                        <a href="{!! url($photo->photo_storage_location) !!}" data-lightbox="gallery-1" data-title="gallery image">
                            <img class="img-responsive" src="{{ url(ImageManager::getImagePath($photo->photo_storage_location, 297, 157, 'crop')) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="{!! Theme::asset('libs/bower/lightbox2/dist/css/lightbox.min.css') !!}" />
@endpush
@push('scripts')
    <script src="{!! Theme::asset('libs/bower/lightbox2/dist/js/lightbox.min.js') !!}"></script>
@endpush