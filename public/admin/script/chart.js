// Pastikan kode ini di dalam event listener DOMContentLoaded
// document.addEventListener('DOMContentLoaded', function() { // Jika file chart.js dibungkus DOMContentLoaded

    // Data for museum chart
    const museumData = {
        labels: [
            'National Museum', // 'Museum Nasional'
            'National Gallery', // 'Galeri Nasional'
            'Fine Arts Museum', // 'Museum Seni Rupa'
            'Fortress Museum',  // 'Museum Benteng'
            'Salihara Gallery', // 'Galeri Salihara'
            'Basoeki Museum',  // 'Museum Basoeki'
            'Others'            // 'Lainnya'
        ],
        datasets: [{
            label: 'Number of Paintings', // Terjemahan dari 'Jumlah Lukisan'
            data: [485, 392, 318, 267, 234, 198, 953],
            backgroundColor: [
                '#FF6B6B',
                '#4ECDC4',
                '#45B7D1',
                '#96CEB4',
                '#FFEAA7',
                '#DDA0DD',
                '#98D8C8'
            ],
            borderWidth: 0,
            borderRadius: 8
        }]
    };

    // Data for medium chart
    const mediumData = {
        labels: [
            'Paper', 
            'Ink',      
            'Textile',    
            'Metal',       
            'Oil Paint',          
            'Canvas',        
            'Clay',   
            'Others'        
        ],
        datasets: [{
            label: 'Number of Paintings', // Terjemahan dari 'Jumlah Lukisan'
            data: [892, 567, 423, 298, 256, 189, 134, 88],
            backgroundColor: [
                '#FF6B6B',
                '#4ECDC4',
                '#45B7D1',
                '#96CEB4',
                '#FFEAA7',
                '#DDA0DD',
                '#F8B500',
                '#98D8C8'
            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    };

    // Museum chart configuration (Bar Chart)
    const museumConfig = {
        type: 'bar',
        data: museumData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f0f0f0'
                    },
                    ticks: {
                        color: '#666'
                    },
                    title: { // Tambahkan title untuk sumbu Y
                        display: true,
                        text: 'Number of Paintings' // Terjemahan
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#666',
                        maxRotation: 45
                    },
                    title: { // Tambahkan title untuk sumbu X
                        display: true,
                        text: 'Museum' // Terjemahan
                    }
                }
            }
        }
    };

    // Medium chart configuration (Doughnut Chart)
    const mediumConfig = {
        type: 'doughnut',
        data: mediumData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        color: '#666'
                    }
                },
                tooltip: { // Tambahkan tooltip callback untuk label yang lebih jelas
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed;
                            }
                            return label;
                        }
                    }
                }
            },
            cutout: '60%'
        }
    };

    // Render charts
    const museumCtx = document.getElementById('museumChart').getContext('2d');
    const mediumCtx = document.getElementById('mediumChart').getContext('2d');

    new Chart(museumCtx, museumConfig);
    new Chart(mediumCtx, mediumConfig);

// }); // Jika file chart.js dibungkus DOMContentLoaded
