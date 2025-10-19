document.addEventListener('DOMContentLoaded', function() {
    
    // --- Profile Page ---
    const editProfileButton = document.getElementById('edit-profile-button');
    const saveProfileButton = document.getElementById('save-profile-button');
    const cancelEditButton = document.getElementById('cancel-edit-button');
    const viewMode = document.getElementById('profile-view-mode');
    const editModeForm = document.getElementById('profile-edit-form');
    const profilePicContainer = document.getElementById('profile-picture-container');
    const profilePicInput = document.getElementById('profile-picture-input');

    if (editProfileButton) {
        editProfileButton.addEventListener('click', () => {
            viewMode.classList.add('d-none');
            editModeForm.classList.remove('d-none');
            toggleEditButtons(true);
        });
    }

    if (cancelEditButton) {
        cancelEditButton.addEventListener('click', () => {
            viewMode.classList.remove('d-none');
            editModeForm.classList.add('d-none');
            toggleEditButtons(false);
        });
    }

    // Trigger file input when the picture container is clicked
    if (profilePicContainer) {
        profilePicContainer.addEventListener('click', () => {
            profilePicInput.click();
        });
    }

    // Handle the file upload when a new file is selected
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const formData = new FormData();
                formData.append('profile_picture', this.files[0]);

                // Show a loading indicator if you have one
                // e.g., document.getElementById('loader').style.display = 'block';

                fetch('db/upload_picture.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the profile picture on the page instantly
                        const newImagePath = data.filePath + '?t=' + new Date().getTime(); // Cache buster
                        document.getElementById('profile-picture-img').src = newImagePath;
                        
                        // Also update the header image if it exists
                        const headerImg = document.querySelector('header .dropdown-toggle img');
                        if(headerImg) {
                            headerImg.src = newImagePath;
                        }
                    } else {
                        alert('Error uploading image: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Upload failed:', error);
                    alert('An unexpected error occurred during upload.');
                })
                .finally(() => {
                    // Hide loading indicator
                    // e.g., document.getElementById('loader').style.display = 'none';
                });
            }
        });
    }

    function toggleEditButtons(isEditing) {
        if(editProfileButton) editProfileButton.classList.toggle('d-none', isEditing);
        if(saveProfileButton) saveProfileButton.classList.toggle('d-none', !isEditing);
        if(cancelEditButton) cancelEditButton.classList.toggle('d-none', !isEditing);
    }


    // --- Symptoms Page ---
    const symptomsForm = document.getElementById('symptoms-form');
    if (symptomsForm) {
        symptomsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('button[type="submit"]');
            const resultsSection = document.getElementById('results-section');
            
            button.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Analyzing...';
            button.disabled = true;

            setTimeout(() => {
                resultsSection.classList.remove('d-none');
                button.innerHTML = '<i class="bi bi-search me-2"></i>Analyze Symptoms';
                button.disabled = false;
                window.scrollTo({ top: resultsSection.offsetTop, behavior: 'smooth' });
            }, 2000);
        });
    }
});

