@extends('layouts.contentLayoutMaster')

@section('title', 'Edit Product')

@section('subtitle', 'Edit Product')

{{-- @section('breadcrumb', 'List') --}}

@section('vendor-style')

@endsection

@section('page-style')
@endsection

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4 class="card-title">Multiple Column</h4> --}}
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" id="editProductItemForm">
                                @csrf
                                <input type="hidden" name="itemId" value="{{ encrypt($item->item_id) }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="productId">Category</label>
                                                <div class="controls">
                                                  <select class="select2 form-control productId" id="productId" name="productId">
                                                    <option></option>
                                                    @foreach($product as $pr)
                                                    <option value="{{ $pr->product_id }}" {{ $pr->product_id == $item->product_id ? 'selected' : '' }}>{{ $pr->product_name }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="itemTitle">Product Name</label>
                                                <div class="controls">
                                                    <input value="{{$item->item_title}}" type="text" id="itemTitle" class="form-control" name="itemTitle" placeholder="Product Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="itemPrice">Price</label>
                                                <div class="controls">
                                                    <input value="{{$item->item_price}}" type="number" id="itemPrice" class="form-control" name="itemPrice">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="itemStock">Stock</label>
                                                <div class="controls">
                                                    <input value="{{$item->item_stock}}" type="number" id="itemStock" class="form-control" name="itemStock">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="itemImage">Image Url</label>
                                                <div class="controls">
                                                    <textarea class="form-control" id="itemImage" name="itemImage" rows="3" placeholder="">{{ $item->item_image }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
@endsection

@section('vendor-script')
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/productItem/list.js') }}"></script>
@endsection
