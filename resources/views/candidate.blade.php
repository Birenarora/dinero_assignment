<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidate Portal</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> --}}
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
</head>
<body>
    <div class="buttons">
        <button id="candidate_btn">Candidate Form</button>
        <button id="display_btn">Display All Candidates</button>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="candidate_form">
        <h2>Empolyment Application Form</h2>
        <p><i>Fill the form below accurately indicating your potentials and suitability to job applying for.</i></p>
        @if (count($errors) > 0)
            <div class="alert-error" style="margin-bottom: 10px;">
                <ul style="list-style-type: none; padding: 0; color: red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action={{ route('candidate.store') }} enctype="multipart/form-data">
            @csrf
            <div class="form_container">
                <p class="form_titles">Name: <span class="aestrick">*</span></p>
                <div class="form_sub_container">
                    <div class="form_input_container">
                        <input type="text" id="first_name" name="first_name" value={{ old('first_name', '') }}>
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="form_input_container">
                        <input type="text" id="last_name" name="last_name" value={{ old('last_name') }}>
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">Birth Date: </p>
                <div class="form_sub_container">
                    <div class="form_input_container">
                        <input type="text" id="dob_month" name="dob_month" value={{ old('dob_month') }}>
                        <label for="dob_month">Month</label>
                    </div>
                    <div class="form_input_container">
                        <input type="text" id="dob_day" name="dob_day" value={{ old('dob_day') }}>
                        <label for="dob_day">Day</label>
                    </div>
                    <div class="form_input_container">
                        <input type="text" id="dob_year" name="dob_year" value={{ old('dob_year') }}>
                        <label for="dob_year">Year</label>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">Phone Number: <span class="aestrick">*</span></p>
                <div class="form_sub_container">
                    <div class="form_input_container">
                        <input type="text" id="area_code" name="area_code" value={{ old('area_code') }} > 
                        <label for="area_code">Area Code</label>
                    </div>
                    <div class="form_input_container" style="align-self: flex-start;">
                        <span>-</span>
                    </div>
                    <div class="form_input_container">
                        <input type="text" id="phone_number" name="phone_number" value={{ old('phone_number') }} >
                        <label for="phone_number">Phone Number</label>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">E-mail address: </p>
                <div class="form_sub_container">
                    <div class="form_input_container">
                        <input type="email" id="email_address" name="email_address" placeholder="ex: myname@example.com" style="width: 300px;" value={{ old('email_address') }}>
                        <label for="email_address">example@example.com</label>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">Address: <span class="aestrick">*</span></p>
                <div class="form_sub_container"  style="flex-direction: column; align-items: flex-start;">
                    <div class="form_input_container" style="margin-bottom: 10px;">
                        <input type="text" id="address_line1" name="address_line1" value={{ old('address_line1') }} >
                        <label for="address_line1">Street Address</label>
                    </div>
                    <div class="form_input_container" style="margin-bottom: 10px;">
                        <input type="text" id="address_line2" name="address_line2" value={{ old('address_line2') }}>
                        <label for="address_line2">Street Address Line 2</label>
                    </div>
                    <div class="form_input_container" style="margin-bottom: 10px;">
                        <input type="text" id="city" name="city" value={{ old('city') }} >
                        <label for="city">City</label>
                    </div>
                    <div class="form_input_container" style="margin-bottom: 10px;">
                        <input type="text" id="state" name="state" value={{ old('state') }} >
                        <label for="state">State / Province</label>
                    </div>
                    <div class="form_input_container" style="margin-bottom: 10px;">
                        <input type="text" id="pincode" name="pincode" value={{ old('pincode') }} >
                        <label for="pincode">Postal / Zip Code</label>
                    </div>
                </div>
            </div>
            <h3>Job Skills & Training</h3>
            <div class="form_container">
                <p class="form_titles">Describe your skills: <span class="aestrick">*</span></p>
                <div class="form_sub_container">
                    <div class="form_input_container">
                        <textarea name="skills" id="skills" cols="30" rows="5" value={{ old('skills') }} ></textarea>
                    </div>
                </div>
            </div>
            <div class="form_container" style="display: flex; flex-direction: column;">
                <p class="form_titles">Training or Certifications: </p>
                <div class="form_sub_container">
                    <div class="form_input_container">
                        <textarea name="training_or_certifications" id="training_or_certifications" cols="70" rows="6" value={{ old('training_or_certifications') }}></textarea>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">How you were referred to us? <span class="aestrick">*</span></p>
                <div class="form_sub_container"  style="display: grid; grid-template-columns: auto 1fr;">
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through1" value="Walk-In">
                        <label for="reffered_through1">Walk-In</label>
                    </div>
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through2" value="Employee">
                        <label for="reffered_through2">Employee</label>
                    </div>
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through3" value="Newspaper Ad">
                        <label for="reffered_through3">Newspaper Ad</label>
                    </div>
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through4" value="Facebook">
                        <label for="reffered_through4">Facebook</label>
                    </div>
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through5" value="Twitter">
                        <label for="reffered_through5">Twitter</label>
                    </div>
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through6" value="Craiglist">
                        <label for="reffered_through6">Craiglist</label>
                    </div>
                    <div class="form_checkbox_container">
                        <input type="checkbox" name="reffered_through[]" id="reffered_through_other" value="Other">
                        <label for="reffered_through7">Other (please specify)</label>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">Others: </p>
                <div class="form_sub_container" style="align-items: unset;">
                    <div class="form_input_container">
                        <input type="text" id="reffered_through_others" name="reffered_through_others" value={{ old('reffered_through_others') }}>
                    </div>
                </div>
            </div>
            <div class="form_container">
                <p class="form_titles">Upload Resume: </p>
                <div class="form_sub_container" style="align-items: unset;">
                    <div class="form_input_container">
                        <input type="file" id="resume" name="resume">
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit Application" id="submit_form">
        </form>
    </div>
    <div class="display_all_candidates">
        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Skills</th>
                    <th>Training/Certifications</th>
                    <th>Referred Through</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src={{ asset("js/common.js") }}></script>
</body>
</html>