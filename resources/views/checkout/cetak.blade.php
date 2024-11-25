@extends('dashboard.admin')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h1>HOME VAPE JEMBER</h1>
                            <p>Jl.Letjen Suprapto Gang XII No.4</p>
                            <p>+6285704623338</p>
                        </center>
                        <h3><b>INVOICE #{{ $details->id }}</b></h3>
                    </div>

                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <h4>Billing Information</h4>
                                <p class="text-md-start"><b>Buyer</b> : {{ $details->fkBuyer->name }}</p>
                                <p class="text-md-start"><b>Address</b> : {{ $details->fkBuyer->address }}</p>
                                <p class="text-md-start"><b>Date</b> : {{ $details->date }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Price Information</h4>
                                @php
                                    $total_price = 0;
                                    $discount_price = 0;
                                    $before_price = 0;
                                @endphp
                                @foreach ($details->fkTransactionDetail as $item)
                                    @php
                                        $total_price += $item->total;
                                        $before_price += $item->total_before;
                                        if ($item->total_discount != '') {
                                            $discount_price += $item->total_discount;
                                        }
                                    @endphp
                                @endforeach

                                <p class="text-md-start"><b>Total:</b>Rp.{{ number_format($total_price) }}</p>
                                @if ($discount_price != 0)
                                    <p class="text-md-start"><b>Total discount:</b>Rp.{{ number_format($discount_price) }}</p>
                                    <p class="text-md-start"><b>Original price:</b>Rp.{{ number_format($before_price) }}</p>
                                @else
                                    <p class="text-md-start"><b>Total discount:</b>Tidak ada</p>
                                    <p class="text-md-start"><b>Original price:</b>Rp.{{ number_format($before_price) }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>qty</th>
                                        <th>total price</th>
                                        <th>Diskon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details->fkTransactionDetail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->fkProduct->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp.{{ number_format($item->total) }}</td>
                                            @if ($item->voucher_id != null)
                                                <td>{{ $item->fkVoucher->name }} - Rp.{{ $item->fkVoucher->diskon }}</td>
                                            @else
                                                <td>Tidak ada</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
