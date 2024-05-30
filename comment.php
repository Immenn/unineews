<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        form {
            margin-bottom: 20px;
            margin-top: -295px;
        }

        textarea {
            width: 992px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            height: 100px;
            margin-left: 25.5%;
            margin-top: 80px;
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 0.7em;
            color: #ccc;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover ~ label,
        .rating input:checked ~ label {
            color: #ffdb58; 
        }

        button {
            background-color: #213a5c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 1234px;
        }

        button:hover {
            background-color: #90a4b0;
        }

        .comments {
            margin-top: 20px;
            display: flex;
            flex-direction: column-reverse;
            width: 992px;
            margin-left: 25.5%;
        }

        .comment {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .comment p {
            margin: 0;
            font-size: 0.8em;
        }

        .colored-stars i {
            color: #ffdb58; 
        }
        .stars {
            display: flex;
            align-items: center;
            margin: 10px 0;
            margin-top: 199px;
            margin-left: 78%;
            
        }

        .stars input {
            display: none;
            margin-left: 100%;
        }

        .stars label {
            font-size: 1.2rem;
            color: #ccc;
            cursor: pointer;
        }

        .stars input:checked ~ label,
        .stars input:hover ~ label,
        .stars label:hover ~ label {
            color: #f5b301;
        }

        .like-dislike-container {
            display: flex;
            align-items: center;
            font-size: 0.8em;
            color: #888;
            margin-top: 1px;
        }

        .like-btn, .dislike-btn {
            background: none;
            border: none;
            color: blueviolet;
            cursor: pointer;
            font-size: 1em;
            margin-right: 0px;
        }

        .like-btn:hover, .dislike-btn:hover {
            color: #f5b301;
        }
    </style>
</head>
<body>
    <!-- Add comment form -->
    <form action="add_comment.php" method="POST">
        <div class="stars">
            <input type="radio" name="raiting" id="star1" value="5" required><label for="star1"><i class="fas fa-star"></i></label>
            <input type="radio" name="raiting" id="star2" value="4" required><label for="star2"><i class="fas fa-star"></i></label>
            <input type="radio" name="raiting" id="star3" value="3" required><label for="star3"><i class="fas fa-star"></i></label>
            <input type="radio" name="raiting" id="star4" value="2" required><label for="star4"><i class="fas fa-star"></i></label>
            <input type="radio" name="raiting" id="star5" value="1" required><label for="star5"><i class="fas fa-star"></i></label>
        </div>
        <textarea name="comment" placeholder="Comment"></textarea>
        <input type="hidden" name="news_id" value="<?php echo htmlspecialchars($news_id); ?>">
        <button type="submit">Add Comment</button>
    </form>

    <!-- Display comments -->
    <div class="comments">
        <?php
        // Fetch comments along with usernames from the database
        $query_comments = "SELECT comment.comment, user.username, comment.id, comment.likec, comment.dislike, comment.raiting FROM comment INNER JOIN user ON comment.iduser = user.id WHERE comment.idnews = ?";
        $stmt_comments = $con->prepare($query_comments);
        $stmt_comments->bind_param("i", $news_id);
        $stmt_comments->execute();
        $result_comments = $stmt_comments->get_result();

        if ($result_comments->num_rows > 0) {
            while ($comment = $result_comments->fetch_assoc()) {
                $escaped_comment = htmlspecialchars($comment['comment']);
                $username = htmlspecialchars($comment['username']);
                $rating = $comment['raiting'];
                echo "<div class='comment'>";
                echo "<p><strong>$username</strong> : ";
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $rating) {
                        echo "<i class='fas fa-star' style='color: #f5b301;'></i>";
                    } else {
                        echo "<i class='fas fa-star' style='color: #ccc;'></i>";
                    }
                }
                echo "<br>$escaped_comment</p>";
                echo "<div class='like-dislike-container'>";
                echo "<button class='like-btn' data-comment-id='{$comment['id']}'><i class='fas fa-thumbs-up'></i></button>";
                echo "<span id='like-count-{$comment['id']}'>{$comment['likec']}</span> ";
                echo "<button class='dislike-btn' data-comment-id='{$comment['id']}'><i class='fas fa-thumbs-down'></i></button>";
                echo "<span id='dislike-count-{$comment['id']}'>{$comment['dislike']}</span>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No comments available.";
        }

        $stmt_comments->close();
        $con->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".like-btn").click(function(e){
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                $.ajax({
                    url: 'like_comment.php',
                    type: 'GET',
                    data: { comment_id: commentId },
                    success: function(response){
                        $("#like-count-" + commentId).text(response);
                    }
                });
            });

            $(".dislike-btn").click(function(e){
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                $.ajax({
                    url: 'dislike_comment.php',
                    type: 'GET',
                    data: { comment_id: commentId },
                    success: function(response){
                        $("#dislike-count-" + commentId).text(response);
                    }
                });
            });
        });
    </script>
</body>
</html>