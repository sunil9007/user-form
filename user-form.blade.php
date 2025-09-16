<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input[type="checkbox"],
        .form-container input[type="radio"] {
            margin-right: 10px;
        }

        .form-container select,
        .form-container input[type="number"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .checkbox-group {
            margin-bottom: 20px;
        }

        .checkbox-group label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input.error,
        .form-group select.error {
            border-color: red;
        }

        .error-message {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>User Information Form</h2>
        <form action="{{ url('adduser') }}" method="post" id="userForm">
            @csrf

            <form action="{{ url('adduser') }}" method="post" id="userForm">
                @csrf
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your name"
                        class="@error('name') error @enderror">
                    @error('name')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        class="@error('email') error @enderror">
                    @error('email')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <!-- Mobile Number -->
                <div class="form-group">
                    <label for="mobile">Mobile Number:</label>
                    <input type="text" id="mobile" name="mobile"
                        value="{{ old('mobile') }}"
                        placeholder="Enter your mobile number"
                        class="@error('mobile') error @enderror">
                    @error('mobile')<div class="error-message">{{ $message }}</div>@enderror
                </div>




                <!-- Checkbox Group -->
                <label>Skills:</label>
                <div class="checkbox-group">
                    @error('skill')<span style="color: red;">{{ $message }}</span><br>@enderror

                    <label><input type="checkbox" name="skill[]" value="PHP" {{ (is_array(old('skill')) && in_array('PHP', old('skill'))) ? 'checked' : '' }}> PHP</label>
                    <label><input type="checkbox" name="skill[]" value="JAVA" {{ (is_array(old('skill')) && in_array('JAVA', old('skill'))) ? 'checked' : '' }}> JAVA</label>
                    <label><input type="checkbox" name="skill[]" value="SQL" {{ (is_array(old('skill')) && in_array('SQL', old('skill'))) ? 'checked' : '' }}> SQL</label>
                    <label><input type="checkbox" name="skill[]" value="CSS" {{ (is_array(old('skill')) && in_array('CSS', old('skill'))) ? 'checked' : '' }}> CSS</label>
                </div>

                <!-- Radio Buttons -->
                <label>Gender:</label>
                @error('gender')<span style="color: red;">{{ $message }}</span><br>@enderror

                <label><input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> Male</label>
                <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female</label>
                <label><input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}> Other</label>

                <!-- Age Range -->
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" min="1" max="120" placeholder="Enter your age" value="{{ old('age') }}">
                @error('age')<span style="color: red;">{{ $message }}</span><br>@enderror

                <!-- City Dropdown -->
                <label for="city">Select City:</label>
                <select id="city" name="city">
                    <option value="">--Select City--</option>
                    <option value="newyork" {{ old('city') == 'newyork' ? 'selected' : '' }}>New York</option>
                    <option value="losangeles" {{ old('city') == 'losangeles' ? 'selected' : '' }}>Los Angeles</option>
                    <option value="chicago" {{ old('city') == 'chicago' ? 'selected' : '' }}>Chicago</option>
                    <option value="houston" {{ old('city') == 'houston' ? 'selected' : '' }}>Houston</option>
                    <option value="miami" {{ old('city') == 'miami' ? 'selected' : '' }}>Miami</option>
                </select>
                @error('city')<span style="color: red;">{{ $message }}</span><br>@enderror

                <!-- Submit Button -->
                <br><input type="submit" value="Submit">
            </form>
    </div>

    <!-- <script>
        document.getElementById('userForm').addEventListener('submit', function (e) {
            // Validate Skills
            const skillCheckboxes = document.querySelectorAll('input[name="skill[]"]');
            let skillChecked = false;
            skillCheckboxes.forEach(chk => {
                if (chk.checked) skillChecked = true;
            });
            if (!skillChecked) {
                alert('Please select at least one skill.');
                e.preventDefault();
                return;
            }

            // Validate Gender
            const gender = document.querySelector('input[name="gender"]:checked');
            if (!gender) {
                alert('Please select your gender.');
                e.preventDefault();
                return;
            }

            // Validate Age
            const age = document.getElementById('age').value;
            if (age === '' || age < 1 || age > 120) {
                alert('Please enter a valid age between 1 and 120.');
                e.preventDefault();
                return;
            }

            // Validate City
            const city = document.getElementById('city').value;
            if (city === '') {
                alert('Please select a city.');
                e.preventDefault();
                return;
            }

            // If all validations pass, form submits normally
        });
    </script> -->
</body>

</html>