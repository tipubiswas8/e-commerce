<!DOCTYPE html>
<html lang="en">
<head>
    <title>Deleted Products</title>
</head>
<style>
    table, th, td {
    border: 1px solid black;
  }
</style>
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
            <th>Deleted At:</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($dPro as $delProduct)
        <tr>
            <td>{{ $delProduct->name }}</td>
            <td>{{ $delProduct->category_id }}</td>
            <td>{{ $delProduct->price }}</td>
            <td>{{ $delProduct->quantity }}</td>
            <td>{{ $delProduct->image }}</td>
            <td><img width="100" height="100" src="{{ asset($delProduct->image) }}" ></td>
            <td>{{ $delProduct->description }}</td>
            <td>{{ $delProduct->status }}</td>
            <td>{{ $delProduct->deleted_at }}</td>  
        </tr>
        @endforeach
     </tbody>
    </table>
</body>
</html>