document.addEventListener("DOMContentLoaded", () => {
    const stats = {
        totalVouchers: 150,
        pendingApprovals: 10,
        approvedVouchers: 120,
        rejectedVouchers: 20,
    };

    document.querySelector(".stat-card:nth-child(1) p").textContent = stats.totalVouchers;
    document.querySelector(".stat-card:nth-child(2) p").textContent = stats.pendingApprovals;
    document.querySelector(".stat-card:nth-child(3) p").textContent = stats.approvedVouchers;
    document.querySelector(".stat-card:nth-child(4) p").textContent = stats.rejectedVouchers;

    const ctxApprovalRate = document.createElement('canvas');
    document.querySelector(".chart-card:nth-child(1) .chart-placeholder").appendChild(ctxApprovalRate);
    new Chart(ctxApprovalRate, {
        type: 'pie',
        data: {
            labels: ['Approved', 'Pending', 'Rejected'],
            datasets: [{
                label: 'Approval Rate',
                data: [stats.approvedVouchers, stats.pendingApprovals, stats.rejectedVouchers],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        } 
    });

    const ctxVoucherTrends = document.createElement('canvas');
    document.querySelector(".chart-card:nth-child(2) .chart-placeholder").appendChild(ctxVoucherTrends);
    new Chart(ctxVoucherTrends, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Voucher Trends',
                data: [30, 50, 70, 90],
                borderColor: '#007bff',
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
