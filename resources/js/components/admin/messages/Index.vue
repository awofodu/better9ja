<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->



            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title" style="margin-bottom: -18px;">
                        <div class="alert alert-custom gutter-b" role="alert">
                            <div class="alert-icon align-self-start mt-1">
                                <i class="flaticon2-layers-1 text-primary"></i>
                            </div>
                            <div class="alert-text">ALL MESSAGES</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">

                                <table class="table table-hover mb-6">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(message,index) in messages.data" :key="message.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{message.name}}</td>
                                        <td>{{message.phone}}</td>
                                        <td>{{message.subject}}</td>
                                        <td>{{message.message}}</td>
                                        <td>{{message.action}}</td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete Admin"
                                               @click="deleteMessage(message)">
                                                <i class="la la-trash"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <pagination :data="messages" @pagination-change-page="getResults">
                                    <span slot="prev-nav">&lt; Previous</span>
                                    <span slot="next-nav">Next &gt;</span>
                                </pagination>
                            </div>

                            &emsp;&emsp;
                            &emsp;&emsp;

                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>





        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</template>

<script>
    export default {
        data() {
            return {
                messages: {},
                user: '',
            }
        },

        methods: {
            allMessages()
            {
                axios.get('/api/admin/report/messages')
                    .then(result=>{
                        this.messages = result.data.messages;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            },

            viewUser(user)
            {
                this.user = user;
            },

            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/report/messages?page=' + page)
                    .then(result => {
                        this.messages = result.data.messages;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },

            deleteMessage(message)
            {
                Swal.fire({
                    title: "Delete?",
                    text: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Delete!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.delete('/api/admin/report/messages/'+message.id)
                            .then(result=>{
                                toastr.success("Report deleted successfully.");
                                Fire.$emit('ReloadMessages');
                                this.$Progress.finish();
                            })
                            .catch(()=>{
                                toastr.error("Oops!... An error just occurred, please try again.");
                                this.$Progress.fail();
                            })

                        // result.dismiss can be "cancel", "overlay",
                        // "close", and "timer"
                    } else if (result.dismiss === "cancel") {
                        Swal.fire(
                            "Cancelled",
                            "Process Terminated.",
                            "error"
                        )
                    }
                });
            }

        },

        created() {
            this.$Progress.start();
            this.allMessages();
            Fire.$on('ReloadMessages', ()=>{
                if(this.messages.current_page > 1)
                {
                    this.getResults(this.messages.current_page);
                }else{
                    this.allMessages();
                }
            });

        }
    }
</script>

<style>
    #my-strictly-unique-vue-upload-multiple-image {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }

    h1, h2 {
        font-weight: normal;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }

    .image-container{
        width: 100% !important;
    }

</style>
