<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Users</h3></div>
<div class="container">
<form class="row g-3">
    <div class="col-md-4">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName">
    </div>
    <div class="col-md-4">
        <label for="inputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="inputUsername">
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Usertype</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
        </select>
    </div>


    <div class="col-12 mb-4">
        <button type="button" class="btn me-3">Reset Password</button>
        <label> *sets password to password123, in the case the password is forgotten</label>
    </div>

    <div class="col-12 mb-4">
        <button type="submit" class="btn">Save</button>
    </div>
</form>
</div>
</template>

<script>

</script>