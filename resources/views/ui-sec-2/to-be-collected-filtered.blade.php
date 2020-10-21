<div class="sales_list3">
    <div class="border-bottom border-secondary text1 mb-2"></div>
    <div class="sales_list1">
        <div class="sales_list2 bg-secondary p-1 pt-2">Invoice number</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Order Date</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Money collecting due date</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Customer</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Total Amount</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Pending amount</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Item count</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Payment Status</div>
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
            <div class="sales_list2 bg-secondary p-1 pt-2">Sales by</div>
        @endif
        <div class="sales_list2 bg-secondary p-1 pt-2">Deliver Status</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Comment</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Balance</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">&#160;</div>
    </div>
    @foreach( $invoices as $invoice)
        <form name="form-{{ $invoice->id }}" action="/invoices/{{ $invoice->id }}/update" method="post" onsubmit="return validateForm(this)">
            @csrf
            <div class="sales_list1">
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->number }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->date }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->cheque_date }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->shop_name }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->total }}</p></div>
                <div class="sales_list2 p-1 pt-2">
                    <p>{{ $invoice->pending_amount <= 0 ? 0 : $invoice->pending_amount }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->item_count }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->closed ? "completed" : "half" }}</p></div>
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
                    <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->sales_by }}</p></div>
                @endif
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->pending ? "pending" : "delivered" }}</p></div>
                <div class="sales_list2 p-1 pt-2"><p>{{ $invoice->comment }}</p></div>

                <div class="sales_list2 p-1 pt-2">
                    <input class="form-control mr-sm-2" type="number"
                           step="0.01"
                           value="0.00"
                           min="0.01"
                           placeholder="Amount"
                           aria-label="Amount"
                           name="amount"
                           @if( $invoice->closed )
                           disabled
                           @endif
                           required>
                    <button class="btn btn-outline-dark"
                            @if( $invoice->closed )
                            disabled
                            @endif
                            type="submit">Update</button>
                </div>
                <div class="sales_list2 p-1 pt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cashCheckbox-{{ $invoice->id }}"
                               @if( $invoice->closed  || !$invoice->cash_allowed)
                               disabled
                               @endif
                               name="cashTaken">
                        <label class="form-check-label"
                               for="cashCheckbox-{{ $invoice->id }}">Cash</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chequeCheckbox-{{ $invoice->id }}"
                               @if( $invoice->closed || !$invoice->cheque_allowed)
                               disabled
                               @endif
                               name="chequeTaken">
                        <label class="form-check-label" for="chequeCheckbox-{{ $invoice->id }}">Cheque</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
        </form>
    @endforeach
    <div class="border-bottom border-secondary text1 mt-2"></div>
</div>
