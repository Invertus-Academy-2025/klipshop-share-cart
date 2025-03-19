 <h2>Cart products</h2>

    {if $products}
        <ul>
            {foreach from=$products item=product}
                <li><strong>ID:</strong> {$product.id} - <strong>Name:</strong> {$product.name}</li>
            {/foreach}
        </ul>
    {else}
        <p>Your cart is empty.</p>
    {/if}
