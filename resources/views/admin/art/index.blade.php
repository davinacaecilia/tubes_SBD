<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pagination.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/search.css') }}" />

    <title>Art Managements - Google Arts & Culture Admin</title>
    
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
                    <h1>Art Managements</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><a class="active" href="{{ url('admin/art') }}">Arts List</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Arts List</h3>
                        <input type="text" id="tableSearchInput" class="table-search-input" placeholder="Search artwork...">
                        <i class='bx bx-search' id="tableSearchIcon"></i>
                        
                        <select id="tableFilterSelect" class="table-filter-select"> 
                            <option value="">Sort By</option>
                            <option value="az">Title (A-Z)</option>
                            <option value="za">Title (Z-A)</option>
                        </select>
                        <i class='bx bx-filter' id="tableFilterIcon"></i>
                    </div>
                    <!-- Tabel Statis Daftar Karya Seni -->
                    <div class="table-container">
                        <table id="artworkTable" style="width: 100%; border-collapse: collapse;"> <!-- Tambahkan ID untuk JavaScript -->
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="padding: 10px; border: 1px solid #ccc;">ID Art</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Title</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Artist</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Museum</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Medium</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Date Created</th>
                                    <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Dummy Data Statis --}}
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">101</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">Starry Night</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Vincent van Gogh</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">MoMA</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Oil Painting</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">1889-06-01</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/art/101/edit') }}" class="btn-detail edit">
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/art/101') }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this artwork?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">102</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">Mona Lisa</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Leonardo da Vinci</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Louvre Museum</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Oil Painting</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">1503-01-01</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/art/102/edit') }}" class="btn-detail edit">
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/art/102') }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this artwork?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">103</td>
                                    <td class="sort-target" style="padding: 10px; border: 1px solid #ccc;">Girl with a Pearl Earring</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Johannes Vermeer</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Mauritshuis</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">Oil Painting</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">1665-01-01</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ url('admin/art/103/edit') }}" class="btn-detail edit">
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ url('admin/art/103') }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this artwork?')">
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
        <!-- MAIN -->
    </section>

    <!-- Pagination di paling bawah -->
    <div id="pagination" class="pagination-container"></div>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
    <script src="{{ asset('admin/script/chart.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
