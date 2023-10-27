<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {

            $requestQuery = $request->query();
            //searching
            $column = isset($request['column']) ? $requestQuery['column']: 'name';
            $searchField = isset($requestQuery['search']) ? $requestQuery['search'] : null ;

            //sorting
            $order = isset($requestQuery['order']) ? $requestQuery['order']: 'id';
            $sort = isset($request['sort']) ? $requestQuery['sort']: 'asc';


            $orders = Order::where($column, "like", "%$searchField%")
                     ->orderBy($order, $sort)
                     ->paginate();

            return response()->json(["data" => $orders], 200);

        }catch(Exceptions $e) {

           return response()->json(["message" => "error"], 500);
        }
    }
}
