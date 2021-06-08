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
								
						<form action="{{ route('comments-add') }}" method='POST'>
						<textarea id='description' name='description'></textarea> 
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input type="hidden" name="user_id" value="{{ $user_id }}">
						<input type="hidden" name="parent_id" value="{{ $parent_id }}">
						<input type='submit' value="Ответить">
						<form/>
						</div>
						
					
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection