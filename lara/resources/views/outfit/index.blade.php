@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h3>Outfits List</h3>
                   <form action="{{route('outfit.index')}}" method="get">
                    <fieldset>
                        <legend>Sort</legend>
                        <div class="block">
                        <button type="submit" class="btn btn-info" name="sort" value="type">Type</button>
                        <button type="submit" class="btn btn-info" name="sort" value="color">Color</button>
                        <button type="submit" class="btn btn-info" name="sort" value="size">Size</button>
                        </div>
                        <div class="block">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                            name="sort_dir" id="_1" 
                            value="asc" @if('desc' != $sortDirection) checked @endif>
                            <label class="form-check-label" for="_1">
                              ASC
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio"
                             name="sort_dir" id="_2"
                              value="desc" @if('desc'== $sortDirection) checked @endif>
                            <label class="form-check-label" for="_2">
                              DESC
                            </label>
                          </div>
                        </div>
                        <div class="block">
                         
                            <a href="{{route('outfit.index')}}" class="btn btn-warning">Reset</a>
                        </div>
                    </fieldset>
                   </form>

                   <form action="{{route('outfit.index')}}" method="get">
                    <fieldset>
                      <legend>Filter</legend>
                      <div class="block">
                      <div class="form-group">
                        <select class="form-control" name="master_id">
                          <option value="0" disabled selected>Select Master</option>
                        @foreach ($masters as $master)
                            <option value="{{$master->id}}" @if($master_id == $master->id) selected @endif>{{$master->name}} {{$master->surname}}</option>
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Select master from the list.</small>
                    </div>
                  </div>
                    <div class="block">
                      <button type="submit" class="btn btn-info" name="filter" value="master">Filter</button>
                      <a href="{{route('outfit.index')}}" class="btn btn-warning">Reset</a>
                  </div>


                  
                    </fieldset>
                  </form>


                  <form action="{{route('outfit.index')}}" method="get">
                    <fieldset>
                      <legend>Search</legend>
                      <div class="block">
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Search" name="s" value="{{$s}}">
                        <small class="form-text text-muted">Search in our Fashion House</small>
                    </div>
                  </div>
                    <div class="block">
                      <button type="submit" class="btn btn-info" name="search" value="all">Search</button>
                      <a href="{{route('outfit.index')}}" class="btn btn-warning">Reset</a>
                  </div>


                  
                    </fieldset>
                  </form>
                
                </div>
               <div class="card-body">
                <div class="mb-3">{{$outfits->links()}}</div>
                <ul class="list-group">
                @foreach ($outfits as $outfit)
                <li class="list-group-item">
                    <div class="list-block">
                      <div class="list-block__img">
                        @if($outfit->photo)
                        <img src="{{$outfit->photo}}" alt="{{$outfit->type}}">
                        @else
                        <img src="{{asset('img/no-image.png')}}" alt="{{$outfit->type}}">
                        @endif
                      </div>
                        <div class="list-block__content">
                            <span><b>{{$outfit->type}}</b> <i>Color: </i>{{$outfit->color}} <i>Size: </i>{{$outfit->size}}</span>
                            <small>{{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</small> 
                        </div>
                        <div class="list-block__buttons">
                            <a href="{{route('outfit.edit',[$outfit])}}" class="btn btn-info">Edit</a></a>
                            <a href="{{route('outfit.show',[$outfit])}}" class="btn btn-warning">Show</a></a>
                            <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                        </div>
                    </div>
                </li>
              @endforeach
                </ul>
                
                <div class="mt-3">{{$outfits->links()}}</div>
               </div>
               
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Outfits List @endsection



