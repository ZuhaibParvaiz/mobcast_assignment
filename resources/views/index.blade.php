<!DOCTYPE html>
<html>

<head>
    <title>Times of India RSS Feed</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-3">Times of India RSS Feed</h2>
        <table id="rss-feed-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated here dynamically -->
            </tbody>
        </table>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            fetchRssFeedData();
        });

        function fetchRssFeedData() {
            $.ajax({
                url: '/fetch-data',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    displayRssFeed(response.items);
                },
                error: function(error) {
                    console.error('Error fetching data', error);
                }
            });
        }

        function displayRssFeed(items) {
            var tbody = $('#rss-feed-table tbody');
            tbody.empty(); // Clear existing rows

            items.forEach(function(item) {
                var row = $('<tr>');
                row.append($('<td>').text(item.title));
                row.append($('<td>').text(item.description));
                row.append($('<td>').html('<a href="' + item.link + '" target="_blank">' + item.link + '</a>'));
                tbody.append(row);
            });
        }
    </script>
</body>

</html>
