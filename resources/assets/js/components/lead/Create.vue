<template>
    <div>
        <div class="row text-center">
            <div class="col-12 lg">
                <h1>Get more listings and buyers.</h1>
                <p>Last year alone, we helped thousands of agents generate over 800,000 buyer and seller leads.</p>
            </div>
            <div class="col-12 mt-3">
                <h1>Get more listings <br> and buyers in your city. </h1>
                <p>Generate buyer and seller leads, automate your follow-up and grow your business.</p>
            </div>
        </div>

        <!-- Display success message -->
        <div v-show="successfulCall" class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ successMessage }}
        </div>

        <!-- Display error message -->
        <div v-show="unsuccessfulCall" class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <b>Please correct the following error(s):</b>
            <ul>
                <li v-for="error in errors">
                    {{ error }}
                </li>
            </ul>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Check Availability in Your Area!
                    </div>
                    <div class="card-body">
                        <form v-on:submit.prevent="createLead">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First Name</label>
                                <input type="text" class="form-control" v-model="lead.first_name" id="first_name" >
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" v-model="lead.last_name">
                            </div>

                            <div class="form-group">
                                <label for="email1" class="control-label">Email Address</label>
                                <input type="email" class="form-control" id="email1" v-model="lead.email" required="required">
                                <!--  <input type="email" class="form-control" id="email1" v-model="lead.email" required="required" v-on:change="createLead"> -->
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="control-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" v-model="lead.phone_number">
                            </div>

                            <!-- TODO: Connect to Google's API for accurate information -->
                            <div class="form-group">
                                <label for="address" class="control-label">Address</label>
                                <input type="text" class="form-control" id="address" v-model="lead.address">
                            </div>

                            <div class="form-group">
                                <label for="home_square_footage" class="control-label">Home Square Footage</label>
                                <input type="number" class="form-control" id="home_square_footage" v-model="lead.home_square_footage" min="0" max="25000">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
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
                lead: {},
                id: {},
                errors: [],
                successMessage: {},
                successfulCall: false,
                unsuccessfulCall: false,
                attempted: false
            }
        },
        created () {
            this.$bus.$on('leadCreated', (lead) => {
                this.id = lead;
            })
        },
        methods: {
            createLead()
            {
                if (this.attempted === true) {
                    this.updateLead(this.lead.id);
                } else {
                    let uri = 'http://127.0.0.1:8000/leads';
                    this.successfulCall = false;
                    this.unsuccessfulCall = false;
                    this.axios
                        .post(uri, this.lead)
                        .then((response) => {
                            this.successMessage = response.data;
                            this.successfulCall = true;
                            this.inserted = true;

                            // TODO - Return LEAD && successMessage
                            // LEAD will return the correct the ID.
                            // Use this ID to update the LEAD after submitting the form
                        })
                        .catch(error => {
                            this.errors = error.response.data.errors;
                            this.unsuccessfulCall = true;
                        });
                }
            },
            updateLead(id)
            {
                // TODO - If user entered form already, update the lead instead
                let uri = 'http://127.0.0.1:8000/leads/' + this.id;
                this.successfulCall = false;
                this.unsuccessfulCall = false;
                this.axios
                    .patch(uri, this.lead)
                    .then((response) => {
                        this.successMessage = response.data;
                        this.successfulCall = true;
                        this.inserted = true;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        this.unsuccessfulCall = true;
                    });
            }
        }
    }
</script>