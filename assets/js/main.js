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

    if (profilePicContainer) {
        profilePicContainer.addEventListener('click', () => {
            profilePicInput.click();
        });
    }

    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const formData = new FormData();
                formData.append('profile_picture', this.files[0]);

                fetch('db/upload_picture.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const newImagePath = data.filePath + '?t=' + new Date().getTime();
                        document.getElementById('profile-picture-img').src = newImagePath;
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

    // --- Settings Page: Theme Toggle ---
    const themeSwitch = document.getElementById('theme-switch');
    if (themeSwitch) {
        themeSwitch.addEventListener('change', function() {
            fetch('db/toggle_theme.php', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    document.body.setAttribute('data-bs-theme', data.newTheme);
                }
            })
            .catch(error => console.error('Failed to toggle theme:', error));
        });
    }
});

