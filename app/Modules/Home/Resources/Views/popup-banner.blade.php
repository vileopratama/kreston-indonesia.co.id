<div id="popup-banner" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
        <div class="modal-body">
			@foreach($popup_banners as $key => $row)
				<img class="img-responsive" src="{!! asset($row->storage_location) !!}"   />
			@endforeach
		</div>
    </div>
  </div>
</div>