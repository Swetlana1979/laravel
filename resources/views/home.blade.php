@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-body">
					<div class="alert alert-success" role="alert">
					
                       
						
                        <div class="alert alert-success" role="alert">
                            {{ $users->find($id)->name }}
                        </div>
                        
						
						@if(!empty($comments))
							@php 
								$comm = $comments->toArray();
								$array = array();
							@endphp
							@foreach ($comments as $item)
							    @if($item -> parent_id == 0)
								<p>{{$users->find($item->autor_id)->name }}{{':'}}</p>
								<p name='{{$item->id}}'>
								{{ $item->description }}
								
									@if($item->autor_id==$id)
									
										<br><a href="{{ route('edit-comment', ['id' => $item->id, 'user_id' => $item->user_id, 'parent_id'=>$item->parent_id, 'description' => $item->description]) }}">Редактировать</a>
										<a href="{{ route('comments-delete', $item->id) }}">Удалить</a>
									@else
										<br><a href="{{ route('reply-to-comment', ['parent_id'=>$item->id, 'user_id' => $item->user_id]) }}"> Ответить</a>
									@endif
								@endif
								@php 
									$par=$item->id; 
									unset($comm[$par]); 
								@endphp
								@foreach ($comm as $it)
									@if($it['parent_id']==$par )
										<p>{{$users->find($it['autor_id'])->name}}</p>
										<p> &nbsp &nbsp  {{ $it['description'] }}
										@php $n=$it['id']; 
											$array[]=$n;
										@endphp
										@if($it['autor_id']==$id)
										
										<br>&nbsp &nbsp <a href="{{ route('edit-comment', ['id'=>$it['id'], 'user_id'=>$it['user_id'], 'parent_id'=>$it['parent_id'], 'description' => $it['description']]) }}">Редактировать</a>
										<a href="{{ route('comments-delete', $item->id) }}">Удалить</a>
										@else
										
											<br>&nbsp &nbsp <a href="{{ route('reply-to-comment', ['parent_id'=>$it['id'], 'user_id' => $it['user_id'] ]) }}">Ответить</a>
										@endif
										</p>
									@endif
								@endforeach
							@endforeach
							
					    </p>
					    @endif
						<form action="{{ route('comments-insert') }}" method='POST'>
						<textarea id='description' name='description'></textarea> 
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input type='submit' value="Добавить комментарий">
						<form/>
						</div>
						<div class='users'>
						{{ 'Список пользователей:' }}
						@foreach($users as $user)
							@if($user->id!=$id)
								<p><a href="{{ route('user-comments-id' ,$user->id)}}">{{$user->name}}</a></p>
							@endif
						@endforeach
						</div>
					
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



