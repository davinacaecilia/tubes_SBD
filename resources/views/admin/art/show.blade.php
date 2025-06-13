<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

    <title>Artwork Details - Google Arts & Culture Admin</title>
    <style>
        /* Styling tambahan untuk tampilan detail */
        .detail-card {
            background: var(--primary-white);
            padding: 24px;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-light);
            max-width: 900px;
            margin: 24px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }
        .detail-image {
            flex: 1 1 300px; /* Fleksibel, tapi minimum 300px */
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
        .detail-info {
            flex: 2 1 400px; /* Fleksibel, mengambil lebih banyak ruang */
        }
        .detail-info h2 {
            font-family: var(--google-sans);
            font-size: 28px;
            color: var(--text-primary);
            margin-bottom: 10px;
        }
        .detail-info p {
            font-size: 16px;
            color: var(--text-secondary);
            margin-bottom: 8px;
            line-height: 1.5;
        }
        .detail-info p strong {
            color: var(--text-primary);
            font-weight: 600;
        }
        .detail-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            width: 100%; /* Memastikan tombol di baris baru jika flex-wrap */
        }
        .btn-back {
            padding: 10px 20px;
            background-color: var(--text-tertiary);
            color: var(--primary-white);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-back:hover {
            background-color: #7a8086;
        }
    </style>
</head>
<body>

    @include('partial.sidebar')

    <section id="content">
        @include('partial.navbar')

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Art Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ route('admin.art.index') }}">Art Managements</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ route('admin.art.status') }}">Art Status</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ route('admin.art.show', $art->id) }}">Art Details</a></li>
                    </ul>
                </div>
            </div>

            <div class="detail-card">
                <img src="{{ $art->img_url }}" alt="{{ $art->title }}" class="detail-image">
                
                <div class="detail-info">
                    <h2>{{ $art->title }}</h2>
                    <p><strong>ID:</strong> {{ $art->id }}</p>
                    <p><strong>Artist:</strong> {{ $art->creator }}</p>
                    <p><strong>Museum:</strong> {{ $art->museum->name }}</p>
                    <p><strong>Date Created:</strong> {{ $art->created }}</p>
                    <p><strong>Medium:</strong> {{ $art->medium->name }}</p>
                    <p><strong>Description:</strong> {{ $art->desc }}</p>
                </div>

                <div class="detail-actions">
                    <a href="{{ url('admin/art/status') }}" class="btn-back">
                        <i class='bx bx-arrow-back'></i> Back to Status List
                    </a>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
