const itemAddModal = document.getElementById('add_item_modal');
const itemAddModalClose = document.getElementById('add_item_close');
const itemAddModalOpen = document.getElementById('add_item_open');

itemAddModalOpen.addEventListener('click', () => {
    itemAddModal.classList.toggle('hidden');
});

itemAddModalClose.addEventListener('click', () => {
    itemAddModal.classList.toggle('hidden');
});

const categoryAddModal = document.getElementById('add_category_modal');
const categoryAddModalClose = document.getElementById('add_category_close'); 
const categoryAddModalOpen = document.getElementById('add_category_open');
const categoryAddModalOpenZero = document.getElementById('add_category_open0');

categoryAddModalOpen.addEventListener('click', () => {
    categoryAddModal.classList.toggle('hidden'); 
});

categoryAddModalOpenZero.addEventListener('click', () => {
    categoryAddModal.classList.toggle('hidden'); 
});

categoryAddModalClose.addEventListener('click', () => {
    categoryAddModal.classList.toggle('hidden');
});

function confirmDeleteCategory() {
    if (confirm("Are you sure you want to delete this item?")) {
          document.getElementById('delete-form').submit();
    }
}
    