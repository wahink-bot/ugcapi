<?php
// Shared Google Identity Services logic
?>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<div id="g_id_onload"
     data-client_id="<?php echo htmlspecialchars($_ENV['GOOGLE_CLIENT_ID'] ?? ''); ?>"
     data-context="signin"
     data-ux_mode="popup"
     data-callback="handleCredentialResponse"
     data-auto_prompt="false">
</div>
<script>
function handleCredentialResponse(response) {
    const loadingOverlay = document.getElementById('googleLoadingOverlay');
    if (loadingOverlay) loadingOverlay.classList.add('active');

    const data = {
        credential: response.credential
    };

    fetch('api/auth/google.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(res => {
        if (!res.ok) {
            if(res.status === 429) throw new Error("Too many login attempts. Please try again later.");
            throw new Error("Authentication failed");
        }
        return res.json();
    })
    .then(result => {
        if (result.success) {
            window.location.href = result.redirect;
        } else {
            showError(result.error || "Login failed");
        }
    })
    .catch(error => {
        const loadingOverlay = document.getElementById('googleLoadingOverlay');
        if (loadingOverlay) loadingOverlay.classList.remove('active');
        showError(error.message);
    });
}

function showError(message) {
    const loadingOverlay = document.getElementById('googleLoadingOverlay');
    if (loadingOverlay) loadingOverlay.classList.remove('active');
    const alertContainer = document.getElementById('alert-container');
    if (alertContainer) {
        alertContainer.innerHTML = `<div class="alert alert-danger">${message}</div>`;
    } else {
        alert(message);
    }
}
</script>
