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

    <title>Artwork Status - Google Arts & Culture Admin</title>
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

        /* Styling for Approve and Reject buttons */
        .table-container .btn-action-group .btn-approve {
            background-color: var(--accent-green);
            color: var(--primary-white);
            border: 1px solid var(--accent-green);
        }
        .table-container .btn-action-group .btn-approve:hover {
            background-color: #288a42;
            border-color: #288a42;
        }

        .table-container .btn-action-group .btn-reject {
            background-color: var(--accent-red);
            color: var(--primary-white);
            border: 1px solid var(--accent-red);
        }
        .table-container .btn-action-group .btn-reject:hover {
            background-color: #c52c20;
            border-color: #c52c20;
        }

        /* Styling for status badges */
        .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }
        .status-pending {
            background-color: rgba(251, 188, 4, 0.1);
            color: #F8B500;
        }
        .status-approved {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--accent-green);
        }
        .status-rejected {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--accent-red);
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
        <!-- NAVBAR -->
        @include('partial.navbar')
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Artwork Status</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ url('admin/art') }}">Artwork Management</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/art/status') }}">Artwork Status</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Artwork Status List</h3>
                        <!-- INPUT TEXT UNTUK SEARCH (AWALNYA TERSEMBUNYI) -->
                        <input type="text" id="tableSearchInput" class="table-search-input" placeholder="Search artwork status...">
                        <!-- ICON SEARCH YANG BISA DIKLIK -->
                        <i class='bx bx-search' id="tableSearchIcon"></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <!-- Static Artwork Status Table -->
                    <div class="table-container">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Title</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Artist</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Status</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Edited By Admin</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Last Edit Date</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Dummy Data Static --}}
                                {{-- Pending Approval Example --}}
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">105</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">The Persistence of Memory</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Salvador Dalí</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <span class="status-badge status-pending">Pending Approval</span>
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Admin John</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">2024-05-20</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <button type="button" class="btn-detail btn-approve" onclick="alert('Approve Artwork 105')">
                                                <i class='bx bx-check-circle'></i> Approve
                                            </button>
                                            <button type="button" class="btn-detail btn-reject" onclick="alert('Reject Artwork 105')">
                                                <i class='bx bx-x-circle'></i> Reject
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Another Pending Approval Example --}}
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">106</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Guernica</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Pablo Picasso</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <span class="status-badge status-pending">Pending Approval</span>
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Admin Jane</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">2024-05-22</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <button type="button" class="btn-detail btn-approve" onclick="alert('Approve Artwork 106')">
                                                <i class='bx bx-check-circle'></i> Approve
                                            </button>
                                            <button type="button" class="btn-detail btn-reject" onclick="alert('Reject Artwork 106')">
                                                <i class='bx bx-x-circle'></i> Reject
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Approved Example --}}
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">101</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Starry Night</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Vincent van Gogh</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <span class="status-badge status-approved">Approved</span>
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Admin John</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">2024-05-15</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <!-- Supervisor dapat melihat status, tapi tombol Approve/Reject bisa dinonaktifkan/disembunyikan untuk status non-pending -->
                                            <button type="button" class="btn-detail btn-approved" disabled>
                                                <i class='bx bx-check-circle'></i> Approved
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Rejected Example --}}
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">104</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">The Scream</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Edvard Munch</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <span class="status-badge status-rejected">Rejected</span>
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Admin Peter</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">2024-05-18</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <button type="button" class="btn-detail btn-rejected" disabled>
                                                <i class='bx bx-x-circle'></i> Rejected
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>

    <!-- Pagination (if applicable) -->
    <div id="pagination" class="pagination-container"></div>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
