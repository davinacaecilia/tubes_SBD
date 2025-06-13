document.addEventListener('DOMContentLoaded', function() {
    fetch('/admin/dashboard/chart-data')
        .then(response => response.json())
        .then(data => {
            const museumLabels = data.museum.map(item => item.museum);
            const museumCounts = data.museum.map(item => item.total);

            const mediumLabels = data.medium.map(item => item.medium);
            const mediumCounts = data.medium.map(item => item.total);

            // Museum Chart
            const museumData = {
                labels: museumLabels,
                datasets: [{
                    label: 'Number of Artworks',
                    data: museumCounts,
                    backgroundColor: [
                        '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4',
                        '#FFEAA7', '#DDA0DD', '#98D8C8', '#F8B500'
                    ],
                    borderWidth: 0,
                    borderRadius: 8
                }]
            };

            const museumConfig = {
                type: 'bar',
                data: museumData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#f0f0f0' },
                            ticks: { color: '#666' },
                            title: { display: true, text: 'Number of Artworks' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#666', maxRotation: 45 },
                            title: { display: true, text: 'Museum' }
                        }
                    }
                }
            };

            const museumCtx = document.getElementById('museumChart').getContext('2d');
            new Chart(museumCtx, museumConfig);

            // Medium Chart
            const mediumData = {
                labels: mediumLabels,
                datasets: [{
                    label: 'Number of Artworks',
                    data: mediumCounts,
                    backgroundColor: [
                        '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4',
                        '#FFEAA7', '#DDA0DD', '#F8B500', '#98D8C8'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            };

            const mediumConfig = {
                type: 'doughnut',
                data: mediumData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: { usePointStyle: true, padding: 20, color: '#666' }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) label += ': ';
                                    if (context.parsed !== null) label += context.parsed;
                                    return label;
                                }
                            }
                        }
                    },
                    cutout: '60%'
                }
            };

            const mediumCtx = document.getElementById('mediumChart').getContext('2d');
            new Chart(mediumCtx, mediumConfig);
        });
});
