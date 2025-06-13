<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

    <title>Edit Artwork - Google Arts & Culture Admin</title> <!-- Diubah -->
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
                    <h1>Edit Art</h1> <!-- Diubah -->
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ url('admin/art') }}">Art Managements</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/art/1/edit') }}">Edit Art</a></li> 
                    </ul>
                </div>
            </div>

            <div class="form-card">
                <form action="{{ route('admin.art.update', $art->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 

                    <div class="form-group">
                        <label for="title">Art's Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter artwork title" value="{{ $art->title }}" required> 
                    </div>

                    <div class="form-group">
                        <label for="creator">Artist</label>
                        <input type="text" id="creator" name="creator" placeholder="Artist's name" value="{{ $art->creator }}" required> 
                    </div>

                    <div class="form-group">
                        <label for="museum">Museum</label>
                        <select id="museum" name="museum_id" required>
                            <option value="">Select a museum</option>
                            @foreach($museums as $museum)
                                <option value="{{ $museum->id }}" {{ $art->museum_id == $museum->id ? 'selected' : '' }}>
                                    {{ $museum->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="medium">Medium</label>
                        <select id="medium" name="medium_id" required>
                            <option value="">Select a medium</option>
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->id }}" {{ $art->medium_id == $medium->id ? 'selected' : '' }}>
                                    {{ $medium->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="created">Year Created</label>
                        <input type="text" id="created" name="created" placeholder="Example: 1889" value="{{ $art->created }}" >
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea id="desc" name="desc" placeholder="Brief description of the artwork" rows="5">{{ $art->desc }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="img_url">Artwork Image</label>
                        <input type="text" id="img_url" name="img_url" placeholder="Paste image URL here" value="{{ $art->img_url }}" required> 
                        <small style="color: var(--text-secondary); font-size: 12px;">Enter the direct URL of the media image.</small> 
                        <div style="margin-top: 10px;">
                            <img src="{{ $art->img_url }}" alt="Current Artwork Image" style="max-width: 150px; border-radius: 8px;">
                            <small style="color: var(--text-tertiary); font-size: 12px; display: block;">Current Image</small>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" onclick="window.location.href='{{ url('admin/art') }}'">
                            <i class='bx bx-x'></i> Cancel
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class='bx bx-save'></i> Update Art <!-- Diubah -->
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
