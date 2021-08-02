@extends('layouts.contentLayoutMaster')

@section('title', 'List Product')

@section('subtitle', 'List Product')

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
                            <div class="row">
                                <div class="col-9">
                                    <a title="Add" class="btn btn-success mr-1 mb-1" role="button" href="{{ URL::to('productItem/add') }}"><i class="fa fa-plus"></i> Add Product</a>  
                                    <button type="button" class="btn btn-info mr-1 mb-1 formBtn" id="addItemFromApi"><i class="fa fa-plus"></i> Add Product From Api</button>
                                    <button type="button" class="btn btn-primary mr-1 mb-1 formBtn" id="exportButton"> Export To Excel</button>
                                </div>
                                <div class="col-3">
                                    <form>
                                        <div class="form-group">
                                            <label for="productIdFilter">Category</label>
                                            <div class="controls">
                                                <select class="select2 form-control productIdFilter" id="productIdFilter" name="productIdFilter">
                                                    <option></option>
                                                    @foreach($product as $pr)
                                                    <option value="{{ $pr->product_id }}">{{ $pr->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{-- <h4 class="card-title">List Surat</h4> --}}
                                    <div class="table-responsive">
                                        <table class="table nowrap" style="width: 100%" id="productItemTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Product</th>
                                                    <th class="text-center">Category</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Stock</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Created At</th>
                                                    <th class="text-center">Updated At</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
