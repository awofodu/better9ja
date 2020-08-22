<template>
    
</template>

<script>
    Vue.mixin({

        methods: {

            loadProgressBar() {

                //  [App.vue specific] When App.vue is first loaded start the progress bar
                this.$Progress.start();
                //  hook the progress bar to start before we move router-view
                this.$router.beforeEach((to, from, next) => {
                    //  does the page we want to go to have a meta.progress object
                    if (to.meta.progress !== undefined) {
                        let meta = to.meta.progress;
                        // parse meta tags
                        this.$Progress.parseMeta(meta)
                    }
                    //  start the progress bar
                    this.$Progress.start();
                    //  continue to next page
                    next()
                });
                //  hook the progress bar to finish after we've finished moving router-view
                this.$router.afterEach((to, from) => {
                    //  finish the progress bar
                    this.$Progress.finish()
                });
            },

            errorMessage() {
                swal.fire({
                    title: 'An error occurred.',
                    text: 'Please reload the page.',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'Reload!',
                    cancelButtonText:   'Cancel'
                }).then((result) => {
                    if (result.value) {
                        location.reload();


                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        swal.fire(
                            'Cancelled',
                            'Process cancelled.',
                            'error'
                        );
                    }
                });
                this.$Progress.fail();
            },

            priceComma(value){
                return Number(value).toLocaleString();
            }
        }
    })
</script>

<style scoped>

</style>