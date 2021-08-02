<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductItem;
use DateTime;
use Yajra\DataTables\Facades\DataTables;
use Excel;
use App\Exports\ProductItemExport;

class ProductItemController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('pages.product.list', compact('product'));
    }

    public function get(Request $request){

        $productId = $request->productId ? $request->productId : 'null'; 

        $data = DB::select("call get_list_product_item(".$productId.", null)");

        return DataTables::of($data)
        ->editColumn('item_image', function($row){
            $image = '
                <img src="'.$row->item_image.'" alt="" width="100" class="rounded mx-auto d-block">
            ';
            return $image;
        })
        ->addColumn('actions', function($row){
            $actions = '<div class="text-center">';
            // $actions .= '<a title="Detail" class="btn btn-icon btn-xs btn-info" role="button" href="' . URL::to('berkasPerkara/detail/' . encrypt($row->id_berkas)) . '"><i class="fa fa-search"></i></a> ';
            
            $actions .= '<a title="Edit" class="btn btn-icon btn-xs btn-warning" role="button" href="' . URL::to('productItem/edit/' . encrypt($row->item_id)) . '"><i class="fa fa-pencil-square-o"></i></a> ';

            $actions .= '<button type="button" title="Delete" class="btn btn-icon btn-xs btn-danger deleteItem" role="button" data-id="' . encrypt($row->item_id) . '"><i class="fa fa-trash-o"></i></button> ';
            
            $actions .= '</div>';
            return $actions;
        })
        ->addIndexcolumn()
        ->rawColumns(['item_image', 'actions'])
        ->make(true);
    }
    
    public function storeItemFromApi(){
        DB::beginTransaction();
        try{
            $client = new Client;
            $response = $client->request(
                'GET', 
                'https://portal.panelo.co/paneloresto/api/productlist/18'
            );

            $data = json_decode($response->getBody());

            if(count($data->products) > 0){
                foreach($data->products as $productData){
                    $checkProduct = Product::find($productData->id);
                    if(!$checkProduct){
                        $product = new Product;
                        $product->product_id = $productData->id;
                        $product->product_name = $productData->name;
                        $product->save();
                    }

                    if(count($productData->products) > 0){
                        foreach($productData->products as $itemData){
                            $checkItem = ProductItem::find($itemData->id);

                            if(!$checkItem){
                                $item = new ProductItem;
                                $item->item_id = $itemData->id;
                                $item->product_id = $productData->id;
                                $item->item_title = $itemData->title;
                                $item->item_price = $itemData->price->price;
                                $item->item_image = $itemData->preview->content;
                                $item->item_stock = $itemData->stock->stock;
                                
                                $createdAt = new DateTime($itemData->created_at);
                                $updatedAt = new DateTime($itemData->updated_at);
                                
                                $item->created_at = $createdAt->format('Y-m-d H:i:s');
                                $item->updated_at = $updatedAt->format('Y-m-d H:i:s');
                                
                                $item->save();
                            }
                        }
                    }
                }
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => ['item' => $data]], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function add(){
        $product = Product::all();
        return view('pages.product.add', compact('product'));
    }

    public function store(Request $request){
        $item = new ProductItem;
        $item->item_id = date('mdHis');
        $item->product_id = $request->productId;
        $item->item_title = $request->itemTitle;
        $item->item_price = $request->itemPrice;
        $item->item_image = $request->itemImage;
        $item->item_stock = $request->itemStock;
        $item->created_at = now();
        $item->save();
        return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
    }

    public function delete($itemId){
        $item = ProductItem::find(decrypt($itemId));
        $item->delete();
    }

    public function edit($itemId){
        $itemData = DB::select("call get_list_product_item(null, ".decrypt($itemId).")");
        $item = $itemData[0];

        $product = Product::all();
        return view('pages.product.edit', compact('item', 'product'));
    }

    public function update(Request $request){
        $item = ProductItem::find(decrypt($request->itemId));
        $item->product_id = $request->productId;
        $item->item_title = $request->itemTitle;
        $item->item_price = $request->itemPrice;
        $item->item_image = $request->itemImage;
        $item->item_stock = $request->itemStock;
        $item->updated_at = now();
        $item->save();
        return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
    }

    public function export(Request $request){

        $productId = $request->productId ? $request->productId : 'NULL';

        $fileName = 'report_product_item.xlsx';

        return Excel::download(new ProductItemExport($productId), $fileName);
    }
}
