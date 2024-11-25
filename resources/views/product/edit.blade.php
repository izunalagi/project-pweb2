@extends('dashboard.admin')


@section('isi')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card-header">Edit Product</div>
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex flex-row-reverse">

                            <a href="{{ route('admin.product.index') }}">
                                <button type="button" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                    </svg>
                                    Back</button>
                            </a>
                        </div>



                        <form action="{{ route('admin.product.update', $ganti->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-floating mb-3">
                                <label for="name">name :</label>
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ $ganti->name }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="name">price :</label>
                                <input type="text" name="price" class="form-control" placeholder="Price"
                                    value="{{ $ganti->price }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="name">stocks :</label>
                                <input type="number" name="stocks" class="form-control" placeholder="Stocks"
                                    value="{{ $ganti->stocks }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="category">category :</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $item)
                                        {
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        }
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Upload Photo</label>
                                <input type="file" name="photo" id="photo">
                            </div>
                            @if ($ganti->photo != null)
                                <div style="width:100px">
                                    <img src="{{ asset('storage/' . $ganti->photo) }}" class="img-fluid" alt="...">

                                </div>
                            @else
                                <p class="text-info">tidak ada foto</p>
                            @endif
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary col-md-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                        <path
                                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                    </svg>
                                    Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
@endsection
