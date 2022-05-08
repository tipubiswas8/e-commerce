<!DOCTYPE html>
<html>
    <head>
        <title>Create Category</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
    <div>
    <label>Category Name:</label><input type="text" name="name" placeholder="Enter category name">
    </div>
        <button type="submit">Save</button>
    </div>
    <div>
        <button type="reset">Clear</button>
    </div>
       </form>
    </body>
</html>