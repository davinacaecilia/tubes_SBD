<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pagination.css') }}" />

    <title>Edit Media - Google Arts & Culture Admin</title> <!-- Diubah -->
    <style>
        /* Styling tambahan untuk form (sama seperti create form) */
        .form-card {
            background: var(--primary-white);
            padding: 24px;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-light);
            max-width: 800px; /* Batasi lebar form agar tidak terlalu lebar di layar besar */
            margin: 24px auto; /* Pusatkan form */
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group input[type="file"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            font-family: var(--roboto);
            font-size: 14px;
            background: var(--surface-white);
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        .form-actions .btn-submit,
        .form-actions .btn-cancel {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .form-actions .btn-submit {
            background-color: var(--accent-blue);
            color: var(--primary-white);
        }

        .form-actions .btn-submit:hover {
            background-color: var(--accent-blue-hover);
        }

        .form-actions .btn-cancel {
            background-color: var(--text-tertiary);
            color: var(--primary-white);
        }

        .form-actions .btn-cancel:hover {
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
                    <h1>Edit Media</h1> <!-- Diubah -->
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ url('admin/media') }}">Medium Management</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/media/1/edit') }}">Edit Media</a></li> <!-- Contoh URL edit -->
                    </ul>
                </div>
            </div>

            <div class="form-card">
                {{-- Form action akan mengarah ke MediaController@update dengan metode PUT --}}
                <form action="{{ url('admin/media/1') }}" method="POST" enctype="multipart/form-data"> {{-- Contoh ID media 1 --}}
                    @csrf
                    @method('PUT') {{-- PENTING: Untuk metode PUT/PATCH di Laravel --}}

                    <div class="form-group">
                        <label for="name">Media Name</label> 
                        <input type="text" id="name" name="name" placeholder="Enter media name" value="Oil Painting" required> 
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label> <!-- Diubah -->
                        <textarea id="desc" name="desc" placeholder="Brief description of the media" rows="5">Artwork created using oil paints, known for its rich colors and textures.</textarea> <!-- Contoh data lama -->
                    </div>

                    <div class="form-group">
                        <label for="img_url">Image URL</label> <!-- Diubah -->
                        <input type="text" id="img_url" name="img_url" placeholder="Paste image URL here" value="https://placehold.co/80x60/cccccc/333333?text=Oil" required> <!-- Contoh data lama -->
                        <small style="color: var(--text-secondary); font-size: 12px;">Enter the direct URL of the media image. Leave blank to keep current image.</small> <!-- Pesan diubah -->
                        {{-- Opsional: Tampilkan gambar yang sudah ada --}}
                        <div style="margin-top: 10px;">
                            <img src="https://placehold.co/150x100/cccccc/333333?text=Current+Image" alt="Current Media Image" style="max-width: 150px; border-radius: 8px;">
                            <small style="color: var(--text-tertiary); font-size: 12px; display: block;">Current Image</small>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" onclick="window.location.href='{{ url('admin/media') }}'">
                            <i class='bx bx-x'></i> Cancel
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class='bx bx-save'></i> Update Media <!-- Diubah -->
                        </button>
                    </div>
                </form>
            </div>

        </main>
        <!-- MAIN -->
    </section>

    

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
