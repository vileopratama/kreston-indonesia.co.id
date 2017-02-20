@foreach(\App\Modules\Post\Model\Post::where('type' => $post)->get() as $key => $row_post)
    <li class="item-bg item-danger">
        <a href="{!! url(str_to_lower($row_post->type).'/'.$row_post->id.'/'.Str::slug($row_post->title,'-')) !!}">{!! $row_post->title !!}</a>
    </li>
@endforeach