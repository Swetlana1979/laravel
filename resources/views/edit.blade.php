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
						<a href="{{route('add-comments-cancel')}}">Вернуться</a>
								
						<form action="{{ route('edit-add') }}" method='POST'>
						<input type="hidden" name="id" value="{{ $id }}">
						<textarea id='description' name='description'>{{ $description }}</textarea> 
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						
						<input type='submit' value="Отправить">
						<form/>
						</div>
						
					
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection