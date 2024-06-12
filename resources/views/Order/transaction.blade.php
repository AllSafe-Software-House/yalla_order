@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Transaction
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Transaction</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
            @can('showAllOrder')
                <a href={{route('listorderall')}}>Back</a></span><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
            @endcan
            @can('listTransaction')
                <a href={{route('transactionlist')}}>Back</a></span><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
            @endcan
                List Transaction</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            @if (Session::has('done'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('done') }}
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('filteration')}}" class="d-grid" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        @php
                            $checkrole = auth()->user();
                            $name = $checkrole->roles->pluck('name');
                            $permission = $checkrole->getAllPermissions();
                            $searchTerm = 'listTransaction';
                            $found = false;
                            foreach ($permission as $perm) {
                                if ($perm->name == $searchTerm) {
                                    $found = true;
                                    break;
                                }
                            }
                        @endphp
                        @if($found == true && $name->contains('SuperAdmin'))
                            <div class="mb-3 col-4">
                                <label for="name" class="py-2">Filter By Place Name:</label>
                                <input type="text" id="name" class="form-control" name="placename" placeholder="Place Name">
                            </div>
                        @endif
                        <div class="mb-3 col-4">
                            <label for="name" class="py-2">Filter By User Name:</label>
                            <input type="text" id="name" class="form-control" name="username" placeholder="User Name">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="name" class="py-2">Filter By User Phone:</label>
                            <input type="text" id="name" class="form-control" name="userphone" placeholder="User Phone">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger d-flex justify-content-center">Filter</button>
                </form>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User phone</th>
                                <th>Oder Number</th>
                                <th>Place Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Pay method</th>
                                <th>Reset</th>
                                @can('deleteTransaction')
                                    <th>Delete</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transction as $data)
                                <tr>
                                    @if($transction instanceof \Illuminate\Pagination\LengthAwarePaginator || $transction instanceof \Illuminate\Pagination\Paginator)
                                        <td>{{ $loop->iteration + ($transction->currentPage() - 1) * $transction->perPage() }}</td>
                                    @else
                                        <td>{{ $loop->iteration }}</td>
                                    @endif                                    
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->phone }}</td>
                                    <td>{{ $data->numberOrder }}</td>
                                    <td>{{ $data->place->name }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->Qty }}</td>
                                    @if($data->status == '1')
                                        <td class="text-warning">IN Tracking</td>
                                    @else
                                        @php
                                            $checktrack = \App\Models\OrderTrake::where('id',$data->id)->first();
                                        @endphp
                                        @if($checktrack)
                                            @if($checktrack->deliverd_statue == '1')
                                                <td class="text-success">Done</td>
                                            @else
                                                <td class="text-warning">IN Tracking</td>
                                            @endif
                                        @else
                                            <td class="text-warning"></td>
                                        @endif
                                    @endif
                                    <td>{{ $data->pay_method }}</td>
                                    <td>
                                        <form id="resetOrderForm-{{ $data->id }}">
                                            @csrf
                                            <button type="button" class="btn btn-danger" data-url="{{ route('resetorder', $data->id) }}" onclick="showResetOrderModal(this)">Reset</button>
                                        </form>
                                    </td>
                                     @can('deleteTransaction')
                                        <td>
                                            <form action="{{ route('transactiondelete', $data->id) }}" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form>
                                       </td>
                                    @endcan

                                </tr>
                            @endforeach
                        </tbody>
                            
                    </table>
                    @if($transction instanceof \Illuminate\Pagination\LengthAwarePaginator || $transction instanceof \Illuminate\Pagination\Paginator)
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                    Showing {{ $transction->firstItem() }} to {{ $transction->lastItem() }} of {{ $transction->total() }} entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                {{ $transction->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif 
                    <br>
                    <a href="{{route('export')}}" class="btn btn-success m-4">Export to Excel</a>

                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- model reset -->
<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel" style="color:#9B4999">Order Reset</h5>
            </div>
            <div class="modal-body pos-module" id="printarea">
                <div class="text-center">
                    <h3 id="placeName"></h3>
                    <span style="color:#9B4999">#No:</span><b id="invoiceNumber"></b>
                </div>
                <br>
                <div class="text-left">
                    <span style="color:#9B4999">Client Name : </span><span id="username"></span><br>
                    <span style="color:#9B4999">Client Email : </span><span id="email"></span><br>
                    <span style="color:#9B4999">Client Address : </span><span id="address"></span><br>
                    <span style="color:#9B4999">Client Phone : </span><span id="phone"></span><br>
                    <span style="color:#9B4999">Date: </span><span id="date"></span><br>
                </div>
                <div class="invoice-to mt-2 product-border"></div>
                <br>
                <!-- Add more fields as needed -->
                <div class="text-black text-left fs-5 mt-0 mb-0" style="color:#9B4999">Items</div>
                <div class="text-left">
                    <span style="color:#9B4999">Product Name : </span><span id="prodactname"></span><br>
                    <span style="color:#9B4999">Product price : </span><span id="prodactprice"></span><br>
                    <span style="color:#9B4999">Product Size : </span><span id="prodactsize"></span><br>
                    <span style="color:#9B4999">Product addtions : </span><span id="addtions"></span><br>
                    <span style="color:#9B4999">Qty : </span><span id="Qty"></span><br>
                </div>
                <div class="invoice-to mt-2 product-border"></div>
                <br>
                <div class="text-black text-left fs-5 mt-0 mb-0" style="color:#9B4999">Summary</div>
                <div class="text-left">
                    <span style="color:#9B4999">Fees : </span><span id="delivery_fee"></span><br>
                    <span style="color:#9B4999">Total Price : </span><span id="totalprice"></span><br>
                </div>
                <!-- Items details go here -->
                <div class="justify-content-center pt-2 modal-footer">
                    <a href="#" id="print" class="btn btn-primary btn-sm text-right float-right mb-3">
                        Print
                    </a>
                    <a href="#" id="download" class="btn btn-primary btn-sm text-right float-right mb-3">
                        Download
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('js')
<script>
    function showResetOrderModal(button) {
        var url = button.getAttribute('data-url');
        fetch(url, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => {
                    console.error('Error:', errorData);
                    throw new Error('Network response was not ok');
                });
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('placeName').textContent = data.placeName;
            document.getElementById('invoiceNumber').textContent = data.invoiceNumber;
            document.getElementById('username').textContent = data.username;
            document.getElementById('email').textContent = data.email;
            document.getElementById('address').textContent = data.address;
            document.getElementById('phone').textContent = data.phone;
            document.getElementById('date').textContent = data.created_at;
            document.getElementById('prodactname').textContent = data.prodactname;
            document.getElementById('prodactprice').textContent = data.prodactprice;
            document.getElementById('prodactsize').textContent = data.prodactsize;
            document.getElementById('Qty').textContent = data.Qty;
            document.getElementById('delivery_fee').textContent = data.fees;
            document.getElementById('totalprice').textContent = data.totalprice;
            let additionsElement = document.getElementById('addtions');
            let additionsText = '';
            data.addtions.forEach(function(addon) {
                additionsText += 'Name: ' + addon.name + ', ';
                additionsText += 'Price: ' + addon.price + '; ';
            });
            additionsText = additionsText.slice(0, -2);
            additionsElement.textContent = additionsText;
            var myModal = new bootstrap.Modal(document.getElementById('invoiceModal'));
            myModal.show();
        })
        .catch(error => {
            console.error('error:', error);
        });
    }
</script>

<script>
    function printInvoice() {
        var modalContent = document.getElementById('invoiceModal').innerHTML;
                var printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Print Invoice</title></head><body>');
        printWindow.document.write(modalContent);
        printWindow.document.write('</body></html>');
        
        printWindow.document.close(); // close the document
        printWindow.print();
                printWindow.close();
    }

    document.getElementById('print').addEventListener('click', printInvoice);
</script>



<script>
    function downloadModalContent() {
        var printArea = document.getElementById('printarea').innerHTML;
        var blob = new Blob([printArea], { type: "text/html" });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'modal_content.html';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        // Close the modal after downloading
        var modal = document.getElementById('invoiceModal');
        var bsModal = new bootstrap.Modal(modal);
        bsModal.hide();
    }

    document.getElementById('download').addEventListener('click', downloadModalContent);

    // Close modal when the "Close" button is clicked
    document.getElementById('closeModalButton').addEventListener('click', function() {
        var modal = document.getElementById('invoiceModal');
        var bsModal = new bootstrap.Modal(modal);
        bsModal.hide();
    });
</script>



<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>


@endsection
