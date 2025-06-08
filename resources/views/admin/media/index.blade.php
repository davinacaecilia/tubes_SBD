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

    <title>Media Management - Google Arts & Culture Admin</title>
    <style>
        /* Styling tambahan untuk tabel agar konsisten dengan tema */
        .table-container table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow-light);
        }

        .table-container thead tr {
            background-color: var(--surface-white);
            border-bottom: 1px solid var(--border-light);
        }

        .table-container th,
        .table-container td {
            padding: 15px;
            border: 1px solid var(--border-light);
            text-align: left;
            font-size: 14px;
            color: var(--text-primary);
        }

        .table-container th {
            font-weight: 600;
            color: var(--text-secondary);
            font-family: var(--google-sans);
            background-color: var(--surface-white);
        }

        .table-container tbody tr:nth-child(even) {
            background-color: var(--surface-white);
        }

        .table-container tbody tr:hover {
            background-color: rgba(26, 115, 232, 0.04);
        }

        .table-container .btn-action-group {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .table-container .btn-action-group .btn-detail {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .table-container .btn-action-group .btn-detail.edit {
            background-color: var(--accent-blue);
            color: var(--primary-white);
            border: 1px solid var(--accent-blue);
        }
        .table-container .btn-action-group .btn-detail.edit:hover {
            background-color: var(--accent-blue-hover);
            border-color: var(--accent-blue-hover);
        }

        .table-container .btn-action-group .btn-detail.delete {
            background-color: var(--accent-red);
            color: var(--primary-white);
            border: 1px solid var(--accent-red);
        }
        .table-container .btn-action-group .btn-detail.delete:hover {
            background-color: #c52c20;
            border-color: #c52c20;
        }

        .table-container .media-preview-img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            vertical-align: middle;
            margin-right: 8px;
        }
        .table-container .media-url {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
        }
        /* CSS KHUSUS UNTUK FITUR SEARCH ICON CLICKABLE */
        .table-data .order .head {
            position: relative;
        }
        .table-search-input {
            width: 0;
            padding: 0;
            border: none;
            transition: width 0.3s ease, padding 0.3s ease, border 0.3s ease;
            box-sizing: border-box;
            background: var(--surface-white);
            color: var(--text-primary);
            font-size: 14px;
            border-radius: 20px;
            margin-left: auto;
            outline: none;
            height: 40px;
        }

        .table-search-input.show {
            width: 200px;
            padding: 8px 12px;
            border: 1px solid var(--border-light);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.1);
        }
        .table-search-input.show:focus {
            border-color: var(--accent-blue);
        }
        .table-data .order .head .bx-search {
            margin-left: 10px;
        }
    </style>
</head>
<body>

    @include('partial.sidebar')

    <section id="content">
        @include('partial.navbar')
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Media Management</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/media') }}">Media List</a></li>
                    </ul>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Media List</h3>
                        <!-- INPUT TEXT UNTUK SEARCH (AWALNYA TERSEMBUNYI) -->
                        <input type="text" id="tableSearchInput" class="table-search-input" placeholder="Search media...">
                        <!-- ICON SEARCH YANG BISA DIKLIK -->
                        <i class='bx bx-search' id="tableSearchIcon"></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <!-- Tabel Statis Daftar Media -->
                    <div class="table-container">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="padding: 10px; border: 1px solid #ccc;">ID Media</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Description</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Image</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mediums as $medium)
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $medium->id }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $medium->name }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $medium->desc }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                    <img src="{{ $medium->img_url }}" alt="{{ $medium->name }}" class="media-preview-img">
                                        <span class="media-url" title="{{ $medium->name }}">{{ $medium->img_url }}</span>
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/media/edit', $medium->id) }}" class="btn-detail edit">
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/media/1', $medium->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this media?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- Tambahkan baris <tr> lainnya untuk data statis jika diperlukan --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>


    <div id="pagination" class="pagination-container"></div>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
</body>
</html>
