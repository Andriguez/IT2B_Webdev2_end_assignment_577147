<script> 
export default {
    name: 'Navigation'
}
</script>

<template>
    <nav class="navbar d-flex flex-nowrap py-1 expand-lg">
    <div class="container px-0">
        <div class="col-3 d-flex">
        </div>
        <div class="col-6 d-flex justify-content-center">
        <router-link class="navbar-brand py-0" to="/">
            <img src="../assets/KNOW-IT-ALL_logo.png" alt="logo" width="100" height="70">
        </router-link>
        </div>
        <div class="col-3 d-flex flex-nowrap justify-content-end">
            <router-link class="nav-link py-3 px-5" to="/login">Login</router-link>
        </div>
    </div>
</nav>
</template>



<style>
.navbar{
    background-color: #B590DA;
}
.nav-link{
    font-weight: bolder !important;
    font-size: 20px !important;
    color: #47008F !important;
    text-decoration: underline !important;
}

.nav-link:hover{
    color: #A8DF7D !important;
    text-shadow:
            -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
}

.dropdown-menu{
    background-color: #A8DF7D;

    a{
        color: #47008F;
        text-decoration: underline;
        font-weight: bold;
    }

    h5{
        color: #A8DF7D;
        text-shadow:
                -1px -1px 0 #47008F,
                1px -1px 0 #47008F,
                -1px 1px 0 #47008F,
                1px 1px 0 #47008F !important;
    }

    .dropdown-item:hover{
        background-color: #B590DA;
    }
}

</style>