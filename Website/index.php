<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Service Form</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css"> <!-- External CSS -->
</head>
<body class="w3-light-grey">

    <div class="w3-container w3-padding-32">
        <h2 class="w3-center w3-text-teal">Cybersecurity Service Form</h2>
    </div>

    <div class="w3-container w3-card-4 w3-white w3-padding-32" style="max-width: 800px; margin: auto;">
        <form method="post" action="validate_form.php" enctype="multipart/form-data">

            <!-- Basic User Info -->
            <fieldset class="w3-margin-bottom">
                <legend class="w3-text-teal w3-padding-small w3-border w3-border-teal w3-round">Basic User Information</legend>
                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label for="full_name" class="w3-text-dark-grey"><b>Full Name:</b></label>
                        <input type="text" id="full_name" name="full_name" class="w3-input w3-border w3-round" required>
                    </div>
                    <div class="w3-half">
                        <label for="email" class="w3-text-dark-grey"><b>Email Address:</b></label>
                        <input type="email" id="email" name="email" class="w3-input w3-border w3-round" required>
                    </div>
                </div>
                <div class="w3-margin-top">
                    <label for="phone" class="w3-text-dark-grey"><b>Phone Number:</b></label>
                    <input type="tel" id="phone" name="phone" class="w3-input w3-border w3-round" placeholder="Optional">
                </div>
                <div class="w3-margin-top">
                    <label for="password" class="w3-text-dark-grey"><b>Password:</b></label>
                    <input type="password" id="password" name="password" class="w3-input w3-border w3-round" required>
                </div>
            </fieldset>

            <!-- Company/Organization Info -->
            <fieldset class="w3-margin-bottom">
                <legend class="w3-text-teal w3-padding-small w3-border w3-border-teal w3-round">Company/Organization Information</legend>
                <div class="w3-margin-bottom">
                    <label for="company_name" class="w3-text-dark-grey"><b>Company/Organization Name:</b></label>
                    <input type="text" id="company_name" name="company_name" class="w3-input w3-border w3-round" required>
                </div>
                <div class="w3-margin-top">
                    <label for="industry" class="w3-text-dark-grey"><b>Industry:</b></label>
                    <select id="industry" name="industry" class="w3-select w3-border w3-round" required>
                        <option value="" disabled selected>-- Select Industry --</option>
                        <option value="finance">Finance</option>
                        <option value="healthcare">Healthcare</option>
                        <option value="tech">Tech</option>
                        <option value="education">Education</option>
                        <option value="government">Government</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </fieldset>

            <!-- Service Interest Area -->
            <fieldset class="w3-margin-bottom">
                <legend class="w3-text-teal w3-padding-small w3-border w3-border-teal w3-round">Service Interest Area</legend>
                <label for="services" class="w3-text-dark-grey"><b>Select Services:</b></label>
                <div class="w3-margin-top">
                    <input type="checkbox" name="services[]" value="vulnerability_assessment"> Vulnerability Assessment<br>
                    <input type="checkbox" name="services[]" value="penetration_testing"> Penetration Testing<br>
                    <input type="checkbox" name="services[]" value="soc_service"> SOC-as-a-Service<br>
                    <input type="checkbox" name="services[]" value="threat_hunting"> Threat Hunting<br>
                    <input type="checkbox" name="services[]" value="ddos_protection"> DDoS Protection<br>
                    <input type="checkbox" name="services[]" value="incident_response"> Incident Response<br>
                    <input type="checkbox" name="services[]" value="cyber_audit"> Cybersecurity Audit<br>
                    <input type="checkbox" name="services[]" value="compliance_risk"> Compliance & Risk Assessment (GDPR, ISO27001)<br>
                </div>
            </fieldset>

            <!-- Training Program -->
            <fieldset class="w3-margin-bottom">
                <legend class="w3-text-teal w3-padding-small w3-border w3-border-teal w3-round">Training Program</legend>
                <label for="training_program" class="w3-text-dark-grey"><b>Select Training:</b></label>
                <select id="training_program" name="training_program" class="w3-select w3-border w3-round">
                    <option value="" disabled selected>-- Select a Program --</option>
                    <option value="web_pentesting">Web Pentesting</option>
                    <option value="soc_analyst">SOC Analyst</option>
                    <option value="audit">Audit</option>
                    <option value="not_interested">Not Interested</option>
                </select>
            </fieldset>

            <!-- File Upload -->
            <fieldset class="w3-margin-bottom">
                <legend class="w3-text-teal w3-padding-small w3-border w3-border-teal w3-round">Upload Supporting Document</legend>
                <label for="file_upload" class="w3-text-dark-grey"><b>Upload File (PDF, DOCX, etc.):</b></label>
                <input type="file" id="file_upload" name="file_upload" class="w3-input w3-border w3-round">
            </fieldset>

            <!-- Submit -->
            <div class="w3-margin-top w3-center">
                <input type="submit" value="Submit" class="w3-button w3-teal w3-round-large">
            </div>

        </form>
    </div>

</body>
</html>