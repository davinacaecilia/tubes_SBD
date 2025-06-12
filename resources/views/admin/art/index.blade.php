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
                        <form method="GET" action="{{ route('admin.art.index') }}" id="searchForm">
                            <input type="text" id="tableSearchInput" name="search" value="{{ request('search') }}" class="table-search-input" placeholder="Search artwork...">
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
                        <table id="artworkTable" style="width: 100%; border-collapse: collapse;"> 
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
                                @foreach($arts as $art)
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->id }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->title }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->creator }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->museum->name }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->medium->name }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $art->created }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <div class="btn-action-group">
                                            <a href="{{ route('admin.art.edit', $art->id) }}" class="btn-detail edit">
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <form action="{{ route('admin.art.destroy', $art->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-detail delete" onclick="return confirm('Are you sure you want to delete this artwork?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </form>
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
    </section>

    <div id="pagination" class="pagination-container"></div>

    <script src="{{ asset('admin/script/script.js') }}"></script>
    <script src="{{ asset('admin/script/sort.js') }}"></script>
    <script src="{{ asset('admin/script/search.js') }}"></script>
    <script src="{{ asset('admin/script/pagination.js') }}"></script>
    <script src="{{ asset('admin/script/chart.js') }}"></script>
    <script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>
