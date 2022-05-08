<!DOCTYPE html>
<html>
    <head>
        <title>E-commerce</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
      
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
              <form action="{{ route('categories.update', $edata->id) }}" method="POST">
               @method('PUT')
               @csrf
                <div class="form-group">
                   <label for="">Name:</label>
                   <input type="text" name="name" value="{{ $edata->name }}" class="form-control">
                   @error('name')
                      <p class="text-danger mt-1">{{ $message }}</p>
                   @enderror
                </div>
                 <div class="form-group">
                   <input class="btn btn-primary" type="submit" value="Update">
                 </div>
              </form>
    </body>
</html>