@foreach($comm as $it)
	@if( $it['parent_id']==$it['id'])
	 <p>&nbsp&nbsp&nbsp&nbsp{{$users->find($it->autor_id)->name }}{{':'}}</p>
	<p name="{{$item['id']}}"> &nbsp&nbsp	{{ $it['description'] }}
	@if($it['autor_id']==$id)									
	<br>&nbsp&nbsp&nbsp&nbsp<a href="{{ route('edit-comment', ['id' => $it['id'], 'user_id' => $it['user_id'], 'parent_id'=>$it['parent_id'], 'description' => $it['description']]) }}">Редактировать</a>
	<a href="{{ route('comments-delete', $it->id) }}">Удалить</a>
	@else
	<br>&nbsp&nbsp&nbsp&nbsp<a href="{{ route('reply-to-comment', ['parent_id'=>$it['id'], 'user_id' => $it['user_id']]) }}"> Ответить</a>
	@endif
	</p>
	<ul class="comments_list__children">
    @each('comments.show', $comm->children, 'comm')
  </ul>
										
@endforeach