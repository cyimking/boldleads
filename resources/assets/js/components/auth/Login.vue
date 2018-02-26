<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="loginUser" class="form-horizontal" role="form">
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" :class="{'is-invalid' : errorsEmail}" name="email" v-model="login.email" required autofocus>

                                    <span v-show="errorsEmail" class="invalid-feedback">
                                        <strong>{{ emailError }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" :class="{'is-invalid' : errorsPassword}" name="password" v-model="login.password" required>

                                    <span v-show="errorsPassword" class="invalid-feedback">
                                        <strong>{{ passwordError }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" v-model="login.remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="#">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                login: {},
                errors: [],
                errorsEmail: false,
                errorsPassword: false,
                emailError: null,
                passwordError: null
            }
        },
        methods: {
            loginUser() {
                let uri = 'http://127.0.0.1:8000/login';
                this.axios
                    .post(uri, this.login)
                    .then((response) => {
                        // redirect to listing page
                        this.$bus.$emit('logged', true);
                        this.$router.push({ name: 'DisplayLeadListing'})
                    })
                    .catch((error) => {
                        this.errors = error.response;
                        console.log(this.errors);
                        // Error Code 422 = Validation error
                        if(this.errors.statusText === 'Unprocessable Entity' || this.errors.status === 422) {
                            if(this.errors.data.errors.email) {
                                this.errorsEmail = true;
                                this.emailError = this.errors.data.errors.email;
                            }
                            if(this.errors.data.errors.password) {
                                this.errorsPassword = true;
                                this.passwordError = this.errors.data.errors.password;
                            }
                        }
                    });
            }
        }
    }
</script>