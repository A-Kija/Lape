@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Masters List</div>
               <div class="card-body">
                <div class="mt-3">{{$masters->links()}}</div>
                <ul class="list-group">
                @foreach ($masters as $master)
                <li class="list-group-item">
                    <div class="list-block">
                        <div class="list-block__content">
                            <span>{{$master->name}} {{$master->surname}}</span>
                            @if($master->getOutfits->count())
                                <small>Works on {{$master->getOutfits->count()}} outfits</small>
                            @else
                            <small>Curently has no outfits</small> 
                            @endif
                        </div>
                        <div class="list-block__buttons">
                            <a href="{{route('master.edit',[$master])}}" class="btn btn-info">Edit</a>
                            <form method="POST" action="{{route('master.destroy', $master)}}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
                </ul>
                <div class="mt-3">{{$masters->links()}}</div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Masters List @endsection



