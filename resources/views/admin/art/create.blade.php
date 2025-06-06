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

    <title>Add New Art - Google Arts & Culture Admin</title>
    <style>
        .form-card {
            background: var(--primary-white);
            padding: 24px;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-light);
            max-width: 800px; 
            margin: 24px auto; 
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
                    <h1>Add New Art</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ url('admin/art') }}">Art Management</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/art/create') }}">Add Art</a></li>
                    </ul>
                </div>
            </div>

            <div class="form-card">
                <form action="{{ url('admin/art') }}" method="POST" enctype="multipart/form-data">
                    @csrf {{-- Token CSRF untuk keamanan Laravel --}}

                    <div class="form-group">
                        <label for="judul">Artwork Title</label>
                        <input type="text" id="judul" name="judul" placeholder="Enter artwork title" required>
                    </div>

                    <div class="form-group">
                        <label for="seniman">Artist</label>
                        <input type="text" id="seniman" name="seniman" placeholder="Artist's name" required>
                    </div>

                    
                    <div class="form-group">
                        <label for="museum">Museum</label>
                        <select id="museum" name="museum" required> 
                            <option value="">Select a museum</option> 
                            <option value="MoMA The Museum Of Modern Art">MoMA The Museum Of Modern Art</option>
                            <option value="Van Gogh Museum">Van Gogh Museum</option>
                            <option value="Uffizi Gallery">Uffizi Gallery</option>
                            <option value="The Art Institute Of Chicago">The Art Institute Of Chicago</option>
                            <option value="National Gallery of Art, Washington DC">National Gallery of Art, Washington DC</option>
                            <option value="Mauritshuis">Mauritshuis</option>
                            <option value="NASA">NASA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="media">Medium</label>
                        <select id="media" name="media" required>
                            <option value="">Select a medium</option> 
                            <option value="Paper">Paper</option>
                            <option value="Ink">Ink</option>
                            <option value="Textile">Textile</option>
                            <option value="Metal">Metal</option>
                            <option value="Oil Paint">Oil Paint</option>
                            <option value="Canvas">Canvas</option>
                            <option value="Clay">Clay</option>
                            <option value="Graphite">Graphite</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Pen">Pen</option>
                            <option value="Etching">Etching</option>
                            <option value="Engraving">Engraving</option>
                            <option value="Gold">Gold</option>
                            <option value="Cotton">Cotton</option>
                            <option value="Ceramic">Ceramic</option>
                            <option value="Wood">Wood</option>
                            <option value="Pencil">Pencil</option>
                            <option value="Glass">Glass</option>
                            <option value="Silver">Silver</option>
                            <option value="Stoneware">Stoneware</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tahun_dibuat">Year Created</label>
                        <input type="number" id="tahun_dibuat" name="tahun_dibuat" placeholder="Example: 1889" min="0" max="{{ date('Y') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Description</label>
                        <textarea id="deskripsi" name="deskripsi" placeholder="Brief description of the artwork" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="img_url">Image URL</label> 
                        <input type="text" id="img_url" name="img_url" placeholder="Paste image URL here" required> 
                        <small style="color: var(--text-secondary); font-size: 12px;">Enter the direct URL of the media image.</small> 
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" onclick="window.location.href='{{ url('admin/art') }}'">
                            <i class='bx bx-x'></i> Cancel
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class='bx bx-save'></i> Save Artwork
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
