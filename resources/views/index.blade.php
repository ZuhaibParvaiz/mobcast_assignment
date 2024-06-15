<form id="fetchNewsForm">
    @csrf
    <button type="button" id="fetchNewsButton">Fetch News Articles</button>
</form>
<ul id="newsList">
    <!-- News articles will be displayed here -->
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fetchNewsButton').click(function() {
            $.ajax({
                url: '{{ route("fetch.news") }}',
                type: 'GET',
                beforeSend: function() {
                    // Show loading spinner or disable button
                },
                success: function(response) {
                    // Update UI with fetched news articles
                    $('#newsList').empty();
                    response.newsArticles.forEach(function(article) {
                        $('#newsList').append('<li><strong>' + article.title + '</strong><br>' + article.published_at + '<br><a href="' + article.link + '" target="_blank">' + article.link + '</a><br><p>' + article.description + '</p></li>');
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error
                },
                complete: function() {
                    // Hide loading spinner or enable button
                }
            });
        });
    });
</script>