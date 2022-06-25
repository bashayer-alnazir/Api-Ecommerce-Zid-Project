


<li class="nav-item">
    <a href="{{ route('merchants.index') }}"
       class="nav-link {{ Request::is('merchants*') ? 'active' : '' }}">
        <p>Merchants</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('productTranslations.index') }}"
       class="nav-link {{ Request::is('productTranslations*') ? 'active' : '' }}">
        <p>Product Translations</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('shoppingCarts.index') }}"
       class="nav-link {{ Request::is('shoppingCarts*') ? 'active' : '' }}">
        <p>Shopping Carts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('customers.index') }}"
       class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
        <p>Customers</p>
    </a>
</li>


