





























<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Login</h2>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="mb-3 mt-3">
      <label for="email">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>        
        @enderror
    
    </div>
    <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
          @error('email')
              <span class="text-danger">{{ $message }}</span>        
          @enderror
      
      </div>


    
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        @error('password')
            <span class="text-danger">{{ $message }}</span>        
        @enderror

    </div>
    <div class="mb-3">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password" name="password_confirmation" required>
          @error('password_confirmation')
              <span class="text-danger">{{ $message }}</span>        
          @enderror
  
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <a href="{{ route('login') }}">Login</a>
</div>

</body>
</html>




