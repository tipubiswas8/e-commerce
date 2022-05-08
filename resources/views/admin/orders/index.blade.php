
<!DOCTYPE html>
<html>
    <head>
    <title>Orders List</title>
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
                <th>ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Customer Phone</th>
                <th>Deliver Status</th>
                <th>Action</th>
               </tr>
           </thead>
           <tbody>
           @foreach ($data as $order)
           <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->product_i }}</td>
            <td>{{ $order->product_n }}</td>
            <td>{{ $order->product_p }}</td>
            <td>{{ $order->customer_n }}</td>
            <td>{{ $order->customer_a }}</td>
            <td>{{ $order->customer_p }}</td>
            <td>{{ $order->is_deliver?'Delivered':'Pending' }}</td>
            <td>
              @if(!$order->is_deliver)
              <a href="{{ route('orders-change-status',$order->id) }}">Mark as Delivered</a> |
              @else 
               <button>Delivered</button>
              @endif
            </td>  
           </tr>
           @endforeach
        </tbody>
       </table>
    </body>
</html>