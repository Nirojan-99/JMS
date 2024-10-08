@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div class="container mt-5 mb-4">
    <div class="row">
        <!-- Product Selection Section -->
        <div class="col-md-6">
            <h4 class="mb-3">Select Products</h4>
            <div class="card">
                <div class="card-body">
                    <form id="productForm">
                        @csrf
                        <div class="form-group">
                            <label for="productSelect">Product</label>
                            <select class="form-control" id="productSelect" required>
                                <option value="" selected>Select a product</option>
                                <!-- Products will be loaded dynamically -->
                                <option value="1" data-price="500" data-name="Gold Ring">Gold Ring - $500</option>
                                <option value="2" data-price="1200" data-name="Silver Necklace">Silver Necklace - $1200</option>
                                <option value="3" data-price="800" data-name="Diamond Bracelet">Diamond Bracelet - $800</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" value="1" min="1" required>
                        </div>

                        <button type="button" class="btn btn-primary mt-3" id="addProductBtn">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cart Section -->
        <div class="col-md-6">
            <h4 class="mb-3">Cart</h4>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems"></tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <h5>Total: <span id="cartTotal">$0</span></h5>
                        <button type="button" class="btn btn-success" id="checkoutBtn">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Invoice Details</h4>
                    <div id="invoiceDetails">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceItems"></tbody>
                        </table>
                        <div class="text-right">
                            <h5>Total Amount: <span id="invoiceTotal">$0</span></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="completeSaleBtn">Complete Sale</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('tyles')
<style>
    .card {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('scripts')
<script>
    let cart = [];
    let totalAmount = 0;

    document.getElementById('addProductBtn').addEventListener('click', () => {
        const productSelect = document.getElementById('productSelect');
        const quantityInput = document.getElementById('quantity');
        const productId = productSelect.value;
        const quantity = parseInt(quantityInput.value);
        
        if (!productId || quantity < 1) return;

        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const productName = selectedOption.getAttribute('data-name');
        const productPrice = parseFloat(selectedOption.getAttribute('data-price'));

        const cartItem = {
            id: productId,
            name: productName,
            price: productPrice,
            quantity: quantity,
            total: productPrice * quantity
        };

        cart.push(cartItem);
        updateCart();
    });

    function updateCart() {
        const cartItems = document.getElementById('cartItems');
        cartItems.innerHTML = '';
        totalAmount = 0;

        cart.forEach((item, index) => {
            const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>$${item.price}</td>
                    <td>${item.quantity}</td>
                    <td>$${item.total}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="removeItem(${index})">Remove</button></td>
                </tr>
            `;
            cartItems.innerHTML += row;
            totalAmount += item.total;
        });

        document.getElementById('cartTotal').innerText = `$${totalAmount}`;
    }

    function removeItem(index) {
        cart.splice(index, 1);
        updateCart();
    }

    document.getElementById('checkoutBtn').addEventListener('click', () => {
        const invoiceItems = document.getElementById('invoiceItems');
        invoiceItems.innerHTML = '';

        cart.forEach(item => {
            const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>$${item.price}</td>
                    <td>${item.quantity}</td>
                    <td>$${item.total}</td>
                </tr>
            `;
            invoiceItems.innerHTML += row;
        });

        document.getElementById('invoiceTotal').innerText = `$${totalAmount}`;
        new bootstrap.Modal(document.getElementById('invoiceModal')).show();
    });

    document.getElementById('completeSaleBtn').addEventListener('click', () => {
        alert('Sale Completed!');
        cart = [];
        updateCart();
        document.getElementById('invoiceItems').innerHTML = '';
        document.getElementById('invoiceTotal').innerText = '$0';
    });
</script>
@endsection
