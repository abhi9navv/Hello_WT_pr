<?php
// index.php

session_start();

// --- CONFIGURATION / GLOBAL VARIABLES ---
$is_authenticated = isset($_SESSION['user_id']);
$current_view = isset($_GET['view']) ? $_GET['view'] : 'login'; // Default to login view
$auth_message = ''; // For displaying login/reg errors or success
$success_redirect = false;

// Simulated User Data (In a real app, this would be a database call)
const TEST_EMAIL = 'test@example.com';
const TEST_PASSWORD = 'password123'; // In a real app, use password_hash()

// --- CONTROLLER LOGIC ---

// Handle Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php?view=login');
    exit;
}

// Handle Form Submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determine which form was submitted (check a hidden field or button name)
    if (isset($_POST['form_type'])) {

        // --- Handle Login ---
        if ($_POST['form_type'] === 'login') {
            $email = trim($_POST['log-email']);
            $password = $_POST['log-password'];

            if ($email === TEST_EMAIL && $password === TEST_PASSWORD) {
                // Successful Login Simulation
                $_SESSION['user_id'] = 1; // Example user ID
                $_SESSION['user_name'] = 'Demo User';
                $auth_message = '<p class="text-green-500 font-bold">Login successful! Redirecting...</p>';
                $success_redirect = true;
            } else {
                $auth_message = '<p class="text-red-500 font-bold">Invalid email or password.</p>';
                $current_view = 'login';
            }
        } 
        
        // --- Handle Registration ---
        elseif ($_POST['form_type'] === 'register') {
            $email = trim($_POST['reg-email']);
            $password = $_POST['reg-password'];
            // In a real application: 
            // 1. Validate input (e.g., strong password, unique email).
            // 2. Hash the password: $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // 3. Insert into database.
            
            // Registration Success Simulation
            $auth_message = '<p class="text-green-500 font-bold">Registration successful! Please log in.</p>';
            $current_view = 'login';
        }
    }
}

// Check for successful authentication after processing
if (isset($_SESSION['user_id'])) {
    $is_authenticated = true;
}

// If authenticated, force the dashboard view, unless a redirect is active.
if ($is_authenticated && !$success_redirect) {
    $current_view = 'dashboard';
}

// --- RENDER THE PAGE ---
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manan Laundry System | 
        <?php echo $is_authenticated ? 'Dashboard' : ($current_view === 'login' ? 'User Login' : 'User Registration'); ?>
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom font and smooth transitions */
        :root {
            --primary-blue: #1c7ed6;
            --sidebar-bg: #2f3640; /* Darker background for sidebar */
        }
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* Dynamic background based on view */
            background-color: <?php echo $is_authenticated ? '#f3f4f6' : '#2c3e50'; ?>; 
            <?php if (!$is_authenticated): ?>
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            <?php endif; ?>
        }
        /* Styles for the Auth Card (login/registration) */
        .form-input {
            transition: all 0.3s ease;
            @apply w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm;
        }
        .main-button {
            transition: background-color 0.3s ease, transform 0.1s ease;
            background-color: var(--primary-blue);
            @apply w-full text-white font-bold py-3 rounded-lg hover:bg-blue-700 active:scale-[0.99] shadow-md;
        }
        .text-link {
            /* PHP replaces JS for toggling, so links become anchor tags */
            @apply text-sm text-blue-600 hover:text-800 transition duration-150 cursor-pointer;
        }

        /* Styles for the Dashboard Sidebar Navigation */
        .sidebar-link {
            @apply flex items-center px-4 py-3 text-sm font-medium transition duration-150 hover:bg-gray-700/50 cursor-pointer;
        }
        .sidebar-link.active {
            @apply bg-blue-700/70 text-white border-l-4 border-blue-400;
        }
    </style>
</head>
<body class="<?php echo $is_authenticated ? 'flex fixed inset-0' : ''; ?>">

    <?php 
    if ($is_authenticated) {
        // Load the dashboard view
        include 'dashboard.php';
    } else {
        // Load the authentication forms view
        include 'auth_form.php';
    }
    ?>

    <?php if ($success_redirect): // Simple JavaScript redirect after successful login ?>
    <script>
        setTimeout(() => {
            window.location.href = 'index.php'; // Redirect to clear POST data and show dashboard
        }, 1500);
    </script>
    <?php endif; ?>
</body>
</html>