document.querySelector('.btn-success').addEventListener('click', () => {
            approveVoucher();
        });

        document.querySelector('.btn-danger').addEventListener('click', function() {
            showTextbox(this);
        });

        function showTextbox(button) {
            const textbox = button.nextElementSibling;
            textbox.style.display = textbox.style.display === 'block' ? 'none' : 'block';
        }

        function approveVoucher() {
            // Get the approval message element and update its content
            var messageDiv = document.getElementById('approvalMessage');
            messageDiv.textContent = 'Approved';
            messageDiv.style.display = 'block';
        }

        function closeMessage() {
            // Get the message element
            var messageDiv = document.getElementById('approvalMessage');
            // Hide the message
            messageDiv.style.display = 'none';
        }