<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $products =
    [
        ['id' => 1,'name' => 'Палатка с быстрой сборкой', 'price' => 100],
        ['id' => 2,'name' => 'Спальный мешок с термоизоляцией', 'price' => 200],
        ['id' => 3,'name' => 'Походный рюкзак с водонепроницаемым покрытием', 'price' => 300],
        ['id' => 4,'name' => 'Набор складной мебели для кемпинга', 'price' => 100],
        ['id' => 5,'name' => 'Походная плитка на газовых баллонах', 'price' => 200],
        ['id' => 6,'name' => 'Многофункциональный нож для туристов', 'price' => 300],
        ['id' => 7,'name' => 'Солнечная батарея для зарядки гаджетов', 'price' => 100],
        ['id' => 8,'name' => 'Фонарь с возможностью подзарядки от USB', 'price' => 200],
        ['id' => 9,'name' => 'Термос с функцией сохранения температуры до 24 часов', 'price' => 300],
    ];

    public function showForm()
    {
        return view('products', ['products' => $this->products]);
    }

    public function storeProducts(Request $request)
    {
        $products = $request->input('products', []);

        session(['products' => $products]);

        return redirect()->route('items.summary');
    }

    public function showSummary()
    {
        $products = session('products', []);
        $total = 0;
        $summary = [];
        $id = 1;
        foreach ($products as $product) {
            if($product['count'] > 0){
                $name = $product['name'];
                $price = $product['price'];
                $subtotal = $price * $product['count'];
                $summary[$id] = [
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'product' => $product['count'],
                    'subtotal' => $subtotal,
                ];
                $id++;
    
                $total += $subtotal;
            }
        }

        return view('cart', compact('summary', 'total'));
    }

    public function storeFinal(Request $request)
    {
        $order = $request->input('orders', []);
        $order['date_create'] = date('Y-m-d H:i:s');

        if ($request->session()->has('orders')) {
            $orders = session('orders');
        } else {
            $orders = ['all' => []];
        }

        $id = count($orders['all']) + 1;
        $orders['all'][$id] = $order;

        session(['orders' => $orders]);

        return redirect()->route('items.orders');
    }

    public function showFinal()
    {
        $orders = session('orders', []);
        $total = 0;
        $id = 1;
        $orders = $orders['all'];
        foreach ($orders as $order) {
            if(!empty($order['name_product'])){
                $names = $order['name_product'];
                $subtotal = $order['subtotal'];
                $date_create = $order['date_create'];
                $summary[$id] = [
                    'id' => $id,
                    'names' => $names,
                    'subtotal' => $subtotal,
                    'date_create' => $date_create,
                ];
                $id++;
    
                $total += $subtotal;
            }
        }

        return view('final', compact('summary', 'total'));
    }
}
