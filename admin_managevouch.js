document.addEventListener("DOMContentLoaded", () => {
    // Filter functionality
    document.querySelector(".filter-btn").addEventListener("click", () => {
        const search = document.getElementById("search").value.toLowerCase();
        const status = document.getElementById("status-filter").value.toLowerCase();
        const rows = document.querySelectorAll("#voucher-table tbody tr");

        rows.forEach((row) => {
            const voucherID = row.cells[0].textContent.toLowerCase();
            const employeeName = row.cells[1].textContent.toLowerCase();
            const rowStatus = row.cells[3].textContent.toLowerCase();

            row.style.display =
                (voucherID.includes(search) || employeeName.includes(search)) &&
                (status === "" || rowStatus.includes(status))
                    ? ""
                    : "none";
        });
    });

    // Action buttons
    document.querySelectorAll(".approve-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const row = btn.closest("tr");
            row.cells[3].textContent = "Approved";
            row.querySelector(".progress").style.width = "100%";
        });
    });

    document.querySelectorAll(".reject-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const row = btn.closest("tr");
            row.cells[3].textContent = "Rejected";
            row.querySelector(".progress").style.width = "0%";
        });
    });
});
