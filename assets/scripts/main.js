$(document).ready(function() {
    console.log(isAdmin);

    // gets the json data sent from fetch poems and adds the pagination and populates the page with the data
    function fetchPoems(page = 1) {
        $.getJSON("php/fetch_poems.php?page=" + page, function(data) {
            var poemsHtml = "";
            $.each(data.poems, function(key, poem) {
                poemsHtml += "<div class='poem-card'>";
                if (poem.thumbnail) {
                    poemsHtml += "<div class='thumbnail'><img src='uploads/" + poem.thumbnail + "' alt='Thumbnail'></div>";
                }
                poemsHtml += "<div class='poem-content'>";
                poemsHtml += "<h2 class='poem-title'>" + poem.title + "</h2>";
                poemsHtml += "<p class='poem-author'><strong>By:</strong> " + poem.poet_name + "</p>";
                poemsHtml += "<p class='poem-text'>" + poem.poem.substring(0, 100) + "...</p>";
                poemsHtml += "<div class='button-group'>"
                poemsHtml += "<a href='poem.php?id=" + poem.id + "' class='btn more-button'>More</a>";
                if (isAdmin) {
                    poemsHtml += "<button class='btn edit-poem' data-id='" + poem.id + "' data-title='" + poem.title + "' data-poet='" + poem.poet_name + "' data-poem='" + poem.poem + "'>Edit</button>";
                    poemsHtml += "<button class='btn delete-poem' data-id='" + poem.id + "'>Delete</button>";
                }
                poemsHtml += "</div></div></div>";
            });
            $("#poems-container").html(poemsHtml);

            var paginationHtml = "";
            for (var i = 1; i <= data.total_pages; i++) {
                // gives the active class if we're in the current page
                if (i === data.current_page) {
                    paginationHtml += "<span class='page-number active'>" + i + "</span>";
                } else {
                    paginationHtml += "<span class='page-number' data-page='" + i + "'>" + i + "</span>";
                }
            }
            $("#pagination").html(paginationHtml);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching poems ", textStatus, errorThrown);
        });
    }
    fetchPoems();
    $(document).on('click', '.page-number', function() {
        var page = $(this).data('page');
        fetchPoems(page);
    });

    // if we're logged in it would show the delete button and does the delete function
    if (isAdmin) {
        $(document).on('click', '.delete-poem', function() {
            var poemId = $(this).data('id');
            $.ajax({
                url: 'php/delete_poem.php',
                type: 'POST',
                data: { poem_id: poemId },
                success: function(response) {
                    alert(response);
                    fetchPoems();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        var modal = document.getElementById("editModal");
        var span = document.getElementsByClassName("close")[0];

    // if we're logged in it would show the delete button and does the edit function
        $(document).on('click', '.edit-poem', function() {
            var poemId = $(this).data('id');
            var title = $(this).data('title');
            var poet = $(this).data('poet');
            var poem = $(this).data('poem');

            $('#editPoemId').val(poemId);
            $('#editTitle').val(title);
            $('#editPoet').val(poet);
            $('#editPoem').val(poem);

            modal.style.display = "block";
        });

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        $('#editForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: 'php/update_poem.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response);
                    modal.style.display = "none";
                    fetchPoems();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    }

    // gets the json data sent from search poems and adds the data
    window.searchPoems = function() {
        var searchInput = document.querySelector(".search-input").value;
        $.getJSON("php/search.php?q=" + searchInput, function(data) {
            var poemsHtml = "";
            $.each(data.results, function(key, poem) {
                poemsHtml += "<div class='poem-card'>";
                if (poem.thumbnail) {
                    poemsHtml += "<div class='thumbnail'><img src='uploads/" + poem.thumbnail + "' alt='Thumbnail'></div>";
                }
                poemsHtml += "<div class='poem-content'>";
                poemsHtml += "<h2 class='poem-title'>" + poem.title + "</h2>";
                poemsHtml += "<p class='poem-author'><strong>By:</strong> " + poem.poet_name + "</p>";
                poemsHtml += "<p class='poem-text'>" + poem.poem.substring(0, 100) + "...</p>";
                poemsHtml += "<a href='poem.php?id=" + poem.id + "' class='btn more-button'>More</a>";
                poemsHtml += "</div></div>";
            });
            $("#poems-container").html(poemsHtml);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error searching poems: ", textStatus, errorThrown);
        });
    }

});
