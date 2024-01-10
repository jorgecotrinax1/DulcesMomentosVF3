const itemList = document.getElementById('item-list');
const totalPrice = document.getElementById('total-price');
const closeBtn = document.getElementById('close-btn');

// Agregar un item al carrito
function addItem(name, price) {
  const item = document.createElement('li');
  const quantityContainer = document.createElement('div');
  const decreaseBtn = document.createElement('button');
  const increaseBtn = document.createElement('button');
  const quantityValue = document.createElement('span');
  const removeBtn = document.createElement('button');

  item.textContent = `${name} - $${price}`;
  decreaseBtn.textContent = '-';
  increaseBtn.textContent = '+';
  quantityValue.textContent = '1';
  removeBtn.innerHTML = '&#10006;'; // X simbolo

  decreaseBtn.classList.add('quantity-btn');
  increaseBtn.classList.add('quantity-btn');
  quantityValue.classList.add('quantity-value');
  removeBtn.classList.add('remove-btn');

  decreaseBtn.addEventListener('click', () => {
    let quantity = parseInt(quantityValue.textContent);
    if (quantity > 1) {
      quantity--;
      quantityValue.textContent = quantity.toString();
      updateTotalPrice();
    }
  });

  increaseBtn.addEventListener('click', () => {
    let quantity = parseInt(quantityValue.textContent);
    quantity++;
    quantityValue.textContent = quantity.toString();
    updateTotalPrice();
  });

  removeBtn.addEventListener('click', () => {
    removeItem(item);
  });

  quantityContainer.classList.add('item-quantity');
  quantityContainer.appendChild(decreaseBtn);
  quantityContainer.appendChild(quantityValue);
  quantityContainer.appendChild(increaseBtn);

  item.appendChild(quantityContainer);
  item.appendChild(removeBtn);
  itemList.appendChild(item);

  updateTotalPrice();
}

// Quitar un item del carrito
function removeItem(item) {
  item.parentNode.removeChild(item);
  updateTotalPrice();
}

// Calcular y mostrar el precio total
function updateTotalPrice() {
  const items = itemList.getElementsByTagName('li');
  let total = 0;
  for (let i = 0; i < items.length; i++) {
    const price = parseFloat(items[i].textContent.split('$')[1]);
    const quantity = parseInt(items[i].querySelector('.quantity-value').textContent);
    total += price * quantity;
  }
  totalPrice.textContent = `Total: $${total.toFixed(2)}`;
}

// Para cerrar el carrito
closeBtn.addEventListener('click', () => {
  document.querySelector('.cart').style.display = 'none';
});

// place holders por ahora
addItem('Producto 1', 10);
addItem('Producto 2', 15);
addItem('Producto 3', 20);

const removeButtons = itemList.getElementsByClassName('remove-btn');
for (let i = 0; i < removeButtons.length; i++) {
  removeButtons[i].addEventListener('click', () => {
    const item = removeButtons[i].parentNode;
    removeItem(item);
  });
}
