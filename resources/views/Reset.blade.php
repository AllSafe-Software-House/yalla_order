<div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">POS Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body"><div class="pt-0 pb-3 modal-body pos-module" id="printarea">
    <div class="text-center">
            <h3>Global Exports</h3>
        </div><br><div class="text-left">
            <b>#POS00008</b>
        </div><div class="text-left">
            Global Exports<br>
            test@example.com<br>
            114 New Mexico 371<br>
            Wilmington,
            New York,
            87323<br>
            United States<br>
            (505) 862-7112<br>
        </div><div class="invoice-to mt-2 product-border">
            
        </div><br><div>
            Name:  Protiong
        </div><div>
            
        </div><div>
            Email:  Protiong@example.com
        </div><div>
            
        </div><div>
            Date of POS:  2024-05-28
        </div><div class="product-border">
            Warehouse Name:  <h7 class="text-dark">Big Basket F&amp;V  Warehouse<p></p></h7>
        </div><table class="table pos-module-tbl">
        <tbody>
            
        </tbody>
    </table>
    <div class="text-black text-left fs-5 mt-0 mb-0">Items</div>
            <div class="mt-2">
            <div class="p-0"> <b>Storage</b></div>
            <div class="d-flex product-border">
                <div>Quantity:</div>
                <div class="text-end ms-auto">1</div>
            </div>
        </div>
        <div class="d-flex product-border">
            <div>Price:</div>
            <div class="text-end ms-auto">USD 400,00 </div>
        </div>
        <div class="d-flex product-border">
            <div>Tax:</div>
            <div class="text-end ms-auto"> 10%</div>
        </div>
        <div class="d-flex product-border mb-2">
            <div>Tax Amount:</div>
            <div class="text-end ms-auto">USD 40,00 </div>
        </div>
        <div class="d-flex product-border mb-2">
            <div>Sub Total:</div>
            <div class="text-end ms-auto"> USD 440,00 </div>
        </div>
            <div class="mt-2">
            <div class="p-0"> <b>Mixer</b></div>
            <div class="d-flex product-border">
                <div>Quantity:</div>
                <div class="text-end ms-auto">1</div>
            </div>
        </div>
        <div class="d-flex product-border">
            <div>Price:</div>
            <div class="text-end ms-auto">USD 400,00 </div>
        </div>
        <div class="d-flex product-border">
            <div>Tax:</div>
            <div class="text-end ms-auto"> 10%</div>
        </div>
        <div class="d-flex product-border mb-2">
            <div>Tax Amount:</div>
            <div class="text-end ms-auto">USD 40,00 </div>
        </div>
        <div class="d-flex product-border mb-2">
            <div>Sub Total:</div>
            <div class="text-end ms-auto"> USD 440,00 </div>
        </div>
        <div class="d-flex product-border mb-2 mt-4">
        <div><b>Discount:</b></div>
        <div class="text-end ms-auto"> USD 0,00 </div>
    </div>
    <div class="d-flex product-border mb-2">
        <div><b>Total:</b></div>
        <div class="text-end ms-auto"> USD 880,00 </div>
    </div>

    <h5 class="text-center mt-3 font-label">Thank You For Shopping With Us. Please visit again.</h5>
</div>

<div class="justify-content-center pt-2 modal-footer">
    <a href="#" id="print" class="btn btn-primary btn-sm text-right float-right mb-3">
        Print
    </a>
</div>
<script>
    $("#print").click(function () {
        var print_div = document.getElementById("printarea");
        $('.row').addClass('d-none');
        $('.toast').addClass('d-none');
        $('#print').addClass('d-none');
        window.print();
        $('.row').removeClass('d-none');
        $('#print').removeClass('d-none');
        $('.toast').removeClass('d-none');
    });
</script>




</div>
        </div>
    </div>