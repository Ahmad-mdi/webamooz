<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class Cart
{
    public static function new(product $product, Request $request)
    {
        if (session()->has('cart')) {
            $cart = self::getItems();
        }
        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $request->get('quantity'),
        ];
        session()->put([
            'cart' => $cart,
        ]);

        $cart['total_items'] = self::totalItems();
        $cart['total_price'] = self::totalPrice();
//        $cart['price_with_discount'] = number_format(self::getPriceWithDiscount($product));

        session()->put([
            'cart' => $cart,
        ]);
    }

    //for count items(products):
    public static function getItems()
    {
        return collect(self::getSessionCart())->filter(function ($item) {
            return is_array($item);
        });
    }

    public static function totalItems()
    {
        $items = self::getItems();
        return count($items);
    }

    public static function totalPrice()
    {
        $totalPrice = 0;
        if (self::getSessionCart()) {
            foreach (self::getSessionCart() as $cartItem) {
                if (is_array($cartItem) && array_key_exists('product', $cartItem)
                    && array_key_exists('quantity', $cartItem)) {
                    $totalPrice += $cartItem['product']->price_with_discount * $cartItem['quantity'];
                }
            }
        }
        return $totalPrice;
    }

    public static function getSessionCart()
    {
        if (!session()->has('cart')) {
            return null;
        }
        return session()->get('cart');
    }

    public static function remove(product $product)
    {
        if (session()->has('cart')) {
            $cart = self::getItems();
        }
        $cart->forget($product->id);

        session()->put([
            'cart' => $cart,
        ]);
        //updated after forget cart(delete):
        $cart['total_items'] = self::totalItems();
        $cart['total_price'] = self::totalPrice();
        session()->put([
            'cart' => $cart,
        ]);
    }

    public static function removeAllItems()
    {
        session()->forget('cart');
    }

    /*public static function getPriceWithDiscount(product $product)
    {
        if (!$product->has_discount) {
            return $product->price;
        }

        return $product->price - $product->price * $product->discount_value / 100;
    }*/
}
