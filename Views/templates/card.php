<style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .product-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            color: #2ecc71;
            margin-bottom: 20px;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #2980b9;
        }
    </style>

<div class="card">
    <img src="imagen_del_producto.jpg" alt="Producto">
    <div class="card-content">
        <div class="product-title">Nombre del Producto</div>
        <div class="product-price">$99.99</div>
        <button class="buy-button">Agregar al Carrito</button>
    </div>
</div>

 