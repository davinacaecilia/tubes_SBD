document.addEventListener('DOMContentLoaded', function () {
    const filter = document.getElementById('tableFilterSelect');
    if (filter) {
        filter.addEventListener('change', function () {
            const status = this.value;
            const url = new URL(window.location.href);
            if (status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }
            window.location.href = url.toString();
        });
    }
});
