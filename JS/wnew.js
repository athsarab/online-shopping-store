if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCart)
} else {
    initCart()
}

var CART_STORAGE_KEY = 'kiyaraa_cart_v1'

function initCart() {
    bindCartUi()
    bindAddToCartButtons()
    renderCart()
}

function bindCartUi() {
    var toggle = document.getElementById('cart-toggle')
    var closeBtn = document.getElementById('cart-close')
    var overlay = document.getElementById('cart-overlay')

    if (toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault()
            openCart()
        })
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            closeCart()
        })
    }

    if (overlay) {
        overlay.addEventListener('click', function () {
            closeCart()
        })
    }

    // Optional: close on Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeCart()
        }
    })
}

function bindAddToCartButtons() {
    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        addToCartButtons[i].addEventListener('click', addToCartClicked)
    }
}

function openCart() {
    var sidebar = document.getElementById('cart-sidebar')
    var overlay = document.getElementById('cart-overlay')
    if (!sidebar || !overlay) return
    sidebar.classList.add('is-open')
    sidebar.setAttribute('aria-hidden', 'false')
    overlay.hidden = false
}

function closeCart() {
    var sidebar = document.getElementById('cart-sidebar')
    var overlay = document.getElementById('cart-overlay')
    if (!sidebar || !overlay) return
    sidebar.classList.remove('is-open')
    sidebar.setAttribute('aria-hidden', 'true')
    overlay.hidden = true
}

function purchaseClicked(e) {
    // If you want to stop navigation and just clear:
    // e.preventDefault()
    clearCart()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var titleEl = shopItem.getElementsByClassName('shop-item-title')[0]
    var priceEl = shopItem.getElementsByClassName('shop-item-price')[0]
    var imgEl = shopItem.getElementsByClassName('product-image')[0]
    if (!titleEl || !priceEl || !imgEl) return

    var title = titleEl.innerText.trim()
    var priceText = priceEl.innerText
    var price = parsePrice(priceText)
    var imageSrc = imgEl.src

    addItemToCart(title, price, imageSrc)
    renderCart()
    openCart()
}

function parsePrice(text) {
    // Handles formats like "Rs 1875.00" or "Rs1875.00"
    var cleaned = String(text).replace(/Rs\s*/i, '').trim()
    var num = parseFloat(cleaned)
    if (isNaN(num)) return 0
    return num
}

function getCartItems() {
    try {
        var raw = localStorage.getItem(CART_STORAGE_KEY)
        if (!raw) return []
        var parsed = JSON.parse(raw)
        if (!Array.isArray(parsed)) return []
        return parsed
    } catch (e) {
        return []
    }
}

function setCartItems(items) {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(items))
}

function addItemToCart(title, price, imageSrc) {
    var items = getCartItems()
    var found = false
    for (var i = 0; i < items.length; i++) {
        if (items[i].title === title) {
            items[i].quantity = (items[i].quantity || 1) + 1
            found = true
            break
        }
    }
    if (!found) {
        items.push({ title: title, price: price, imageSrc: imageSrc, quantity: 1 })
    }
    setCartItems(items)
}

function updateItemQuantity(title, quantity) {
    var items = getCartItems()
    for (var i = 0; i < items.length; i++) {
        if (items[i].title === title) {
            items[i].quantity = quantity
            break
        }
    }
    setCartItems(items)
}

function removeItem(title) {
    var items = getCartItems()
    var next = []
    for (var i = 0; i < items.length; i++) {
        if (items[i].title !== title) next.push(items[i])
    }
    setCartItems(next)
}

function clearCart() {
    setCartItems([])
    renderCart()
}

function renderCart() {
    var cartItemsContainer = document.getElementsByClassName('cart-items')[0]
    if (!cartItemsContainer) return

    var items = getCartItems()

    // Clear
    while (cartItemsContainer.firstChild) {
        cartItemsContainer.removeChild(cartItemsContainer.firstChild)
    }

    for (var i = 0; i < items.length; i++) {
        var item = items[i]

        var cartRow = document.createElement('div')
        cartRow.classList.add('cart-row')

        var cartRowContents =
            '<div class="cart-item cart-column">' +
            '<img class="cart-item-image" src="' + item.imageSrc + '" width="100" height="100" alt="">' +
            '<span class="cart-item-title">' + escapeHtml(item.title) + '</span>' +
            '</div>' +
            '<span class="cart-price cart-column">Rs ' + Number(item.price).toFixed(2) + '</span>' +
            '<div class="cart-quantity cart-column">' +
            '<input class="cart-quantity-input" type="number" min="1" value="' + (item.quantity || 1) + '">' +
            '<button class="btn btn-danger" type="button">REMOVE</button>' +
            '</div>'

        cartRow.innerHTML = cartRowContents
        cartItemsContainer.appendChild(cartRow)

        attachRowHandlers(cartRow, item.title)
    }

    updateCartTotalAndCount()

    // Bind purchase button if present
    var purchaseBtn = document.getElementsByClassName('btn-purchase')[0]
    if (purchaseBtn && !purchaseBtn.dataset.bound) {
        purchaseBtn.addEventListener('click', purchaseClicked)
        purchaseBtn.dataset.bound = '1'
    }
}

function attachRowHandlers(cartRow, title) {
    var removeBtn = cartRow.getElementsByClassName('btn-danger')[0]
    var qtyInput = cartRow.getElementsByClassName('cart-quantity-input')[0]

    if (removeBtn) {
        removeBtn.addEventListener('click', function () {
            removeItem(title)
            renderCart()
        })
    }

    if (qtyInput) {
        qtyInput.addEventListener('change', function (event) {
            var val = parseInt(event.target.value, 10)
            if (isNaN(val) || val <= 0) val = 1
            event.target.value = val
            updateItemQuantity(title, val)
            updateCartTotalAndCount()
        })
    }
}

function updateCartTotalAndCount() {
    var items = getCartItems()
    var total = 0
    var count = 0
    for (var i = 0; i < items.length; i++) {
        var qty = items[i].quantity || 1
        count += qty
        total += (Number(items[i].price) || 0) * qty
    }
    total = Math.round(total * 100) / 100

    var totalEl = document.getElementsByClassName('cart-total-price')[0]
    if (totalEl) totalEl.innerText = 'Rs' + total

    var countEl = document.getElementById('cart-count')
    if (countEl) countEl.innerText = String(count)
}

function escapeHtml(str) {
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;')
}



