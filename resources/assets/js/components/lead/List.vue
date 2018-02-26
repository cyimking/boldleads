<template>
    <div>
        <div class="row">

            <div v-show="unsuccessfulCall" class="alert alert-danger alert-dismissible fade show mt-5" style="width: 100%" role="alert">
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

            <div v-if="successfulCall" class="table">
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Submitted</th>
                        <th></th>
                    </tr>
                    <tr v-for="lead in leads">
                        <td>{{ lead.first_name }}</td>
                        <td>{{ lead.last_name }}</td>
                        <td>{{ lead.email }}</td>
                        <td>{{ lead.created_at }}</td>
                        <td>
                            <router-link :to="{ name: 'DisplayLead', params: { id: lead.id}}">View</router-link>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <pagination :data="pagination" v-on:pagination-change-page="fetchLeads"></pagination>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                leads: [],
                pagination: {},
                errors: [],
                successfulCall: false,
                unsuccessfulCall: false
            }
        },

        created: function()
        {
            this.fetchLeads();
        },

        methods: {
            fetchLeads(page)
            {
                // Set page number to 1 by default
                if(typeof page === 'undefined') {
                    page = 1;
                }

                let uri = 'http://127.0.0.1:8000/leads?page=' + page;
                this.axios.get(uri, {
                    data: {},
                    contentType: 'application/json; charset=utf-8'
                }).then((response) => {
                   this.leads = response.data.data;
                   this.pagination = response.data;
                   this.successfulCall = true;
                }).catch((error) => {
                    this.$bus.$emit('logged', false);
                    this.errors = error.response.data;
                    this.unsuccessfulCall = true;
                });
            }
        }
    }
</script>