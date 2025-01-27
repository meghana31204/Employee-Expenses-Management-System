// Script to add interactive filter functionality to the voucher status table
document.addEventListener('DOMContentLoaded', function () {
    // Create a filter dropdown for filtering by status
    const filterSelect = document.createElement('select');
    filterSelect.innerHTML = `
        <option value="">Filter by Status</option>
        <option value="Approved">Approved</option>
        <option value="Pending">Pending</option>
        <option value="Rejected">Rejected</option>
    `;
    document.querySelector('.container').insertBefore(filterSelect, document.querySelector('table'));

    // Event listener for the filter dropdown
    filterSelect.addEventListener('change', function () {
        const status = this.value.toLowerCase();
        const rows = document.querySelectorAll('#statusTable tr');

        rows.forEach(row => {
            const rowStatusCell = row.querySelector('td:nth-child(4)');
            if (rowStatusCell) {
                const rowStatus = rowStatusCell.textContent.toLowerCase();
                if (status === '' || rowStatus === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
});
