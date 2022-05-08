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

  
    <table class="table table-primary table-striped">
        <thead>
            <tr>
              <th>ID:</th>
              <th>Name:</th>
              <th>Action:</th>
            </tr>
          </thead>
    <tbody>
        @foreach ($data as $singleCategory)
          <tr>
            <td>#{{ $singleCategory->id }}</td>
            <td>{{ $singleCategory->name }}</td>
            <td><a href={{ route('categories.edit', $singleCategory->id) }}>Update</a> ||
                    <form action= {{ route('categories.destroy', $singleCategory->id) }} method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit">Delete</button>
                    </form>
                  </td>
          </tr>
          @endforeach
    </tbody>
    </table> 

    </body>
</html>