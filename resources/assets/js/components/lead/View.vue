<template>
    <div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Lead Details
                </div>
                <div class="card-body">
                    <table class="table table-stripe table-bordered">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Home Square Footage</th>
                        </tr>
                        <tr>
                            <td>{{ lead.first_name }}</td>
                            <td>{{ lead.last_name }}</td>
                            <td>{{ lead.email }}</td>
                            <td>{{ lead.phone_number }}</td>
                            <td><address>{{ lead.address }}</address></td>
                            <td>{{ lead.home_square_footage }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                lead : {}
            }
        },

        created: function()
        {
            this.fetchLead();
        },

        methods: {
            fetchLead()
            {
                let uri = 'http://127.0.0.1:8000/leads/' + this.$route.params.id;
                this.axios.get(uri, {
                    data: {},
                    contentType: 'application/json; charset=utf-8'
                }).then((response) => {
                   this.lead = response.data.data;
                }).catch((error) => {
                    this.$bus.$emit('logged', false);
                });
            }
        }
    }
</script>