<!DOCTYPE html>
<html>
    <head>
    <title>Products List</title>
    <style>
        table, th, td {
        border: 1px solid black;
      }
    </style>
    </head>
    <body>
       <table style="width:100%">
           <thead>
               <tr>
               <th>Product Name:</th>
               <th>Product Category:</th>
               <th>Product Price:</th>
               <th>Quantity:</th>
               <th>Image Path:</th>
               <th>Image:</th>
               <th>Description:</th>
               <th>Status:</th>
               <th>Action:</th>
               </tr>
           </thead>
           <tbody>
           @foreach ($products as $singleProduct)
           <tr>
               <td>{{ $singleProduct->name }}</td>
               <td>{{ $singleProduct->category_id }}</td>
               <td>{{ $singleProduct->price }}</td>
               <td>{{ $singleProduct->quantity }}</td>
               <td>{{ $singleProduct->image }}</td>
               <td><img width="100" height="100" src="{{ asset($singleProduct->image) }}" ></td>
               <td>{{ $singleProduct->description }}</td>
               <td>{{ $singleProduct->status }}</td>
               <td>
                   <a href={{ route('products.edit', $singleProduct->id) }}>Update</a>
               </td>
               <td>
                <form action="{{ route('products.delete', $singleProduct->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete">
                </form>
               </td>
                
           </tr>
           @endforeach
        </tbody>
       </table>
    </body>
</html>