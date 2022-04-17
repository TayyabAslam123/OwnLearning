<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form to test Request</h2>
  {{-- {{dd($errors)}} --}}
  <hr>
  {{-- {{dd($errors->first('email'))}} --}}
  {{-- @if (count($errors) > 0)
  <div class = "alert alert-danger">
     <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif --}}
  <form action="{{url('save-data-2')}}" method="POST">
    @csrf
    <div class="form-group">
    @if($errors->first('username'))
      <div class = "alert alert-danger">
        {{$errors->first('username')}}       
      </div>
    @endif  
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
    @if($errors->first('pass'))
        <div class = "alert alert-danger">
            {{$errors->first('pass')}}       
        </div>
    @endif

    {{-- @error('password')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}

      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

{{-- NOTES

Retrieving All Error Messages For A Field
If you need to retrieve an array of all the messages for a given field, use the get method:

foreach ($errors->get('email') as $message) {
    //
} --}}

{{-- 
Determining If Messages Exist For A Field
The has method may be used to determine if any error messages exist for a given field:

if ($errors->has('email')) {
    //
} --}}