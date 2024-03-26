<template>
<main style="text-align: center">
    <img class="py-2" src="../assets/do-you-know-it-all.png" width="30%" height="15%">
    <div class="container d-flex justify-content-center" style="width: 700px">
        <form>
            <div class="form-floating py-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="@username">
                <label for="floatingInput">username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">password</label>
            </div>

            <div class="container d-flex justify-content-center flex-nowrap">
                <a class="nav-link py-4 px-3" type="submit" style="font-size: 27px">login</a>
                <router-link class="nav-link py-4 px-3" to="/register" style="font-size: 27px">sign up</router-link>
            </div>
        </form>
    </div>

</main>
</template>
<script>
export default {
    name: 'LoginForm'
}
</script>

<style>
.form-floating, .form-floating:focus{
        width: 300px;

        input{
            border-radius: 100px !important;
            height: 15px;
            color: #A8DF7D;
            background-color: #B590DA;
            font-weight: bold;
        }

        label{
            color: #A8DF7D;
            font-weight: bolder;
            font-size: 20px;
        }
    }

</style>