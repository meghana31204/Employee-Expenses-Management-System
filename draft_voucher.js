document.addEventListener('DOMContentLoaded', function () {
    const voucherTable = document.getElementById('voucherTable');

    voucherTable.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-btn')) {
            const row = event.target.closest('tr');
            const cells = row.querySelectorAll('td');
            const date = cells[0].textContent;
            const category = cells[1].textContent;
            const amount = cells[2].textContent;
            const description = cells[3].textContent;

            const newDate = prompt('Edit Date:', date);
            const newCategory = prompt('Edit Category:', category);
            const newAmount = prompt('Edit Amount:', amount);
            const newDescription = prompt('Edit Description:', description);

            if (newDate && newCategory && newAmount && newDescription) {
                cells[0].textContent = newDate;
                cells[1].textContent = newCategory;
                cells[2].textContent = newAmount;
                cells[3].textContent = newDescription;
            } else {
                alert('All fields must be filled out to edit.');
            }
        }

        if (event.target.classList.contains('delete-btn')) {
            const row = event.target.closest('tr');
            const confirmation = confirm('Are you sure you want to delete this voucher?');

            if (confirmation) {
                row.remove();
            }
        }
    });
});
