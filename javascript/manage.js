let deleteSubmit = document.getElementById('delete-user');
deleteSubmit.addEventListener('click', function(e) {
    e.preventDefault();
    window.location.reload();
});