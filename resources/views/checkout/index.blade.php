@extends('dashboard.admin')


@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="{{ route('transaction.index') }}">
                                <button type="button" class="btn btn-outline-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                    </svg>
                                    Back</button>
                            </a>{{ __('Transaksi') }}</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                @if ($details->status == '0')
                                    <form action="{{ route('checkout.checkout', $details->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-info mt-2" type="submit" value="Checkout">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                            </svg>
                                            Checkout</button>

                                    </form>
                                @else
                                    <p>Pesanan Selesai</p>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <div class="row container">
                            <div class="col-sm-12 col-md-6">
                                <p class="text-md-start"><b>Buyer</b> : {{ $details->fkBuyer->name }}</p>
                                <p class="text-md-start"><b>Date</b> : {{ $details->date }}</p>
                                @php
                                    $total_price = 0;
                                @endphp
                                @foreach ($details->fkTransactionDetail as $item)
                                    @php
                                        $total_price += $item->total;
                                    @endphp
                                @endforeach
                                <p class="text-md-start"><b>Total:</b>Rp.{{ number_format($total_price) }}</p>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form action="{{ route('checkout.create') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Minimal</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" name="product_id">
                                                    @foreach ($products as $item)
                                                        {{-- {{ $selectedRole == $role->id ? (selected = 'selected') : '' }}> --}}
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Qty</label>
                                                <input type="number" class="form-control" name="qty" id="">
                                                <input type="hidden" name="transaction_id" value="{{ $details->id }}">
                                            </div>
                                            <div>
                                                @if ($details->status == '0')
                                                    @csrf
                                                    <button class="btn btn-info mt-2" type="submit" value="Tambahkan">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-cart-plus"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                                            <path
                                                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                        </svg>
                                                        Tambahkan</button>
                                                @else
                                                    <button type="submit" class="btn btn-secondary mt-2" disabled>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-cart-plus"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                                            <path
                                                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                        </svg>s
                                                        Tambahkan</button>
                                                @endif
                                                {{-- <a href="{{ route('checkout.cetak', $item->id) }}">
                                                    <button type="button" class="btn btn-info mt-2">Cetak Nota</button>
                                                </a> --}}
                                            </div>



                                    </form>
                                </div>
                            </div>
                        </div>


                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>qty</th>
                                    <th>total price</th>
                                    <th>total discount</th>
                                    <th>price before</th>
                                    <th>Diskon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details->fkTransactionDetail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->fkProduct->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>Rp.{{ number_format($item->total) }}</td>
                                        @if ($item->total_discount != '')
                                            <td>Rp.{{ number_format($item->total_discount) }}</td>
                                            <td>Rp.{{ number_format($item->total_before) }}</td>
                                        @else
                                            <td> - </td>
                                            <td> - </td>
                                        @endif
                                        @if ($item->voucher_id != null)
                                            <td>{{ $item->fkVoucher->name }} - Rp.{{ $item->fkVoucher->diskon }}</td>
                                        @else
                                            <td>
                                                @if ($details->status == '0')
                                                    <form action="{{ route('checkout.diskon', $item->id) }}">
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <select class="form-control" name="voucher_id">
                                                                    <option value="">Pilih Diskon</option>
                                                                    @foreach ($vouchers as $items)
                                                                        {{-- {{ $selectedRole == $role->id ? (selected = 'selected') : '' }}> --}}
                                                                        <option value="{{ $items->id }}">
                                                                            {{ $items->name }} - Rp.{{ $items->diskon }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <button class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <select class="form-control" name="product_id" disabled>
                                                                <option value="">Pilih Diskon</option>
                                                                @foreach ($vouchers as $items)
                                                                    {{-- {{ $selectedRole == $role->id ? (selected = 'selected') : '' }}> --}}
                                                                    <option value="{{ $items->id }}">
                                                                        {{ $items->name }} - Rp.{{ $items->diskon }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn btn-success" disabled>Simpan</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        @endif
                                        <td>
                                            @if ($details->status == '0')
                                                <form action="{{ route('checkout.destroy', $item->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-trash"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                            <path
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                        </svg>
                                                        Delete</button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-secondary" disabled>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                    </svg>
                                                    Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
