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
    <link rel="stylesheet" href="{{ asset('admin/css/search.css') }}" />

    <title>User Management - Google Arts & Culture Admin</title>
    <style>
        /* Styling tambahan untuk tabel agar konsisten dengan tema */
        .table-data .order .head {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .table-data .order .head h3 {
            margin-right: auto;
            font-size: 20px;
            font-weight: 500;
            font-family: var(--google-sans);
            color: var(--text-primary);
        }

        .table-data .order .head .bx {
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }

        .table-data .order .head .bx:hover {
            background: var(--surface-white);
            color: var(--text-primary);
        }
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

        .table-container td.hash-password {
            font-family: monospace;
            font-size: 0.85rem;
            word-break: break-all;
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
                    <h1>User List</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ route('admin.user.index') }}">User List</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>User List</h3>
                        <form method="GET" action="{{ route('admin.user.index') }}" id="searchForm">
                            <input type="text" id="tableSearchInput" name="search" value="{{ request('search') }}" class="table-search-input" placeholder="Search user...">
                        </form>
                        <i class='bx bx-search' id="tableSearchIcon"></i>
                        
                        <select id="tableFilterSelect" class="table-filter-select">
                             <option value="">Sort By</option>
                            <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Name (A-Z)</option>
                            <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Name (Z-A)</option>
                        </select>
                        <i class='bx bx-filter' id="tableFilterIcon"></i>
                    </div>
                    
                    <div class="table-container">
                        <table id="userTable" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="padding: 10px; border: 1px solid #ccc;">ID User</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Email</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Hash Password</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">User Level</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Registered At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $user->id }}</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">{{ $user->name }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $user->email }}</td>
                                    <td class="hash-password" style="padding: 10px; border: 1px solid #ccc;">{{ $user->password }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $user->role }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $user->created_at }}</td>
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

    <!-- Pagination di paling bawah -->
    <div id="pagination" class="pagination-container"></div>

    <script>
        window.paginationData = {
            currentPage: {{ $users->currentPage() }},
            lastPage: {{ $users->lastPage() }},
            baseUrl: "{{ url()->current() }}",
            query: @json(request()->except('page'))
        };
    </script>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/sort.js') }}"></script>
    <script src="{{ asset('admin/script/search.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
