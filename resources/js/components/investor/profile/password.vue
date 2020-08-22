<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <h3 class="card-title">Profile Details</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form" @submit.prevent="changePassword">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Change Password:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Old Password</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-key"></i>
																		</span>
                                                </div>
                                                <input type="password" v-model="form.old_password"
                                                       class="form-control form-control-solid"
                                                       placeholder="Enter Old Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">New Password</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-key"></i>
																		</span>
                                                </div>
                                                <input type="password" v-model="form.new_password"
                                                       class="form-control form-control-solid" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Confirm New Password</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-key"></i>
																		</span>
                                                </div>
                                                <input type="password" v-model="form.c_new_password"
                                                       class="form-control form-control-solid" placeholder="Re-enter New Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <div class="card-footer bg-gray-100 border-top-0 text-right">
                                        <button type="reset" class="btn btn-light-secondary font-weight-bold">Cancel</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold mr-2">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Card-->
            <!--end: Code-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</template>

<script>
    export default {
        data() {
            return {
                fullPage: true,
                user: '',
                form : new Form({
                    old_password: '',
                    new_password: '',
                    c_new_password: '',
                })
            }
        },

        methods: {
            profileDetails(){
                axios.get('api/investor/profile')
                    .then(result=>{
                        this.user = result.data.user;
                        this.$Progress.finish()
                    }).catch(()=>{

                })
            },

            changePassword()
            {

                let loader = this.$loading.show();
                this.form.post('/api/investor/profile/change-password')
                    .then(result=>{
                        toastr.success('Password changed successfully.');
                        loader.hide();

                    }).catch((err)=>{
                        toastr.error(err.response.data);
                        loader.hide();
                    })
            },
        },

        created () {
            this.$Progress.start();
            this.profileDetails();
            Fire.$on('ReloadUserInfo', ()=>{
                this.profileDetails();
            });

        }
    }
</script>

<style scoped>

</style>