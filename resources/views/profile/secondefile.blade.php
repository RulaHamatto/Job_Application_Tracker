<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Codezilla Blog Post</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <!-- Website Name -->
            <a class="navbar-brand" href="#">
                Codezilla Blog Post
            </a>

            <!-- All Posts -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            All Posts
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <!-- Main Content -->
    <div class="container mt-4">

        <!-- Create Post Button -->
        <div class="text-center mb-4">
            <a href="#" class="btn btn-success">
                Create Post
            </a>
        </div>


        <!-- Posts Table -->
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <!-- Post 1 -->
                <tr>
                    <td>1</td>

                    <td>Mark</td>

                    <td>Otto</td>

                    <td>@mdo</td>

                    <td>
                        <a href="#" class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="#" class="btn btn-primary btn-sm">
                            Edit
                        </a>

                        <a href="#" class="btn btn-danger btn-sm">
                            Delete
                        </a>
                    </td>
                </tr>


                <!-- Post 2 -->
                <tr>
                    <td>2</td>

                    <td>Mark</td>

                    <td>Otto</td>

                    <td>@mdo</td>

                    <td>
                        <a href="#" class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="#" class="btn btn-primary btn-sm">
                            Edit
                        </a>

                        <a href="#" class="btn btn-danger btn-sm">
                            Delete
                        </a>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>