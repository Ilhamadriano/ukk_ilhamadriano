  // Function to toggle like and update the like count
  let likeStatus = [false, false, false]; // Track whether each image has been liked

  function toggleLike(imageId) {
    // Toggle the like status for the given image
    likeStatus[imageId - 1] = !likeStatus[imageId - 1];
    
    // Get the like count element and update it based on the like status
    const likeCountElement = document.getElementById(`likeCount${imageId}`);
    let currentLikeCount = parseInt(likeCountElement.textContent);
    
    // If liked, increment the count, otherwise decrement
    if (likeStatus[imageId - 1]) {
      likeCountElement.textContent = currentLikeCount + 1;
    } else {
      likeCountElement.textContent = currentLikeCount - 1;
    }
  }

  // Function to add a comment for the specified image
  function addComment(imageId) {
    const commentInput = document.getElementById(`commentInput${imageId}`);
    const commentText = commentInput.value.trim();

    if (commentText) {
      // Create a new comment element
      const newComment = document.createElement('div');
      newComment.classList.add('comment');
      newComment.textContent = commentText;
      
      // Append the new comment to the comments list for this image
      const commentsList = document.getElementById(`commentsList${imageId}`);
      commentsList.appendChild(newComment);
      
      // Clear the input field after posting the comment
      commentInput.value = '';
    }
  }

