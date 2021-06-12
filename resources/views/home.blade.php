@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-body">
					<div class="alert alert-success" role="alert">
					
                       
						@if($id_user!=$id)
							<a href="{{ route('home')}}">Мой профиль</a>
						@endif
						
                        <div class="alert alert-success" role="alert">
                            {{ $users->find($id_user)->name }}
                        </div>
                        @php 
							$comm = $comments->toArray();							
						@endphp
						@if(!empty($comm))
							@foreach ($comm as $item)
						       
						       <p>{{$users->find($item['autor_id'])->name }}{{':'}}</p>
							   @php $name='a'.$item['id'] @endphp
								<p><a name="{{$name}}"> 
								@if($item['parent_id']!= 0)
									@php 
										$href='a'.$item['parent_id'];
										$id_comm=$item['parent_id'];
										$des=$comments->find($id_comm)->description
									@endphp
									
									{{'Ответ на:'}}<a href="#{{ $href }}">{{ mb_strimwidth($des, 0, 10, "...") }}</a><br>
							   @endif
								{{ $item['description'] }}</a>	
																
									@if($item['autor_id']==$id)
										<br><a href="{{ route('edit-comment', ['id' => $item['id'], 'user_id' => $item['user_id'], 'parent_id'=>$item['parent_id'], 'description' => $item['description']]) }}">Редактировать</a>
										<a href="{{ route('comments-delete', ['id'=>$item['id'],'user_id'=>$item['user_id']]) }}">Удалить</a>
									@else
										<br><a href="{{ route('reply-to-comment', ['parent_id'=>$item['id'], 'user_id' => $item['user_id']]) }}"> Ответить</a>
									@endif
								</p>
								
								
									
								@endforeach
								
							    
							@endif
						<form action="{{ route('comments-insert') }}" method='POST'>
						<textarea id='description' name='description'></textarea> 
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input type="hidden" name="user_id" value="{{ $id_user }}" />
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



