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

                <a href="{{route('master-js.index')}}#edit|{{$master->id}}" class="btn btn-info link-btn">Edit</a>

                <form method="POST" action="{{route('master-js.destroy', $master)}}">
                    <button type="button" class="btn btn-danger">Delete</button>
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




