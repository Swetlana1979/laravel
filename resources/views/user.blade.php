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
							@php 
								$comm = $comments->toArray();
								$array = array();
							@endphp
							@foreach ($comments as $item)
							    @if($item -> parent_id == 0)
								<p name='{{$item->id}}'>
								{{ $item->description }}
								
								@if($item->autor_id==$id)
									<br><a href=''>Редактировать</a>
									<a href=''>Удалить</a>
								@else
									<br><a href=''>Ответить</a>
								@endif
								@endif
								@php 
									$par=$item->id; 
									unset($comm[$par]); 
								@endphp
								@foreach ($comm as $it)
									@if($it['parent_id']==$par )
										<p>{{ $it['description'] }}
										@php $n=$it['id']; 
											$array[]=$n;
										@endphp
										@if($it['autor_id']==$id)
										<br><a href=''>Редактировать</a>
										<a href=''>Удалить</a>
										@else
											<br><a href=''>Ответить</a>
										@endif
										</p>
									@endif
								@endforeach
							@endforeach
							
					    </p>
					    @endif
						
					</div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
