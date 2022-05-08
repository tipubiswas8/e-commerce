<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

@if(session('success'))
<h3>{{ session('success') }}</h3>
@endif

@if(session('error'))
<h3>Sorry! we could not update, please try again.</h3>
@endif

    {{-- (enctype="multipart/form-data") it is use for image shiwing  --}}
   <form action="{{ route('products.update', $eproduct->id) }}" method="POST" enctype="multipart/form-data">
    {{-- for convert post to put method --}}
    @method('PUT')
    {{-- for csrf token --}}
    @csrf

    <label>Edit Name</label>
    <input type="text" name="uname" value= "{{ $eproduct->name }}" ><br>

    <label>Edit Category</label>
    <select name="ucategory_id">
        @foreach ($ecat as $category)
        {{-- select current category --}}
        <option value="{{ $category->id }}" {{ $category->id == $eproduct->category_id ? 'selected' : '' }}>{{ $category->name }} </option><br>      
        @endforeach
    </select><br>

    <label>Edit Price</label>
    <input type="text" value= {{ $eproduct->price }} name="uprice"><br>

    <label>Edit Quantity</label>
    <input type="text" value= {{ $eproduct->quantity }} name="uquantity"><br>

    <label>Edit Image</label>
    <input type="file" value="" name="uimage"><br>
{{-- showing current image
must be use string quatition ("") in src attribute 
like: src="{{ asset($eproduct->image) }}"  --}}
    <img width="100" height="100" src="{{ asset($eproduct->image) }}" ><br>
    
    <label>Edit Discription</label>
    <textarea name="udescription"> {{ $eproduct->description }}
    </textarea><br>

    <label>Status</label>
    <select name="ustatus">
        {{-- for viewing current status --}}
        <option value="1" {{ $eproduct->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $eproduct->status == 0 ? 'selected' : '' }}>In Active</option>
    </select><br> 

    <input type="submit" value="Update"><br>
    <input type="reset" value="Clear">

   </form>

</body>
</html>