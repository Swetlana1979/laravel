@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
					<div class="alert alert-success" role="alert">
                        @if(!empty($comments))
						<p>{{ $comments->description }}</p>
					    @endif
						
					</div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
