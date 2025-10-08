<?php
// auth_form.php
// Included by index.php when not authenticated

$is_login_view = $current_view === 'login';
?>

<div id="auth-card" class="bg-white p-8 sm:p-10 rounded-xl shadow-2xl w-full max-w-sm md:max-w-md transition-all duration-500">

    <header class="mb-6 pb-4 border-b">
        <h1 id="form-header" class="text-xl font-semibold text-gray-700 text-center">
            Manan Laundry System || User <?php echo $is_login_view ? 'Login' : 'Registration'; ?>
        </h1>
    </header>

    <div class="text-center mb-4">
        <?php echo $auth_message; ?>
    </div>
    
    <div id="form-container">
        
        <form id="registration-form" method="POST" action="index.php?view=register" class="space-y-4 <?php echo $is_login_view ? 'hidden' : ''; ?>">
            <input type="hidden" name="form_type" value="register">
            <input type="text" id="reg-fullName" name="reg-fullName" placeholder="Full Name" required class="form-input">
            <input type="email" id="reg-email" name="reg-email" placeholder="Email" required class="form-input">
            <input type="tel" id="reg-mobile" name="reg-mobile" placeholder="Mobile Number (e.g., 555-123-4567)" class="form-input">
            <input type="password" id="reg-password" name="reg-password" placeholder="Password" required class="form-input">
            
            <button type="submit" class="main-button mt-6">Register</button>

            <div class="text-center pt-4 space-y-2">
                <a href="index.php?view=login" class="text-link">Login Page</a>
                <p class="text-link">Forgot Password?</p>
            </div>
        </form>

        <form id="login-form" method="POST" action="index.php?view=login" class="space-y-4 <?php echo $is_login_view ? '' : 'hidden'; ?>">
            <input type="hidden" name="form_type" value="login">
            <input type="email" id="log-email" name="log-email" placeholder="Email (Use test@example.com)" required class="form-input">
            <input type="password" id="log-password" name="log-password" placeholder="Password (Use password123)" required class="form-input">
            
            <button type="submit" class="main-button mt-6">Login</button>

            <div class="text-center pt-4 space-y-2">
                <a href="index.php?view=register" class="text-link">Register Page</a>
                <p class="text-link">Forgot Password?</p>
            </div>
        </form>
    </div>
</div>