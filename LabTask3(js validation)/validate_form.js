document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("cybersecurityForm");

    form.addEventListener("submit", function (event) {
        let valid = true;

        // Full Name Validation
        const fullName = document.getElementById("full_name").value.trim();
        if (fullName === "") {
            alert("Full Name is required.");
            valid = false;
        }

        // Email Validation
        const email = document.getElementById("email").value.trim();
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === "" || !emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            valid = false;
        }

        // Phone Number Validation
        const phone = document.getElementById("phone").value.trim();
        const phonePattern = /^[0-9]{10,15}$/;
        if (phone !== "" && !phonePattern.test(phone)) {
            alert("Please enter a valid phone number (10-15 digits) or leave it blank.");
            valid = false;
        }

        // Password Validation
        const password = document.getElementById("password").value.trim();
        if (password === "") {
            alert("Password is required.");
            valid = false;
        } else if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            valid = false;
        }

        // Company Name Validation
        const companyName = document.getElementById("company_name").value.trim();
        if (companyName === "") {
            alert("Company/Organization Name is required.");
            valid = false;
        }

        // Industry Validation
        const industry = document.getElementById("industry").value;
        if (industry === "") {
            alert("Please select an industry.");
            valid = false;
        }

        // File Upload Validation
        const fileUpload = document.getElementById("file_upload").value;
        const allowedExtensions = /(\.pdf|\.docx|\.txt)$/i;
        if (fileUpload !== "" && !allowedExtensions.test(fileUpload)) {
            alert("Please upload a valid file (PDF, DOCX, TXT).");
            valid = false;
        }

        // Prevent form submission if validation fails
        if (!valid) {
            event.preventDefault();
        }
    });
});