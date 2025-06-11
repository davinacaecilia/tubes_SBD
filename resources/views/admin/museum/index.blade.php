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


    <title>Museum Management - Google Arts & Culture Admin</title>
</head>
<body>

    @include('partial.sidebar')

    <section id="content">
        @include('partial.navbar')

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Museum Managements</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/museum') }}">Museum List</a></li> <!-- PERBAIKAN: Link breadcrumb -->
                    </ul>
                </div>

            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Museum List</h3>
                        <!-- INPUT TEXT UNTUK SEARCH (AWALNYA TERSEMBUNYI) -->
                        <input type="text" id="tableSearchInput" class="table-search-input" placeholder="Search museum...">
                        <!-- ICON SEARCH YANG BISA DIKLIK -->
                        <i class='bx bx-search' id="tableSearchIcon"></i>
                        
                        <!-- SELECT UNTUK SORT (AWALNYA TERSEMBUNYI) -->
                        <select id="tableFilterSelect" class="table-filter-select">
                            <option value="">Sort By</option>
                            <option value="az">Museum Name (A-Z)</option>
                            <option value="za">Museum Name (Z-A)</option>
                        </select>
                        <!-- ICON FILTER YANG BISA DIKLIK -->
                        <i class='bx bx-filter' id="tableFilterIcon"></i>
                    </div>
                    <!-- Tabel Statis Daftar Museum -->
                    <div class="table-container">
                        <table id="museumTable" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="padding: 10px; border: 1px solid #ccc;">Museum ID</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Museum Name</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Location</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Description</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Logo</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Dummy Data Statis --}}
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">M001</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">Louvre Museum</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Paris, France</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">The largest art museum in the world.</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <img src="https://placehold.co/50x50/cccccc/333333?text=Logo" alt="Louvre Logo" class="museum-logo">
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/museum/M001/edit') }}" class="btn-detail edit"> <!-- PERBAIKAN: Link edit -->
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/museum/M001') }}" method="POST" style="display:inline-block;"> <!-- PERBAIKAN: Link delete -->
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this museum?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">M002</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">Museum of Modern Art (MoMA)</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">New York, USA</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Leading museum of modern and contemporary art.</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <img src="https://placehold.co/50x50/cccccc/333333?text=Logo" alt="MoMA Logo" class="museum-logo">
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/museum/M002/edit') }}" class="btn-detail edit"> <!-- PERBAIKAN -->
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/museum/M002') }}" method="POST" style="display:inline-block;"> <!-- PERBAIKAN -->
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this museum?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">M003</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">Rijksmuseum</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Amsterdam, Netherlands</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Dutch national museum dedicated to arts and history.</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <img src="https://placehold.co/50x50/cccccc/333333?text=Logo" alt="Rijksmuseum Logo" class="museum-logo">
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/museum/M003/edit') }}" class="btn-detail edit"> <!-- PERBAIKAN -->
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/museum/M003') }}" method="POST" style="display:inline-block;"> <!-- PERBAIKAN -->
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this museum?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Tambahkan baris <tr> lainnya untuk data statis jika diperlukan --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </section>

    <div id="pagination" class="pagination-container"></div>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
