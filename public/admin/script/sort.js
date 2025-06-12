document.addEventListener('DOMContentLoaded', function () {
    const sortSelect = document.getElementById('tableSortSelect');

    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            const sort = this.value;
            const url = new URL(window.location.href);

            if (sort) {
                url.searchParams.set('sort', sort);
            } else {
                url.searchParams.delete('sort');
            }

            window.location.href = url.toString();
        });
    }
});
