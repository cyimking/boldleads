<template>
    <div>
        <div class="row">
            <div class="table">
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
                pagination: {}
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
                   console.log(this.leads);
                });
            }
        }
    }
</script>