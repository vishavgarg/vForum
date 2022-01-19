<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/vg/FORUM/partials/_handleSignup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="sName" name="sName" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="sEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="sEmail" name="sEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="sPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="sPassword" name="sPassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="sCheck">
                        <label class="form-check-label" for="sCheck">Check me out</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="sSubmit">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>