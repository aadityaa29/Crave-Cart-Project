<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_image = $_POST['food_image'];
    $food_description = $_POST['food_description'];

    if (!isset($_SESSION['foods'])) {
        $_SESSION['foods'] = [];
    }

    $new_food = [
        'name' => $food_name,
        'price' => $food_price,
        'image' => $food_image,
        'description' => $food_description,
    ];
    $_SESSION['foods'][] = $new_food;

    echo json_encode([
        'success' => true,
        'food' => $new_food,
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
