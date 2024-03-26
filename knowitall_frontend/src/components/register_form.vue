<template>
<main style="text-align: center">
    <img class="py-2"  src="../assets/do-you-know-it-all.png" width="20%" height="5%">
    <div class="container d-flex justify-content-center" style="width: 700px">
        <form>
            <div class="form-floating py-2">
                <input type="text" class="form-control" id="floatingName" placeholder="full name">
                <label for="floatingName">full name</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" placeholder="email">
                <label for="floatingEmail">email</label>
            </div>
            <div class="form-floating py-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="@username">
                <label for="floatingInput">username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">password</label>
            </div>

            <div class="container d-flex justify-content-center flex-nowrap">
                <a class="nav-link py-1 px-3" href="#" style="font-size: 27px">sign up</a>
            </div>
        </form>
    </div>
</main>
</template>
<script>
export default {
    name: 'RegisterForm'
}
</script>

<style>

</style>