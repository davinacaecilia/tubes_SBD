document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('tableSearchInput');
    const form = document.getElementById('searchForm');

    let timeout = null;

    input.addEventListener('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            form.submit();
        }, 500); 
    });
});
