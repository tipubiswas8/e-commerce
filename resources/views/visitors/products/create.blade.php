<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

    {{-- get success message --}}
    @if(session('ok'))
    <h3>{{ session('ok') }}</h3>
  @endif

  {{-- get error message --}}
  @if(session('problem'))
  <h3>{{ session('problem') }}</h3>
  @endif


    <form action= {{ route('products.store') }} method="POST" enctype="multipart/form-data">
        @csrf

        <label>Product Name:</label>
        <input type="text" name="cname"><br>


        {{-- pick category id from categories table --}}
        <label>Category:</label>
        <select name="ccategory_id">
            <option value=""> Choose a Category</option>
        @foreach ($categories as $productCat)
            <option value="{{ $productCat->id }}">{{ $productCat->name }}</option>
        @endforeach
          </select><br>

        <label>Product Price:</label>
        <input type="text" name="cprice"><br>

        <label>Quantity:</label>
        <input type="text" name="cquantity"><br>
        
        {{-- slect image --}}
        <label>Image</label>
        <input type="file" name="cimage"><br>

        <label>Description:</label>
        <textarea name="pdescription"></textarea><br>

        {{-- select status --}}
        <label>Status:</label>
        <select name="cstatus">
            <option value="1">Active</option>
            <option value="0">In Active</option>
        </select><br>

        <input type="submit" value="Save"><br>
        <input type="reset" value="Clear">
</form>

</body>
</html>