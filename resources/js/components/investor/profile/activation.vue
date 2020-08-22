<template>
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="alert alert-custom alert-light-danger fade show mb-5"
                 role="alert" v-if="!user.proof_document">
                <div class="alert-icon">
                    <i class="flaticon-warning"></i>
                </div>
                <div class="alert-text">Upload the payment proof of your <b>₦1000 Activation fee</b>.</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">
																		<i class="ki ki-close"></i>
																	</span>
                    </button>
                </div>
            </div>

            <div class="card card-custom gutter-b" v-else>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example">
                        <div class="example-preview">
                            <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                <div class="alert-icon">
                                    <i class="flaticon-warning"></i>
                                </div>
                                <div class="alert-text">You will be notified while the admin confirms your payment in
                                    the next 24hours.</div>
                            </div>
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
            <!--end::Notice-->
            <!--begin::Row-->
            <div class="row" v-if="!user.proof_document">
                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Upload Proof Document</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <vue-upload-multiple-image
                                    @upload-success="uploadImageSuccess"
                                    @before-remove="beforeRemove"
                                    @edit-image="editImage"
                                    :data-images="images"
                                    browseText="Upload Proof Document"
                                    dragText="Drag and Drop here."
                                    primaryText="Better9ja"
                                    marklsPrimaryText="Better9ja"
                                    popupText="Better9ja"
                                    accept="image/gif,image/jpeg,image/png,image/jpg,image/bmp"
                            ></vue-upload-multiple-image>
                        </div>
                        <div class="modal-footer">
                            <form @submit.prevent="uploadProofDocument" class="vld-parent" ref="formContainer">
                                <button type="submit" class="btn btn-primary font-weight-bold">Upload</button>
                            </form>
                        </div>

                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
</template>

<script>
    import VueUploadMultipleImage from 'vue-upload-multiple-image'
    export default {
        components: {
            VueUploadMultipleImage,
        },

        data() {
            return {
                images: [],
                user: '',
                form: new Form({
                    proof_document: [],
                })
            }
        },

        methods: {

            getUser()
            {
                axios.get('api/investor/profile/activate')
                    .then(result=>{
                        this.user = result.data;
                        this.$Progress.finish();
                    })
            },

            uploadImageSuccess(formData, index, fileList) {
                // console.log('data', formData, index, fileList)
                // this.form.proof_document = fileList;
                // Upload image api]
                this.form.proof_document = fileList;
            },
            beforeRemove (index, done, fileList) {
                console.log('index', index, fileList)
                var r = confirm("remove image")
                if (r == true) {
                    done()
                } else {
                }
            },
            editImage (formData, index, fileList) {
                console.log('edit data', formData, index, fileList)
            },

            uploadProofDocument()
            {
                let loader = this.$loading.show();
                this.form.post('/api/investor/profile/activate').then(result => {
                    Fire.$emit('ReloadUser');
                    loader.hide();
                }).catch((err)=>{
                        toastr.error('Ooops!... An error just occured.');
                        loader.hide();
                    });
            },
        },

        created() {
            this.$Progress.start();
            this.getUser();
            Fire.$on('ReloadUser', ()=>{
                this.getUser();
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