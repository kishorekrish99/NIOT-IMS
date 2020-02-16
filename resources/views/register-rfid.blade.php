@extends('layouts.app')
@section('content')
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">RFID</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="RFID">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Main Component Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Component name">      
    </div>
  </div>
  <div class="form-group col-md-6">
  	<input type="button" name="Add" value="Add sub Components">
</div>
  <div class="form-group">
  </div>
  <div class="form-group col-md-6" id="subcomponent">
    <label for="inputAddress2">sub component Name</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="subcomponent name">
  </div> 
  <input type="submit">
</form>
@endsection