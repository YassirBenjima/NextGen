<?php

use App\Mail\OrderEmail;
use App\Models\Category;
use App\Models\Order;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Mail;

function getCategories()
{
    // Récupérer toutes les catégories actives configurées pour s'afficher sur la page d'accueil
    return Category::orderBy('name', 'ASC') // Ordonner les catégories par nom dans l'ordre croissant
        ->with('sub_category') // Charger de manière anticipée (eager load) les sous-catégories pour chaque catégorie
        ->where('status', 1) // Ne récupérer que les catégories actives (statut = 1)
        ->where('showHome', 'Yes') // Ne récupérer que les catégories configurées pour s'afficher sur la page d'accueil (showHome = 'Yes')
        ->get(); // Obtenir la collection de catégories correspondante
}

function getProductImage($productId)
{
    return ProductImage::where('product_id', $productId)->first();
}

function orderEmail($orderId)
{
    $order = Order::where('id', $orderId)->with('items')->first();
    $mailData = [
        'subject' => 'Thanks for your order',
        'order' => $order
    ];
    Mail::to($order->email)->send(new OrderEmail($mailData));
}
