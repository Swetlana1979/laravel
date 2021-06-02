@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
					<div class="alert alert-success" role="alert">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
						@if(!empty($comments))
							@foreach ($comments as $item)
								
								 <p name='{{$item->id}}'>{{ $item->description }}
									
							     </p>
									@if($item->autor_id==$id)
										<a href=''>Редактировать</a>
									    <a href=''>Удалить</a>
									@else
										<a href=''>Ответить</a>
									@endif
									@if($item->parent_id!=0)
										<a href='{{ $item->parent_id }}'>Ответ на комментарий</a>
									@endif
							@endforeach
					    
					    @endif
						
					</div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
