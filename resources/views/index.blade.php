<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <title>Midterm_Lab_1</title>
</head>
<body class='container-fluid mt-4'>

    <form class='text-center' id='form' action='/search'>
        @csrf
        <div class='d-flex flex-direction-column mx-5'>
            <input class='form-control' style='border-radius: 10px 0 0 10px' type='text' id='input-search' placeholder="Search by Customer Name">
            <input class='btn btn-success br-0' style='border-radius: 0 10px 10px 0' type='submit' value='Search'>
        </div>    
    </form>

   @include('data')

    @include('modal')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type='text/javascript'>
$(document).ready(function() {
    $('#form').submit(function(e) {
        e.preventDefault();
        const inputSearch = $('#input-search').val().toLowerCase();
        const token = $('meta[name="csrf-token"]').attr('content'); 

        $.ajax({
            url: '/search',
            method: 'POST',
            data: { search_input: inputSearch, _token: token },
            success: function(filteredOrders) {
                displayOrders(filteredOrders);
            },
            error: function(xhr) {
                alert(xhr.responseJSON.errors.query[0]);
            }
        });
    });

    function displayOrders(filteredOrders) {
        const orderBody = $('#order-body');
        orderBody.empty();

        if (filteredOrders.length === 0) {
            orderBody.append('<tr><td colspan="5" class="text-center">No results found.</td></tr>');
            return;
        }

        const statusMap = ['Cancelled', 'Served', 'Ready to Serve', 'Pending'];

        filteredOrders.forEach(order => {
            const transactionNo = order.transaction_no || 'N/A';
            const customerName = order.customer_name || 'N/A';
            const status = statusMap[order.order_status] || 'Unknown';

            const row = `
                <tr>
                    <td>${order.order_id}</td>
                    <td>${transactionNo}</td>
                    <td>${customerName}</td>
                    <td>${status}</td>
                    <td>
                        <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModalCenter" onclick="populateModal(${JSON.stringify(order)})">View</button>
                    </td>
                </tr>
            `;
            orderBody.append(row);
        });
    }
});
</script>


</body>
</html>
