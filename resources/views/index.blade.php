<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Midterm_Lab_1</title>
</head>
<body class='container-fluid mt-4'>

    <form class='text-center' id='form'>
        <div class='d-flex flex-direction-column mx-5'>
            <input class='form-control' style='border-radius: 10px 0 0 10px' type='text' id='input-search' placeholder="Search by Customer Name">
            <input class='btn btn-success br-0' style='border-radius: 0 10px 10px 0' type='submit' value='Search'>
        </div>    
    </form>

    <div id="data-container">
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
            <tbody id="order-body">
                @foreach($items as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->orders_id->transaction_no}}</td>
                        <td class='customer-name'>{{$order->orders_id->customer_name}}</td>
                        <td>{{$order->orders_id->state}}</td>
                        <td>
                            <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModalCenter" onclick="populateModal({{ json_encode($order) }})">View</button>
                        </td>
                    </tr> 
                @endforeach    
            </tbody> 
        </table>
    </div>

    @include('modal')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            const orders = @json($items);

            $('#form').submit(function(e) {
                e.preventDefault();

                const inputSearch = $('#input-search').val().toLowerCase();
                const filteredOrders = orders.filter(order => 
                    order.orders_id.customer_name.toLowerCase().includes(inputSearch)
                );

                displayOrders(filteredOrders);
            });

            function displayOrders(filteredOrders) {
                const orderBody = $('#order-body');
                orderBody.empty(); 

                if (filteredOrders.length === 0) {
                    orderBody.append('<tr><td colspan="5" class="text-center">No results found.</td></tr>');
                    return;
                }

                filteredOrders.forEach(order => {
                    const row = `
                        <tr>
                            <td>${order.id}</td>
                            <td>${order.orders_id.transaction_no}</td>
                            <td class='customer-name'>${order.orders_id.customer_name}</td>
                            <td>${order.orders_id.state}</td> <!-- Ensure this is correct -->
                            <td>
                                <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModalCenter" onclick="populateModal(${JSON.stringify(order)})">View</button>
                            </td>
                        </tr>
                    `;
                    orderBody.append(row);
                });
            }
        });

        function populateModal(order) {
            const modalBody = document.getElementById('modal-body-content');
            modalBody.innerHTML = '';

            order.items.forEach(item => {
                const row = `<tr>
                    <td>${item.item_name}</td>
                    <td>${item.price} pesos</td>
                    <td>${item.quantity}</td>
                    <td>${item.unit_price}</td>
                </tr>`;
                modalBody.innerHTML += row;
            });
        }
    </script>
</body>
</html>
