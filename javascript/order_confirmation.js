let confirm = document.getElementById('ok-confirm');

//sends user back to home page, this prevents the user from going back to order screen
confirm.addEventListener('click', function(e) { 
    window.location.href = "https://webdev.cs.uwosh.edu/students/schomm42/final-project_cs346/source/homepage.php", true;
});