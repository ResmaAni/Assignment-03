<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        
.search {
    flex-grow: 1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.search input[type="text"] {
    padding: 6px;
    margin-right: 10px;
    border: none;
    font-size: 17px;
    border-radius: 4px;
}

.search button {
    /* padding: 6px 10px; */
    background: white;
    color: green;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.search button i {
    font-size: 18px;
}

.search button:hover {
    background: darkgreen;
    color: white;
}
#description{
    max-width: 400px;
}


        footer {
            margin-top: 30px;
            padding: 20px;
            text-align: center;
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}"><B>CRUD by SHAHIN ALAM</B></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="search">
                <form action="#">
                    <input type="text" placeholder="Search Products"
                           name="search">
                    <button>
                        <i class="fa fa-search">Search</i>
                    </button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">Add Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} SHAHIN ALAM. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
