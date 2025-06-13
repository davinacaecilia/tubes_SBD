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
        
        /* Styling untuk tombol disabled agar terlihat lebih redup */
        .table-container .btn-action-group .btn-detail:disabled {
            opacity: 0.6; 
            cursor: not-allowed;
            filter: grayscale(50%);
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

        /* CSS KHUSUS UNTUK FITUR SEARCH/FILTER INPUT/SELECT YANG BISA DIKLIK */
        .table-data .order .head {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }
        .table-data .order .head h3 {
            margin-right: auto;
        }
        .table-search-input,
        .table-filter-select {
            width: 0;
            padding: 0;
            border: none;
            transition: width 0.3s ease, padding 0.3s ease, border 0.3s ease, box-shadow 0.3s ease;
            box-sizing: border-box;
            background: var(--surface-white);
            color: var(--text-primary);
            font-size: 14px;
            border-radius: 20px;
            outline: none;
            height: 40px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23666' width='18px' height='18px'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            padding-right: 30px;
        }

        .table-search-input.show,
        .table-filter-select.show {
            width: 200px;
            padding: 8px 12px;
            border: 1px solid var(--border-light);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.1);
        }
        .table-search-input.show:focus,
        .table-filter-select.show:focus {
            border-color: var(--accent-blue);
        }
        .table-data .order .head .bx-search,
        .table-data .order .head .bx-filter {
            margin-left: 10px;
            flex-shrink: 0;
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
                    <h1>Art Status</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a href="{{ url('admin/art') }}">Art Managements</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/art/status') }}">Art Status</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Artwork Status List</h3>
                        <!-- INPUT TEXT UNTUK SEARCH (AWALNYA TERSEMBUNYI) -->
                        <input type="text" id="tableSearchInput" class="table-search-input" placeholder="Search artwork...">
                        <!-- ICON SEARCH YANG BISA DIKLIK -->
                        <i class='bx bx-search' id="tableSearchIcon"></i>
                        
                        <!-- SELECT UNTUK FILTER STATUS (BARU) -->
                        <select id="tableFilterSelect" class="table-filter-select">
                            <option value="" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending Approval</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        <!-- ICON FILTER YANG BISA DIKLIK -->
                        <i class='bx bx-filter' id="tableFilterIcon"></i>
                    </div>
                    <!-- Static Artwork Status Table -->
                    <div class="table-container">
                        <table id="artworkStatusTable" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Title</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Artist</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Status</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Art Details</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Last Edit Date</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arts as $art)
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->id }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->title }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->creator }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        @if($art->status == 'pending')
                                            <span class="status-badge status-pending">Pending Approval</span>
                                        @elseif($art->status == 'approved')
                                            <span class="status-badge status-approved">Approved</span>
                                        @elseif($art->status == 'rejected')
                                            <span class="status-badge status-rejected">Rejected</span>
                                        @endif
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <a href="{{ route('admin.art.show', $art->id) }}" class="btn-detail edit">
                                            <i class='bx bx-info-circle'></i> View Details
                                        </a>
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->updated_at }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            @if($art->status == 'pending')
                                                <form action="{{ route('admin.art.approve', $art->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn-detail btn-approve" onclick="return confirm('Approve Artwork?')">
                                                        <i class='bx bx-check-circle'></i> Approve
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.art.reject', $art->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn-detail btn-reject" onclick="return confirm('Reject Artwork?')">
                                                        <i class='bx bx-x-circle'></i> Reject
                                                    </button>
                                                </form>

                                            @elseif($art->status == 'approved')
                                                <button type="button" class="btn-detail btn-approved" disabled>
                                                    <i class='bx bx-check-circle'></i> Approved
                                                </button>
                                            @elseif($art->status == 'rejected')
                                                <button type="button" class="btn-detail btn-rejected" disabled>
                                                    <i class='bx bx-x-circle'></i> Rejected
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>

    <div id="pagination" class="pagination-container"></div>

    <script>
        window.paginationData = {
            currentPage: {{ $arts->currentPage() }},
            lastPage: {{ $arts->lastPage() }},
            baseUrl: "{{ url()->current() }}",
            query: @json(request()->except('page'))
        };
    </script>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/filter_status.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
    <!-- Pastikan tidak ada script inline di sini -->
</body>
</html>
