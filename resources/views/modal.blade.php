
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Transaction Summary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">   
                    <div class="d-flex justify-content-between">
                            <table class="table-striped mt-0 table-hover" style="width: 100%; margin-top: 20px;">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $order)
                                        <tr>
                                            <td>{{$order->items_id->item_name}}</td>
                                            <td>{{$order->items_id->price}} pesos</td>
                                            <td>{{$order->items_id->quantity}}</td>
                                            <td>{{$order->unit_price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"  data-target="#exampleModalCenterClose">Close</button>
                    </div>
                </div>
            </div>
        </div>
        