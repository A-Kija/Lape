<div class="card">
    <div class="card-header">Master Edit</div>
    <div class="card-body">
     <form method="POST" action="{{route('master-js.update', $master)}}">
         <div class="form-group">
             <label>Name: </label>
             <input type="text" class="form-control" name="master_name" value="{{old('master_name', $master->name)}}">
             <small class="form-text text-muted">Enter new master name.</small>
         </div>
         <div class="form-group">
             <label>Surname: </label>
             <input type="text" class="form-control" name="master_surname" value="{{old('master_surname', $master->surname)}}">
             <small class="form-text text-muted">Enter new master surname.</small>
         </div>
         @csrf
         <button type="button" class="btn btn-info">Update Master</button>
      </form>
    </div>
</div>
