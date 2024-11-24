    
      function setCookie(name, value, days) {
        let date = new Date();
        // Set the expiration time based on the given number of days
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        
        // Format the expiration date to UTC string
        let expires = "expires=" + date.toUTCString();
        
        // Set the cookie with the specified attributes (name, value, expiration, and path)
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // On page load, set cookies for 'username' and 'password'
    window.onload = function() {
        setCookie("username", "monosir", 7);  // Set cookie for username with 7-day expiration
        setCookie("password", "monosir123", 7);  // Set cookie for password with 7-day expiration
    }

    // Function to logout and clear session/local storage and cookies
    function logout() {
        // Clear session and local storage if used
        sessionStorage.clear();
        localStorage.clear();

        // Remove cookies by setting their expiration date to the past
        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";

        // Redirect to the login page after logout
        window.location.href = "login.html";  // Redirect to login page (adjust the URL if necessary)
    }
