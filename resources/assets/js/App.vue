<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{ name: 'CreateLead' }" class="navbar-brand">BoldLeads</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li v-show="isLoggedIn" class="nav-item">
                            <router-link :to="{ name: 'DisplayLeadListing' }" class="nav-links">
                                Dashboard
                            </router-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li v-show="!isLoggedIn" class="nav-items">
                            <router-link :to="{ path: '/login' }" class="nav-link">Login</router-link>
                        </li>
                        <li v-show="isLoggedIn" class="nav-items">
                            <a v-on:click="logout" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mt-5 container">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>
    export default{
        data() {
            return {
                isLoggedIn: false
            }
        },
        created () {
            this.$bus.$on('logged', (value) => {
                this.isLoggedIn = value;
            })
        },
        methods: {
            logout() {
                let uri = 'http://127.0.0.1:8000/logout/';
                this.axios.post(uri, {
                    data: {},
                    contentType: 'application/json; charset=utf-8'
                }).then((response) => {
                    this.$bus.$emit('logged', false);
                    this.$router.push('/');
                }).catch((error) => {
                    // TODO - Error handling. Redirect to the homepage regardless of the type of error
                    this.$bus.$emit('logged', false);
                    console.log(error);
                    this.$router.push('/');
                });
            }
        }
    }
</script>

