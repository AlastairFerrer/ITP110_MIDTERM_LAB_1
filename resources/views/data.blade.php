<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<table class='table table-striped table-hover mt-4'>
        <thead>
                <tr>
                        <th>#</th>
                        <th>Transaction No.</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr> 
        </thead>  
        <tbody>
                    @foreach($items as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->orders_id->transaction_no}}</td>
                            <td id='customer-name'>{{$order->orders_id->customer_name}}</td>
                            <td>{{$order->orders_id->state}}</td>
                            <td>  <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModalCenter">View</button></td>
                        </tr> 
                    @endforeach    
        <tbody> 

</table>  